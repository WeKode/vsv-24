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

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:240',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'zip_code' => 'required|numeric',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|in:male,female',
        ]);

        session()->put('information', $data);

        return redirect()->route('checkout.index');
    }
}
