<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Controller;

class OrdersCRUD extends Controller
{
    function orders()
    {
        $allOrders = Order::latest()
        ->paginate(10);
        return view('admin.OrdersTable')
        ->with('viewData', $allOrders);
    }

    function order(Order $order)
    {
        return view('admin.Order')
        ->with('viewData', ['order' => $order, 'error' => null]);
    }

    function newOrder(){
        return view('admin.OrderCreate')
        ->with('viewData', null);
    }

    function createOrder(Request $request)
    {
        $this->validate($request, [
            'totalPrice' => 'required|numeric|gt:0',
            'user_id' => 'required',
        ]);

        if(! User::find($request->user_id)){
            return view('admin.OrderCreate')
            ->with('viewData', 'THIS USER ID DOESN\'T EXIST');
        }
        Order::create([
            'totalPrice' => $request->totalPrice,
            'user_id' => $request->user_id
        ]);

        return redirect()
        ->route('admin.orders');
    }

    function updateOrder(Order $order, Request $request)
    {
        $this->validate($request, [
            'totalPrice' => 'nullable|numeric|gt:0'
        ]);
        if($request->user_id && ! User::find($request->user_id)){
            $viewData = [];
            $viewData['error'] = 'THIS USER ID DOESN\'T EXIST';
            $viewData['order'] = $order;
            return view('admin.Order')
            ->with('viewData', $viewData);
        }
        if($request->totalPrice) $order->setTotalPrice($request->totalPrice);
        if($request->user_id) $order->setUserId($request->user_id);
        $order->save();
        return redirect()->route('admin.order', $order->getId());
    }

    function deleteOrder(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders');
    }
}
