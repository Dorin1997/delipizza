@extends("welcome")
@section("content")

<div class="head" style="margin-top:65px;">
  
 
    @foreach($data as $b)
    
<div class="product_display" >
    <Div> 
    <a class="pull-left"  >
        <img alt="" class="img-polar " 
             src="{{ asset($b->image) }}"></a>
    </div>
    
<div class="media-body text-art">
     
    <h4 style="margin-left:10px;">{{$b->name}}   <small></small></h4 ><p style="margin-left:10px;"> {{$b->ingrediente}}</p>
    <!--<span class="item_price"> </span> --> 
    <h4  style="margin-left:10px;"> Price : {{$b->price}} </h4>
    <br><br> <br> <span class="show-menu">
<a href="{{URL("order-".$b->id)}}" class="btn btn-primary pull-right">Order</a></span>

</div>



</div>  
     @endforeach

   
     
</div>
  
 

  @endsection