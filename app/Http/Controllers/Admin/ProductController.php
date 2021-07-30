<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductContract $product)
    {
        $this->product = $product;
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $products = $this->product->findByFilter();
        return view('admin.products.index',compact('products'));
    }

    /**
     * @return Renderable
     */
    public function create() : Renderable
    {
        return view('admin.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'price'     => 'required|numeric|between:0,999999.99',
            'images'    => 'required|array|min:1',
            'images.*'  => 'required|file|image|max:5000',
        ]);

        $this->product->new($data);

        session()->flash('success',__('messages.create'));
        return redirect()->route('admin.products.index');
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function show($id): Renderable
    {
        $product = $this->product->findOneById($id);
        return view('admin.products.show',compact('product'));
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $product = $this->product->findOneById($id);
        return view('admin.products.edit',compact('product'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'price'     => 'required|numeric|between:0,999999.99',
            'images'    => 'nullable|sometimes|array|min:1',
            'images.*'  => 'nullable|sometimes|file|image|max:5000',
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
