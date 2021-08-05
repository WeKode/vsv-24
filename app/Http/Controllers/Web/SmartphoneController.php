<?php

namespace App\Http\Controllers\Web;

use App\Contracts\AttributeContract;
use App\Contracts\AttributeValueContract;
use App\Contracts\BrandContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmartphoneController extends Controller
{

    protected $product;
    protected $brand;
    protected $attribute;

    public function __construct(ProductContract $product, BrandContract $brand, AttributeContract $attribute)
    {
        $this->product = $product;
        $this->brand = $brand;
        $this->attribute = $attribute;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->findByFilter([],[],['*'],['smartphones']);
        $brands = $this->brand->setPerPage(0)->findByFilter();
        $attributes = $this->attribute->setPerPage(0)->findByFilter(['values']);

        return view('front.smartphones.index', compact('products', 'brands', 'attributes'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->findOneById($id,['attribute_values.attribute'],[],['*'],['smartphones']);
        return view('front.smartphones.show', compact('product'));

    }

}
