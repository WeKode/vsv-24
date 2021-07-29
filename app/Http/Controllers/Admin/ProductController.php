<?php

namespace App\Http\Controllers\Web\Admin;

use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductContract
     * @var CategoryContract
     */
    protected $product;
    protected $category;

    /**
     * ProductController constructor.
     * @param ProductContract $product
     * @param CategoryContract $category
     */
    public function __construct(ProductContract $product, CategoryContract $category)
    {
        $this->product = $product;
        $this->category = $category;

        $this->middleware(['permission:view-product'])->only(['index', 'show']);
        $this->middleware(['permission:edit-product'])->only(['edit', 'update']);
        $this->middleware(['permission:create-product'])->only(['create', 'store']);
        $this->middleware(['permission:delete-product'])->only(['destroy']);
    }

    /**
     * @return Renderable
     */
    public function index() : Renderable
    {
        $products = $this->product->findByFilter(['category']);
        return view('admin.products.index',compact('products'));
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        $categories = $this->category->setPerPage(0)->findByFilter();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|unique:products,name|max:100',
            'description' => 'sometimes|nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $this->product->new($data);
        session()->flash('success',__('messages.create'));
        return redirect()->route('admin.products.index');
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id) : Renderable
    {
        $product = $this->product->findOneById($id);
        $categories = $this->category->setPerPage(0)->findByFilter();
        return view('admin.products.edit',compact('product', 'categories'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:products,name,'.$id,
            'description' => 'sometimes|nullable|string',
            'category_id' => 'required|exists:categories,id'
        ]);

        $this->product->update($id,$data);
        session()->flash('success',__('messages.update'));
        return redirect()->route('admin.products.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->product->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('admin.products.index');
    }
}
