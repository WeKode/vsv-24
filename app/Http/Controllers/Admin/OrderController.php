<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    public function __construct(OrderContract $order)
    {
        $this->order = $order;
    }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $orders = $this->order->findByFilter();
        return view('admin.orders.index',compact('orders'));
    }



    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id): Renderable
    {
        $order = $this->order->findOneById($id);
        return view('admin.orders.edit',compact('order'));
    }

    public function update($id,Request $request)
    {
        $data = $request->validate([
            'name'      => 'required|string|max:100',
            'email'     => 'required|email|unique:orders,email,'.$id,
            'pic'       => 'sometimes|nullable|file|image|max:3000',
        ]);
        $this->order->update($id,$data);

        session()->flash('success',__('messages.update'));
        return redirect()->route('admin.orders.show',$id);
    }


//    /**
//     * @param $id
//     * @return RedirectResponse
//     */
//    public function destroy($id): RedirectResponse
//    {
//        $this->order->destroy($id);
//        session()->flash('success',__('messages.delete'));
//        return redirect()->route('admin.orders.index');
//    }

}
