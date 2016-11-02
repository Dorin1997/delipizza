<head>
    <title> Admin Panel </title> 
       
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"
          <link href="{{asset('/css/bootstrap-theme.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap-theme_1.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> 
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <a class="navbar-brand" href="{{URL("/panel")}}">Delicious Pizza</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      
       
       <li><a  href="{{URL("/ac")}}">Comenzi active</a></li>
       <li><a href="{{URL("/ic")}}">Comenzi finisate</a></li>
       <li><a href="{{URL("/user")}}">Utilizatori</a></li>
        <li><a href="{{URL("/pz")}}">Pizza</a></li>
      </ul>   
    </div>
  </div>
</nav>
    
    @yield("content2")
    
 <!-- <div class="jos stinga10px ">
		Copyright © 2016 Delicious Pizza
		</div>
 footer--> 
</div>
</body>
</html>