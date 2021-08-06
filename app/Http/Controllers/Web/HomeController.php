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
        $smartphones = $this->product->setPerPage(3)->findByFilter(['brand'], [], ['*'], ['smartphones']);
        $sims = $this->product->setPerPage(3)->findByFilter([], [], ['*'], ['phonePlans']);
        $energies = $this->product->setPerPage(2)->findByFilter([], [], ['*'], ['energyPlans']);
        return view('front.home', compact('smartphones', 'sims', 'energies'));
    }
}
