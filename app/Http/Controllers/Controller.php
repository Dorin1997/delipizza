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
       
        
        return view('admin_panel.menuarticles');
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
    return view('admin_panel.activcom', ['data' => $data]);
       
        
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
    
    public function updpizz(Request $a){
      DB::table("tip_pizza")
              ->where('id',"=",$a->id)
              ->update(['name'=>$a->nume,
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
    
    	 
	public function addimage(Request $request)
	{
        $image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
		if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return $this->create()->with('success', 'Image Uploaded Successfully');
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
}