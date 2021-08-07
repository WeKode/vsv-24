<?php

namespace App\Http\Controllers\Web;

use App\Contracts\AttributeContract;
use App\Contracts\AttributeValueContract;
use App\Contracts\BrandContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnergyController extends Controller
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
        $products = $this->product->setPerPage(12)->findByFilter([],[],['*'],['energyPlans']);
        $brands = $this->brand->setPerPage(0)->findByFilter([],[],['*'],['energyPlans']);
        $attributes = $this->attribute->setPerPage(0)->findByFilter(['values'], [], ['*'], ['energyPlans']);

        return view('front.electricity_providers.index', compact('products', 'attributes', 'brands'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->findOneById($id,['attribute_values.attribute'],[],['*'],['energyPlans']);
        $latest_products = $this->product->setPerPage(4)->findByFilter(['brand'],[],['*'],['energyPlans', 'latest']);
        $comp_products = $this->product->setPerPage(6)->findByFilter(['attribute_values.attribute'],[],['*'],['energyPlans']);
        return view('front.electricity_providers.show', compact('product', 'latest_products', 'comp_products'));
    }

}
