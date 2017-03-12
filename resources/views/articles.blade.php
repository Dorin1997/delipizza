<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"
          <link href="{{asset('/css/bootstrap-theme.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap-theme_1.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> 
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Delicious Pizza</title> 
    </head>
    <body> 
     <div id="toata">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          <a class="navbar-brand" href="{{URL("/")}}">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
     
        <li><a href="{{URL("articleon")}}"><span class=""></span> Pizza</a></li>
           <li><a href="{{URl("salate")}}"><span class=""></span> Salate</a></li>
        <li><a href="{{URl("desert")}}"><span class=""></span> Desert</a></li>
        <li><a href="{{URl("bauturi")}}"><span class=""></span> Bauturi</a></li>
       
      </ul>
    
    </div>
  </div>
</nav>

     
   

<div class="head" style="margin-top:65px;">
  
    @foreach($data as $b)
    
<div class="product_display" >
    <Div> 
    <a class="pull-left"  >
        <img alt="" class="img-polar " 
             src="{{ asset($b->image) }}"></a>
    </div>
    
<div class="media-body text-art">
     
    <h4 style="margin-left:10px;">{{$b->name}}   <small></small></h4 ><p style="margin-left:10px;"> 
      
        <?php 
          $text=$b->ingrediente;
          if (strlen($text)<180) { echo $text; } 
          else { $txtmod=substr($text,0,180);  echo $txtmod." ... ";}
        
        ?>
        
      </p>
   
    <!--<span class="item_price"> </span> --> 
    <h4  style="margin-left:10px;"> Price : {{$b->price}} </h4>
    <br><br> <br> <span class="show-menu">
<a href="{{URL("order-".$b->id)}}" class="btn btn-primary pull-right">Order</a></span>

</div>



</div>  
     @endforeach

   
     
</div>
  <div  style="position: relative;width:100%;margin-left: 0%" class="jos stinga10px footer-distributed ">
		Copyright © 2016 Delicious Pizza
		</div>
 

     </div>
      

</body>
</html>
