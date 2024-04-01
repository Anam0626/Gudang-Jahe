<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Produk::find($request->id);

        if($product == null){
            return response()->json([
                $status => false,
                $message => 'Record not found'
            ]);
        }

        if (Cart::count() > 0){
            $cartContent = Cart::content();
            $productAlreadyExist = false;

            foreach($cartContent as $item){
                if($item->id == $product->id){
                    $productAlreadyExist = true;
                }
            }

            if($productAlreadyExist == false){
                Cart::add($product->id, $product->nama, 1, $product->harga, ['gambar' => $product->gambar, 'stok' => $product->stok]);
                $status = true;
                $message = $product->name.' added in cart';
            } else {
                $status = false;
                $message = $product->name.' already added in cart';
            }
        } else {
            Cart::add($product->id, $product->nama, 1, $product->harga, ['gambar' => $product->gambar, 'stok' => $product->stok]);
            $status = true;
            $message = $product->name.' added in cart';
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function cart(){
        $cartContent = Cart::content();
        $data['cartContent'] = $cartContent;
        return view('cart', $data);
    }

    public function updateCart(Request $request){
        $rowId = $request->rowId;
        $qty = $request->qty;

        $itemInfo = Cart::get($rowId);

        $product = Produk::find($itemInfo->id);
        if($qty <= $product->stok){
            Cart::update($rowId, $qty);
            $message = 'Cart Updated Successfully';
            $status = true;
        } else {
            $message = 'Requested quantity ('.$qty.') is not available in stock.';
            $status = false;
        }

        session()->flash('success', $message);

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

    public function deleteItem(Request $request){
        $itemInfo = Cart::get($request->rowId);
        if($itemInfo == null){
            $errorMessage = 'Item no found in cart';
            session()->flash('error', $message);
            return response()->json([
                'status' => false,
                'message' => $errorMessage
            ]);
        }

        Cart::remove($request->rowId);

        $message = 'Item removed from cart successfully';
        session()->flash('error', $message);
        return response()->json([
            'status' => true,
            'message' => $message
        ]);
    }

    public function checkout(){
        if(Cart::count() == 0){
            return redirect()->route('cart');
        }
        return view('checkout');
    }

    public function processCheckout(Request $request){
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kodepos' => 'required',
        ]);

        $user =  Auth::user();

        if($request->paymentMethod == 'cod'){
            $subTotal = Cart::subtotal(2, '.', '');

            $order = new Order;
            $order->user_id = $user->id;
            $order->subtotal = $subTotal;

            $order->name = $request->name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->kota = $request->kota;
            $order->kecamatan = $request->kecamatan;
            $order->kodepos = $request->kodepos;
            $order->save();

            foreach(Cart::content() as $item){
                $orderItem = new OrderItem;
                $orderItem->produk_id = $item->id;
                $orderItem->order_id = $order->id;
                $orderItem->name = $item->name;
                $orderItem->qty = $item->qty;
                $orderItem->price = $item->price;
                $orderItem->total = $item->price*$item->qty;
                $orderItem->save();

                $produkData = Produk::find($item->id);
                $currentQty = $produkData->stok;
                $updateQty = $currentQty-$item->qty;
                $produkData->stok = $updateQty;
                $produkData->save();
            }

            session()->flash('success', 'you have successfully placed orde');

            Cart::destroy();


        } else {

        }
    }

}
