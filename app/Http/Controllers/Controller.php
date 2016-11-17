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
    
    public function photoup(){
        $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    }
}