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
<div style='margin-top:50px;' >
    
    
      @if (Auth::guest())
                       <!-- daca nu e logat -->
                     

                          <!-- daca nu e logat sa se logheze  -->
                     @endif
    <p> Panel de administrare </p>
</div>
        
</body>
        
