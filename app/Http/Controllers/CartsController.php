<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CartsController extends Controller
{
    
    public function cart()
    {
        //dd(session()->get('categoryOrder'));
        return view('carts.cart');
    }
  
    public function addToCart($type, $id)
    {

        //dd($type);
        $menu = Menu::findOrFail($id);

        // dd($menu);
        $categoryOrder = session()->get('categoryOrder');
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $menu->name,
                "quantity" => 1,
                "price" => $menu->price,
                "image" => $menu->pict,
                "order_type" => $categoryOrder
            ];
        }
  
        session()->put('cart', $cart);
        session()->put('categoryOrder', $categoryOrder);

        return redirect()->back()->with('success', 'Menu added to cart successfully!');
    }
  
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

}
