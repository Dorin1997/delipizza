<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Response;
use Image;
use File;
use Carbon\Carbon;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
      public function home()
  {
    $text = DB::table("inf")->get();
    return view('content', ['text' => $text]);
   
  } 
  
    public function arton(){
        $data = DB::table("tip_pizza")->get();
    return view('produse.articles', ['data' => $data]);
    }
    
    
  
    public function  info(){
    return view("info");
    }
    
    public function  logare(){
        return view("logare");
    }
    
    public function oneprodus($id)
    {
        
        $produs=DB::table("tip_pizza")
                ->where("id",$id)
                ->first();
        $elem = DB::table("adding")->get();
       
        
        return view("produse.order",["produs"=>$produs,"elem"=>$elem]);
        
    }
    
   
  
    
    
    //--------  admin ----------------------------------------------------------------------------------
    
    public function articles()
        {
            if (\Auth::guest()) 
                 { 
                    return redirect('/login');
                 } 
            else 
                 {
                    $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                            ->value('admin'); 
                    if ($us!=1)  { return redirect('/'); }  
                 }
            return view('admin_panel.menuarticles');
        }
    
    public function activcom ()
            {
            if (\Auth::guest()) {return redirect('/login'); } 
            else {
                $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                        ->value('admin'); 
                if ($us!=1)  { return redirect('/'); } 
                 }

                 $lista=DB::Table("tip_pizza")  
                    ->select('users.id as usid','users.name as usname','users.number','users.adr','orders.cantitate','tip_pizza.id as pzid', 'tip_pizza.name as pzname','tip_pizza.price','tip_pizza.ingrediente','orders.suplimente','orders.message','orders.id as orid','orders.marime','orders.blat',DB::raw('(tip_pizza.price*orders.cantitate) AS total'))
                    
                                ->leftJoin('orders','tip_pizza.id', '=', 'orders.product_id')
                                ->leftJoin('users','users.id', '=' ,'orders.user_id')
                           
                   
                   ->where('stare',1) 
                   ->groupby(users.id)     
                   ->get();
                 
                 return view('admin_panel.activcom', ['lista' => $lista]);
            }
            
     public function inactivcom (){
        if (\Auth::guest()) {
            return redirect('/login');
           
        } 
        else {
           
            $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                    ->value('admin'); 
            if ($us!=1)  { return redirect('/'); } 
          
          
        }
        
         $data = DB::table("tip_pizza")->get();
    return view('admin_panel.inactiv', ['data' => $data]);
       
        
    }
    
  
    
    
    
    // lucru cu topinguri (suplimente )----------------------------------------------------------------------------------
    public function supl ()
            {
            if (\Auth::guest()) {return redirect('/login'); } 
            else {
                $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                        ->value('admin'); 
                if ($us!=1)  { return redirect('/'); } 
                 }
                 
               
                   $elem = DB::table("adding")->get();
   
               
                 return view('admin_panel.suplimente', ["elem"=>$elem]); 
            }
            
            
            public function supldel(Request $a){
        
       
      DB::table("adding")
              ->where('id',"=",$a->id)
              ->delete();
       
      
        return 'true';
    }
            
            
    //lucru cu pizza ----------------------------------------------------------------------------------
    public function pizza (){
        if (\Auth::guest()) {
            return redirect('/login');
           
        } 
        else {
           
            $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                    ->value('admin'); 
            if ($us!=1)  { return redirect('/'); } 
           
           
        }
        
         $data = DB::table("tip_pizza")->get();
    return view('admin_panel.pizza', ['data' => $data]);
       
        
    }
    
    
    public function updpizz( Request $request){
     
          DB::table("tip_pizza") 
                ->where('id',"=",$request->id)
                ->update(['name'=>$request->nume,
                            'ingrediente'=>$request->descriere,
                            'price'=>$request->price]
                            );
        $files=$request->file("logo");
            $extensii=["jpeg","jpg","png","svg"];
            if ($request->hasFile('logo')) {
                
                if($request->file('logo')->isValid()){
                    $ext=$files->getClientOriginalExtension();
                    if(in_array($ext, $extensii)){
                        if(filesize($files)<6000000){
                            $name=str_random(100);;
                            $path="img/products/items/";
                            if($request->file('logo')->move($path,$name.".".$ext)){
                                $filename=$path.$name.".".$ext;
                                $old=DB::table("tip_pizza") 
                                    ->where('id',"=",$request->id)
                                        ->value('image');
                                         File::delete($old);
                              DB::table("tip_pizza") 
                                    ->where('id',"=",$request->id)
                                    ->update(['image'=>$filename]);
                                
                                return Response::json(array('succes'=>true,"image"=>asset($filename)));
                            }else{
                                return Response::json(array('succes'=>"Eror"));
                            }
                        }else{
                            return Response::json(array('succes'=>"max6mb"));
                        }
                    }else{
                        return Response::json(array('succes'=>"notjpg"));
                    }
                }else{
                    return Response::json(array('succes'=>"notimage"));
                }
            }else{
                return Response::json(array('succes'=>"notfound"));
            }
       
        }
          ///// toping
     public function updtop( Request $a){
             
  
   
      
   
    
       DB::table('adding')
               ->where('id',"=",$a->id)
               ->update(['produs'=>$a->produs,
                         'pret'=>$a->pret]);
     
        
      
      return 'true';
        }   
        
     public function newtop(request $a){
             
  
                DB::table('adding')
                     ->insert(['produs'=>$a->produs,
                               'pret'=>$a->pret]);



                    return 'true';
        }  
  
    public function delpizz(Request $a){
        
        $old=DB::table("tip_pizza") 
                                    ->where('id',"=",$a->id)
                                        ->value('image');
                                         File::delete($old);
      DB::table("tip_pizza")
              ->where('id',"=",$a->id)
              ->delete();
       
      
        return 'true';
    }
  
    
        
        public function uploadd(Request $request){
         
            $files=$request->file("logo");
            $extensii=["jpeg","jpg","png","svg"];
            if ($request->hasFile('logo')) {
                if($request->file('logo')->isValid()){
                    $ext=$files->getClientOriginalExtension();
                    if(in_array($ext, $extensii)){
                        if(filesize($files)<6000000){
                            $name=str_random(100);;
                            $path="img/products/items/";
                            if($request->file('logo')->move($path,$name.".".$ext)){
                                $filename=$path.$name.".".$ext;
                                DB::table("tip_pizza")
                                    ->insert([
                                        'name'=>$request->nume,
                                        'ingrediente'=>$request->descriere,
                                        'price'=>$request->pret,
                                        'image'=>$filename]);
                                
                                return Response::json(array('succes'=>true,"image"=>asset($filename)));
                            }else{
                                return Response::json(array('succes'=>"Eror"));
                            }
                        }else{
                            return Response::json(array('succes'=>"max6mb"));
                        }
                    }else{
                        return Response::json(array('succes'=>"notjpg"));
                    }
                }else{
                    return Response::json(array('succes'=>"notimage"));
                }
            }else{
                return Response::json(array('succes'=>"notfound"));
            }
        }

    //lucru cu user----------------------------------------------------------------------------------
      public function utilizatori (){
        if (\Auth::guest()) {
            return redirect('/login');
           
        } 
        else {
           
            $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                    ->value('admin'); 
            if ($us!=1)  { return redirect('/'); } 
           
           
        }
         $data = DB::table("users")->get();
    return view('admin_panel.user', ['data' => $data]);
       
        
    }
    
    public function upduser(Request $a){
      DB::table("users")
              ->where('id',"=",$a->id)
              ->update(['name'=>$a->nume,
                        'email'=>$a->email,
                         'password'=>bcrypt($a->password),
                        'number'=>$a->number,
                        'adr'=>$a->adre]);
      
        return 'true';
    }
    
    public function modifdrept(Request $a){
        DB::table("users")
                ->where('id',"=",$a->id)
                ->update(['admin'=>$a->adm]);
        return 'true';
    }
    
    
    
    //cart 
    
   
    
    
	}
        
    