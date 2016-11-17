<?php

class Photo_Controller extends Base_Controller
{
    public $restful=true;
    
    public function post_upload()
            {
                $input = Input::all();
               
                $rules=array(
                    'photo' = 'required|image|max:500'
                );
           
            $v =validator::make($inout,$rules);
             if ($v->fails()){
                 return Redirect::to('/')->with_errors($v);
             }
             $extension = File::extension($input['photo']['name']);
             $directory=path('public').'uploads/';
            } 
}


?>