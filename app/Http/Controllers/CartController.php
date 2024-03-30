<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
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

}
