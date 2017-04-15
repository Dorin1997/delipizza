@extends("admin_panel.welcome2")
@section("content2")
<div class="head" style="margin-top:65px;color:white;">
    
      @foreach($lista as $i)
     
      <h3>Order id : {{$i->orid}} </h3>
      <h5> Shipping Details   {{$i->usname}},{{$i->number}},{{$i->adr}} </h5>
      <h3> Nume Pizza : {{$i->pzname}} </h3>
      <h4>Ingrediente: {{$i->ingrediente}} <br>  Blat :{{$i->blat}} <br> Marimea : {{$i->marime}} <Br> Suplimente :{{$i->suplimente}},
          <br>
          <?php if ($i->message !='') echo 'User Message :',$i->message ?>  </h4>
      <hr>
          
      
      
      @endforeach 
      </div>
    
  @endsection
