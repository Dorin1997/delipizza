<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
           <style>
    .container{padding: 50px;}
    input[type="number"]{width: 20%;}
    </style>
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
     
        <li><a  href="{{URL("articleon")}}">Comanda Online</a></li>
        <li><a href="{{URL("info")}}">Contact Us</a></li>         
       
      </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <li> <a href="{{URL("/shopcart")}}"><span class="glyphicon glyphicon-shopping-cart"></span> Shop Cart</a></li> 
                <li><a href="{{URL("login")}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="{{URl("/register")}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
            </li>
            
        </ul>
         
    </div>
  </div>
</nav>
         
         
<Div style="color: white;margin-top:65px;">
    @if(!empty($cart) && count($cart)>0)
    <h1>Shopping Cart</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th style="padding-left:60px;">Quantity</th>
            <th> Marime </th>
            <th> Blat </th>
            <th>Subtotal</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        
       <?php $sumtotal=0; ?>
       @foreach($cart as $i)
        <tr>
        
               <td>{{$i->name }}</td>
              <td>{{$i->price }}</td>
              <td style="padding-left:80px;">{{$i->cantitate }} </td>
              <td >{{$i->marime }}</td>
              <td>{{$i->blat }}</td>
               <td>{{$i->total }}</td>
         <?php $sumtotal+=$i->total; ?>
            <td>
                <a  class="btn btn-danger delete" id="{{$i->id}}" ><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
       @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td><a href="{{URL('/shopcart')}}" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Shop Cart</a></td>
            <td colspan="2"></td>
          
            <td class="text-center"><strong>Total  <?php echo $sumtotal; ?> </strong></td>
            <td><a href="{{URL('/placeorder')}}" class="btn btn-success btn-block" onclick="afisare()" >Place Order <i class="glyphicon glyphicon-menu-right"></i></a></td>
    <Script>
        function afisare(){
            return confirm('Are you sure ?');
            
        }
        </script>
        </tr>
    </tfoot>
    </table>
    @else
    <h1 class="text-center">Nu sunt produse</h1>
    @endif
    </Div>

         
         <div style="color:White" class="shipdet" > 
          
                <h2>  Shipping details </h2>
                <ul>
                    <li>Numele => <i> <strong>{{$user->name}}</strong></i></li>
                    <li>Numarul =><i> <strong> {{$user->number}}</strong></i></li>
                    <li>Adresa =><i> <strong>{{$user->adr}}</strong></i></li>

                </ul>
             
                <button type="button" style="margin-left:15px;" class="btn btn-primary pull-left" data-toggle="modal" data-target="#mod">Modificare date account</button>
         </div>
     
          <div class="modal fade" id="mod" role="dialog">
          <div class="modal-dialog">
              
             
     <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modificare Date</h4>
                </div>

         <div class="modal-body">
                


              <table class="tableedit">
                    <tr>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    <tr>
                        <td>Name User  </td>
                        <td><input id="nume" type="text" name="nume" required  value="{{Auth::user() -> name }}" </td>
                    </tr>
                    <tr>
                        <td>Number Phone  </td>
                        <td> <input type="text" name="nume" required id="number" value="{{Auth::user() ->number}}" </td>
                    </tr>
                        <tr>
                        <td>Address  </td>
                        <td> <input type="text" name="nume" required id="adre" value="{{Auth::user() ->adr}}" </td>
                        </td>
                    </tr>
              </table>

           
        </div>
         
           <div class="modal-footer">
            <button class="btn btn-primary pull-left add"  id="{{Auth::user()->id}}" >   Adauga  </button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
          </div>
         
    </div>
          </div>
           </div>
        
       
	@yield("content")
		<div class="jos stinga10px ">
		Copyright © 2016 Delicious Pizza
		</div>
     </div>
        <Script>
         $("body").on("click",".delete",function() {
            id=$(this).attr("id");
            $.ajax({  
                type: 'GET',  
                url: "{{URL('/delcart')}}", 
                data: 
                    { 
                        id:id
                    },
                  
                success: function(data) {
                  if (data==='true'){location.reload();}
                }
            });
        });  
        </script>
</body>
</html>
