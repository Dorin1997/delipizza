<?php
namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
class ProductController extends Controller
{
     public function getIndex()
    {
         $product = DB::table("tip_pizza")->get();
    return view('produse.articles', ['product' => $product]);
    }
    public function getAddtoCart(Request $request,$id)

    {
         $produs=DB::table("tip_pizza")
                ->where("id",$id)
                ->first();
     
       
        $oldCart=Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($produs, $produs->id);
        
        $request->session()->put('cart',$cart);
       dd($request->session()->get('cart'));
       //return redirect('/articleon');
    }
    
    public function getCart()
    {
        if (!Session::has('cart'))
        {
            return view('produse.shopcart', ['product' => null]);
        }
       $oldCart=Session::get('cart');
       $cart = new Cart($oldCart);
       return view('produse.shopcart', ['product' => $cart->items , 'totalPrice' =>$cart->totalPrice]);
    }
    
  }  