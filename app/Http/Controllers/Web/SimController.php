<?php

namespace App\Http\Controllers\Web;

use App\Contracts\AttributeContract;
use App\Contracts\AttributeValueContract;
use App\Contracts\BrandContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimController extends Controller
{

    protected $product;
    protected $attribute;
    protected $brand;


    public function __construct(ProductContract $product, AttributeContract $attribute, BrandContract $brand)
    {
        $this->product = $product;
        $this->attribute = $attribute;
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->findByFilter(['brand'],[],['*'],['phonePlans']);
        $brands = $this->brand->setPerPage(0)->findByFilter([],[],['*'],['phonePlans']);

        $attributes = $this->attribute->setPerPage(0)->findByFilter(['values'], [], ['*'], ['phonePlans']);

        return view('front.sim_offers.index', compact('products', 'attributes', 'brands'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->findOneById($id,['attribute_values.attribute'],[],['*'],['phonePlans']);
        $latest_products = $this->product->setPerPage(4)->findByFilter(['brand'],[],['*'],['phonePlans', 'latest']);
        $comp_products = $this->product->setPerPage(6)->findByFilter(['attribute_values.attribute'],[],['*'],['phonePlans']);
        return view('front.sim_offers.show', compact('product', 'latest_products', 'comp_products'));
    }

}
