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
        $products = $this->product->findByFilter();
        $brands = $this->brand->setPerPage(0)->findByFilter();
        $attributes = $this->attribute->setPerPage(0)->findByFilter(['values']);

        return view('front.smartphones', compact('products', 'brands', 'attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
