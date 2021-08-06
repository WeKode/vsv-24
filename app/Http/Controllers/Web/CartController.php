<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $products = auth()->user()->products;

        $total = 0;
        foreach ($products as $product)
        {
            $total += $product->price * $product->pivot->qte;
        }
        return view('front.cart', compact('products', 'total'));
    }

    public function addProduct($id)
    {
        $data['qte'] = 1;

        $product = Product::findOrFail($id);
        $user = auth()->user();

        $exist =  $user->products()->find($id);

        if ($exist){
            $data['qte'] = $exist->pivot->qte + 1;
            $user->products()->updateExistingPivot($id,$data);
        }else{
            $user->products()->attach($id,$data);
        }
        session()->flash('success','Product has been added to your Cart successfully');
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $cart = $this->validateCart();
        auth()->user()->products()->sync($cart);
        session()->flash('Cart updated successfully');
        return redirect()->back();

    }

    public function delete($id){
        auth()->user()->products()->detach($id);
        session()->flash('success', 'Cart updated successfully');
        return redirect()->back();
    }

    public function validateCart()
    {
        $data = collect(\request()->except('_token'));
        $products = Product::whereIn('id',$data->keys())->get();
        $data = $data->filter(static function($value){
            return $value > 0;
        });

        $data = $data->map(static function($v,$k) use ($products) {
            $p = $products->where('id',$k)->first();

//            if ($p->qte < $v){
//                $v =  $p->qte;
//            }
            return $v;
        });

        return  $data->mapWithKeys(static function ($value, $key){
            return [$key => ['qte' => $value]] ;
        })->all();
    }

}
