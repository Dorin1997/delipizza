<?php
namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Auth;
use Carbon\Carbon;

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
        $marime=$request->description;
        $blat=$request->blat;
        
        $exist=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->value("cantitate");
        $stare=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->value("stare");
        $mar=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->value("marime");
         $b=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->value("blat");
        if(!empty($exist) && count($exist) >0 && ($stare==0) && ($marime==$mar) && ($b==$blat)){
            DB::Table("orders")->where("user_id",Auth::id())
                    ->where("product_id",$id)
                    
                    ->update(['cantitate'=>($exist+$qty),
                             'marime'=>$marime,
                             'blat'=>$blat
                            ]);
                  
        }else{
            DB::Table("orders")->insert([
                "user_id"=>Auth::id(),
                "product_id"=>$id,
                "cantitate"=>$qty,
                "marime"=>$marime,
                "blat"=>$blat,
                "descriptn"=>'momentan 0',
                "created_at"=>  Carbon::Now()
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
                   ->where('stare',0)                 
                   ->get();
        }
       return view('produse.shopcart', ['cart' => $cart]);
    }
    
   
    public function checkout()
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
                    ->where("stare",0)                
                   ->get();
                            
           $user=DB::Table("users")
                   ->where("id",Auth::id())
                   ->first();
        }
       return view('produse.checkout', ['cart' => $cart, 'user'=>$user ]);
    }
        
   public function placeorder()
   {
       
        if (Auth::guest()) {
            return redirect('/login');
        } 
        else
        {
          
            DB::Table("orders")
                    ->where("user_id",Auth::id())
                    ->update(['stare'=>1]);
                  
       
            $data = DB::table("tip_pizza")->get();
    
        }
        
        
      return view('produse.articles', ['data' => $data]);
        
   }
        
        
        
    }
    
    
    