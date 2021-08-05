<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $products = auth()->user()->products;

        $total = 0;
        foreach ($products as $product) {
            $total += $product->price * $product->pivot->qte;
        }
        return view('front.checkout', compact('products', 'total'));
    }


    public function store()
    {
        $products = auth()->user()->products;

        $data['total'] = 0;
        foreach ($products as $product) {
            $data['total'] += $product->price * $product->pivot->qte;
        }

        $order = auth()->user()->orders()->create($data);

        foreach ($products as $product)
        {
            $order->products()->attach($product->id, [
                'price' => $product->price,
                'qty' => $product->pivot->qte,
                'total' => $product->price*$product->pivot->qte]);

        }

        auth()->user()->products()->detach();
        session()->flash('success', __('messages.create'));

        return redirect()->route('smartphones.index');
    }
}
