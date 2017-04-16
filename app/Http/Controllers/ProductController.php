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
        $marime=$request->marime;
        $blat=$request->blat;
        $suplimente=$request->supli;
        $msg=$request->msg;
        
        $exist=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->where("marime",$marime)->where("blat",$blat)->value("cantitate");
        $stare=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->where("marime",$marime)->where("blat",$blat)->value("stare");
        $mar=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->where("marime",$marime)->value("marime");
         $b=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->where("blat",$blat)->value("blat");
         $s=DB::table("orders")->where("user_id",Auth::id())->where("product_id",$id)->where("suplimente",$suplimente)->value("suplimente");
         
        if(!empty($exist) && count($exist) >0 && ($stare==0) && ($marime==$mar) && ($blat==$b) && ($s==$suplimente)){
            DB::Table("orders")
                    ->where("user_id",Auth::id())
                    ->where("product_id",$id)
                    ->where("marime",$marime)
                    ->where("blat",$blat)
                    ->update(['cantitate'=>($exist+$qty)
                            
                            ]);
                  
        }else{
            DB::Table("orders")->insert([
                "user_id"=>Auth::id(),
                "product_id"=>$id,
                "cantitate"=>$qty,
                "marime"=>$marime,
                "blat"=>$blat,
                "suplimente"=>$suplimente,
                "message"=>$msg,
                "created_at"=>  Carbon::Now()
            ]);
        }
    }
   
   public function delcart(Request $request )
    {   
        $id=$request->id;
        
       
            DB::table("orders")
                    ->where("user_id",Auth::id())
                    ->where("id",$id)
                    
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
                    ->select('orders.cantitate','tip_pizza.id', 'tip_pizza.name','tip_pizza.price','orders.id','orders.marime','orders.blat',DB::raw('(tip_pizza.price*orders.cantitate) AS total'))
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
        
      
   
   
   
   
       
      public function finish(Request $request  )
   {
       
        if (Auth::guest()) {
            return redirect('/login');
        } 
        else
        {
            
        }
          $id=$request->id;
          
            DB::Table("orders")
                    ->where("user_id",$id)
                    ->update(['stare'=>2]);
                  
       $data = DB::table("orders")
               ->where("stare",2)
               ->get();
            
       return view('admin_panel.inactiv', ['data' => $data]);
        }    
        
        
   
        
}
        
    
    
    
    