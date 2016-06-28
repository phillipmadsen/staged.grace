<?php

namespace Fully\Http\Controllers;

use Fully\Http\Controllers\Controller;
use Fully\Models\Cart;
use Fully\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        
    }
    
    public function (){}
    public function getIndex(){}
    public function postIndex(){}
    
    public function postAddToCart()
    {
        // var_dump('addng to cart');    
        // var_dump(Input::all());    
        dd(Input::all());
        // var_dump(Input::get('amount'));    
       
    }
    // public function (){}
    // public function (){}



    // http://laravel.io/forum/09-21-2015-tutorial-how-to-craft-a-digital-eshop-with-laravel-5
    // 
}
