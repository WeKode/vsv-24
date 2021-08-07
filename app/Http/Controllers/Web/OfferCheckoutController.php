<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferCheckoutController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        session()->put('information', $data);
        return redirect()->route('offer-checkout.index1');
    }

    public function index1()
    {
        return view('front.steps.offer_checkout');
    }

    public function store1(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:240',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'phone' => 'required|string|max:20',
            'gender' => 'required|string|in:male,female',
        ]);

        $data = $data + session()->get('information');
        session()->put('information', $data);

        return redirect()->route('offer-checkout.index2');
    }

    public function index2()
    {
        return view('front.steps.offer_checkout_2');
    }

    public function store2(Request $request)
    {
        $data = $request->validate([
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'zip_code' => 'required|numeric',
            'address' => 'required|string',
        ]);

        $data = $data + (session()->get('information') ?? []);
        session()->put('information', $data);

        return redirect()->route('offer-checkout.index3');
    }

    public function index3()
    {
        $data = session()->get('information') ;
        return view('front.steps.offer_checkout_3', compact('data'));
    }

    public function store3()
    {


        $data = session()->get('information');

        $product = Product::findOrFail($data['product_id']);
        $data['total'] = $product->price;

        $order = auth()->user()->orders()->create($data);

        $order->products()->attach($product->id, [
            'price' => $product->price,
            'qty' => 1,
            'total' => $product->price
        ]);

        session()->flash('success', __('messages.create'));

        return redirect()->route('home');
    }
}
