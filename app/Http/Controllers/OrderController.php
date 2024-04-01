<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index(Request $request){

        $orders = Order::latest('orders.created_at');

        $orders = $orders->paginate(10);

        return view('admin.listOrder', [
            'orders' => $orders
        ]);
    }

    public function detail($orderId){

        $order = Order::where('id', $orderId)->first();
        $orderItems = OrderItem::where('order_id', $orderId)->get();
        return view('admin.detailOrder',[
            'order' => $order,
            'orderItems' => $orderItems
        ]);
    }

    public function changeOrderStatus(Request $request, $orderId){
        $order = Order::find($orderId);
        $order->status = $request->status;
        $order->shipped_date = $request->shipped_date;
        $order->save();

        $message = 'status changed successfully';

        session()->flash('status', 'status changed successfully');

        return redirect()->back();
    }
}
