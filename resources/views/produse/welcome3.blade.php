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
          <a class="navbar-brand" href="{{URL("/")}}">PizzaStudio</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
     
        <li><a href="{{URL("articleon")}}"> Pizza</a></li>
           <li><a href="{{URl("salate")}}">Salate</a></li>
        <li><a href="{{URl("desert")}}"> Desert</a></li>
        <li><a href="{{URl("bauturi")}}"> Bauturi</a></li>
       
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="{{URL("/shopcart")}}"> Shop Cart 
                   
                </a> 
            </li>
            
        </ul>
         
    </div>
  </div>
</nav>
        <?php
session_start(); 
?>       
         
  
    @yield("content3")
    
  <div  style="position: relative;width:100%;margin-left: 0%" class="jos stinga10px footer-distributed ">
		Copyright © 2016 Delicious Pizza
		</div>
 

     </div>
      

</body>
</html>
