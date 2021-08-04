<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Contracts\AttributeValueContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $attribute_value;
    protected $attribute;


    public function __construct(ProductContract $product, AttributeValueContract $attribute_value, AttributeContract $attribute)
    {
        $this->product = $product;
        $this->attribute_value = $attribute_value;
        $this->attribute = $attribute;


    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $products = $this->product->findByFilter();
        return view('admin.products.index', compact('products'));
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        $attributes = $this->attribute->setPerPage(0)->findByFilter(['values']);
        return view('admin.products.create', compact('attributes'));
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->product->new($data);

        session()->flash('success', __('messages.create'));
        return redirect()->route('admin.products.index');
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function show($id): Renderable
    {
        $product = $this->product->findOneById($id, ['attribute_values.attribute']);
//        $attribute_values = $this->attribute_value->findBy(['']);
        return view('admin.products.show', compact('product'));
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $product = $this->product->findOneById($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update($id, ProductRequest $request)
    {
        $data = $request->validated();
        $this->product->update($id, $data);

        session()->flash('success', __('messages.update'));
        return redirect()->route('admin.products.index');
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->product->destroy($id);
        session()->flash('success', __('messages.delete'));
        return redirect()->route('admin.products.index');
    }


    public function valueStore(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'attribute_value_id' => 'required|exists:attribute_values,id'
        ]);

        $this->product->addAttributeValue($id, $data);

        session()->flash('success', __('messages.create'));
        return back();
    }

    public function valueDestroy(Request $request, $id): RedirectResponse
    {
        $data = $request->validate([
            'attribute_value_id' => 'required|exists:attribute_values,id'
        ]);

        $this->product->removeAttributeValue($id, $data);

        session()->flash('success', __('messages.delete'));
        return back();
    }

}
