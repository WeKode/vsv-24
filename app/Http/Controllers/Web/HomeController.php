<?php

namespace App\Http\Controllers\Web;

use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $product;

    public function __construct(ProductContract $product)
    {
        $this->product = $product;

    }
    public function index()
    {
        $smartphones = $this->product->setPerPage(3)->findByFilter(['brand']);
        return view('front.home', compact('smartphones'));
    }
}
