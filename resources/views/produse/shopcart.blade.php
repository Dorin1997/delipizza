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
         
         
<Div style="color: white;margin-top:65px;">
    @if(!empty($cart) && count($cart)>0)
    <h1>Shopping Cart</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th style="padding-left:60px;">Quantity</th>
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
              <td style="padding-left:60px;"><input type="number" class="form-control text-center" value="{{$i->cantitate }}" ></td>
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
            <td><a href="{{URL('/articleon')}}" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
            <td colspan="2"></td>
          
            <td class="text-center"><strong>Total  <?php echo $sumtotal; ?> </strong></td>
            <td><a href="checkout.php" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
           
        </tr>
    </tfoot>
    </table>
    @else
    <h1 class="text-center">Nu sunt produse</h1>
    @endif
    </Div>


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
