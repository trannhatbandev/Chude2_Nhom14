<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DanhMucSanPham;
use App\Models\SanPham;
use Cart;
use Session;
use App\Models\ThuongHieu;
session_start();

class CartController extends Controller
{
    public function showCart()
    {
        $userId = Session::get('customer_id');
        $danhmuc = DanhMucSanPham::orderBy('category_id','DESC')->get();
        $thuonghieu = ThuongHieu::orderBy('brand_id','DESC')->get();
        return view('pages.cart.show_cart')->with(compact('danhmuc','thuonghieu','userId'));
    }
    public function saveCart(Request $request)
    {
        $userId = Session::get('customer_id');
        $product_id = $request->productid_hidden;
        
        $quantity = $request->qty;
        $product = SanPham::where('product_id',$product_id)->first();
        if($userId){
            Cart::session($userId)->add(array(
                'id' => $product->product_id, 
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => $quantity,
                'attributes' => array(
                    'image' => $product->product_image,
                )
            ));
    
        }else{
            Cart::add(array(
                'id' => $product->product_id, 
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => $quantity,
                'attributes' => array(
                    'image' => $product->product_image,
                )
            ));
        }
      
        return Redirect::to('show-cart');
       
    }
    public function deleteCart($rowId)
    {
        $userId = Session::get('customer_id');
        if($userId){
            Cart::session($userId)->remove($rowId);
        }else{
            Cart::remove($rowId);
        }
        
        return redirect()->back();
    }
    public function updateCart(Request $request)
    {
        $userId = Session::get('customer_id');
        $id = $request->rowId;
        $quantity = $request->qty;
        if($userId){
            Cart::session($userId)->update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
              ));
        }else{
            Cart::update($id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $quantity
                ),
              ));
        }
        
        return Redirect::to('/show-cart');  
    }
}
