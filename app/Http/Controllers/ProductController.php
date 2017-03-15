<?php
namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Auth;

class ProductController extends Controller
{
     public function getIndex()
    {
         $product = DB::table("tip_pizza")->get();
    return view('produse.articles', ['product' => $product]);
    }
    public function addcart(Request $request){
        $id=$request->id;
        $qty=$request->cantitate;
        $exist=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->value("cantitate");
        if(!empty($exist) && count($exist) >0){
            DB::Table("orders")->where("user_id",Auth::id())
                    ->where("product_id",$id)
                    ->update(['cantitate'=>($exist+$qty)]);
        }else{
            DB::Table("orders")->insert([
                "user_id"=>Auth::id(),
                "product_id"=>$id,
                "cantitate"=>$qty
            ]);
        }
    }
   
   public function delcart(Request $request )
    {   
        $id=$request->id;
       
            DB::table("orders")
                    ->where("user_id",Auth::id())
                    ->where("product_id",$id)
                    ->delete();
        return 'true';
            
    }
    
    
    public function getCart()
    {
        $cart=[];
        if (Auth::guest()) {
            return redirect('/login');
        } 
        else {
         
           $cart=DB::Table("tip_pizza")  
                    ->select('orders.cantitate','tip_pizza.id', 'tip_pizza.name','tip_pizza.price',DB::raw('(tip_pizza.price*orders.cantitate) AS total'))
                    ->leftJoin("orders",function($join){
                                $join->on('tip_pizza.id', '=', 'orders.product_id');
                               
                            })
                   ->where("user_id",Auth::id())
                   ->get();
        }
       return view('produse.shopcart', ['cart' => $cart]);
    }
    
   
        
        
        
        
        
    }
    
    
    