<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;


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
    return view('articles', ['data' => $data]);
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
        $tipe=DB::table("tip_adaos")->get(); 
        
        return view("order",["produs"=>$produs,"elem"=>$elem,"tipe"=>$tipe]);
        
    }
  
    
    
    //--------  admin
    
    public function articles(){
        if (\Auth::guest()) {
            return redirect('/login');
           
        } 
        else {
           
            $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                    ->value('admin'); 
            if ($us!=1)  { return redirect('/'); } 
           
           
        }
       
        
        return view('menuarticles');
    }
    
    public function activcom (){
        if (\Auth::guest()) {
            return redirect('/login');
           
        } 
        else {
           
            $us = DB::table("users")->where('id','=',\Auth::user()->id ) 
                    ->value('admin'); 
            if ($us!=1)  { return redirect('/'); } 
           
           
        }
        
         $data = DB::table("tip_pizza")->get();
    return view('activcom', ['data' => $data]);
       
        
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
    return view('inactiv', ['data' => $data]);
       
        
    }
    
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
    return view('user', ['data' => $data]);
       
        
    }
   
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
    return view('pizza', ['data' => $data]);
       
        
    }
    
    public function updpizz(Request $a){
      DB::table("tip_pizza")
              ->where('id',"=",$a->id)
              ->update(['name'=>$a->nume,
                        'ingrediente'=>$a->descriere,
                        'price'=>$a->price,
                        'image'=>$a->poza]);
      
        return 'true';
    }
    
       public function addpizz(Request $a){
      
           
      DB::table("tip_pizza")
              ->insert([
                        'name'=>$a->nume,
                        'ingrediente'=>$a->descriere,
                        'price'=>$a->price,
                        'image'=>$a->poza]);
      
        return 'true';
    }
    
    public function delpizz(Request $a){
      DB::table("tip_pizza")
              ->where('id',"=",$a->id)
              ->delete();
      
        return 'true';
    }
    
    
    
    
    public function upduser(Request $a){
      DB::table("users")
              ->where('id',"=",$a->id)
              ->update(['name'=>$a->nume,
                        'email'=>$a->email,
                        'number'=>$a->number,
                        'adr'=>$a->adre]);
      
        return 'true';
    }
    
    
}