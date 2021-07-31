<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct($id)
    {
        $data = $this->validate(request(),[
            'qte' => 'required|numeric|min:1'
        ]);

        $product = Product::findOrFail($id);
        if ($data['qte'] <= 0){
            session()->flash('error','The quantity most be greater than 0');
            return  redirect()->back();
        }

        $user = auth()->user();

        $exist =  $user->products()->find($id);

        if ($exist){
            $data['qte'] = $exist->qte + (int)$data['qte'];
            if ($data['qte'] > $product->qte){
                session()->flash('error','The quantity is not available');
                return  redirect()->back();
            }
            $user->products()->updateExistingPivot($id,$data);
        }else{
            if ($data['qte'] > $product->qte){
                session()->flash('error','The quantity is not available');
                return  redirect()->back();
            }
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
        session()->flash('Cart updated successfully');
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

            if ($p->qte < $v){
                $v =  $p->qte;
            }
            return $v;
        });

        return  $data->mapWithKeys(static function ($value, $key){
            return [$key => ['qte' => $value]] ;
        })->all();
    }

}
