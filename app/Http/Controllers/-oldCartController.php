<?php

namespace Fully\Http\Controllers;

use Fully\Http\Controllers\Controller;
use Fully\Models\Cart;
use Fully\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @param $productId
     */
    public function addItem($productId)
    {
        $cart = Cart::where('user_id', Sentinel::getUser())->first();
        if (!$cart)
        {
            $cart          = new Cart();
            $cart->user_id = Sentinel::getUser();
            $cart->save();
        }
        $cartItem             = new Cartitem();
        $cartItem->product_id = $productId;
        $cartItem->cart_id    = $cart->id;
        $cartItem->save();
        return redirect(getLang() . '/shop/cart');
    }

    public function Cart()
    {


        //update/ add new item to cart
        if (Request::isMethod('post'))
        {
            $product_id = Request::get('product_id');
            $product    = Product::find($product_id);
            Cart::add(['id' => $product_id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price]);
        }

        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1)
        {
            $rowId = Cart::search(['id' => Request::get('product_id')]);
            $item  = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1)
        {
            $rowId = Cart::search(['id' => Request::get('product_id')]);
            $item  = Cart::get($rowId[0]);

            Cart::update($rowId[0], $item->qty - 1);
        }


        $cart = Cart::content();

        return view('cart', ['cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home']);
    }

    public function showCart()
    {
        $cart = Cart::where('user_id', Sentinel::getUser()->id)->first();

        if (!$cart)
        {
            $cart          = new Cart();
            $cart->user_id = Sentinel::getUser()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total = 0;
        foreach ($items as $item)
        {
            $total += $item->product->price;
        }

        return view('frontend.shop.cart', ['items' => $items, 'total' => $total]);
    }

    public function checkout()
    {
        // $cart = Cart::where('user_id', Sentinel::getUser()->id)->first();

        // if(!$cart){
        //     $cart =  new Cart();
        //     $cart->user_id=Sentinel::getUser()->id;
        //     $cart->save();
        // }

        // $items = $cart->cartItems;
        // $total=0;
        // foreach($items as $item){
        //     $total+=$item->product->price;
        // }
        //return view('frontend.shop.cart',['items'=>$items,'total'=>$total]);
        return view('frontend.shop.checkout');
    }
    
    
    
    
    
    /**
     * @param $id
     */
    public function removeItem($id)
    {
        // CartItem::destroy($id);
        // return redirect(getLang() . '/shop/cart');
        $rowId = Cart::search(['id' => Request::get('product_id')]);
        Cart::remove($rowId[0]);

    }


    /**
     * Store or update the item on local storage.
     *
     * @param  \Cartalyst\Cart\Collections\ItemCollection  $item
     * @param  \Cartalyst\Cart\Cart  $cart
     * @return \App\Models\CartItem
     */
    protected function storeItem(ItemCollection $item, Cart $cart)
    {
        // Get the product that was added to the shopping cart
        $product = Product::find($item->get('id'));
        // Get the cart from storage that belongs to the instance
        $_cart = $this->cart($cart->getInstance());
        // Does the product exist on storage?
        if ( ! $_item = $_cart->items()->whereProductId($product->id)->first())
        {
            $_item = $_cart->items()->create([
                'product_id' => $product->id,
                'quantity'   => $item->get('quantity'),
            ]);
        }
        else
        {
            $_item->update([
                'quantity' => $item->get('quantity')
            ]);
        }
        return $_item;
    }
}





    // http://laravel.io/forum/09-21-2015-tutorial-how-to-craft-a-digital-eshop-with-laravel-5
    // 
}
