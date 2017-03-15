@extends("produse.welcome3")
@section("content3")


<div class="head" style="margin-top:65px;">

    @if(Session::has('cart'))
    <Div class='col-sm-6'>
        
        @foreach($product as $a)
        <ul>
            <li>{{a['qty']}}</li>
            <li>  {{a['item']['name']}} </li>
            <li> {{a['price']}}</li>
            <br>
        </ul>
        @endforeach
        
    </div>
    
    <div>
        <strong> Total: {{$totalPrice}} </strong>
    </div>
    @else
    <div>
        <h2>No items in cart </h2>
    </div>
    @endif
@endsection