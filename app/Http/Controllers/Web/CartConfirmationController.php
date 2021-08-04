<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartConfirmationController extends Controller
{
    public function index()
    {
        $products = auth()->user()->products;

        $total = 0;
        foreach ($products as $product)
        {
            $total += $product->price * $product->pivot->qte;
        }
        return view('front.cart_confirmation', compact('products', 'total'));
    }
}
