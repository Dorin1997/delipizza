@extends("admin_panel.welcome2")
@section("content2")
<div class="head" style="margin-top:65px;color:white;">
    @if(!empty($lista) && count($lista)>0)
        @foreach($lista as $i)
             <h5>
                 Shipping Details   {{$i["name"]->usname}},{{$i["name"]->number}},{{$i["name"]->adr}}
             </h5>
             @foreach($i["produse"] as $j)
                <h3> Nume Pizza : {{$j->pzname}} </h3>
                <h4>Ingrediente: {{$j->ingrediente}} <br> 
                    Blat :{{$j->blat}} <br>
                    Marimea : {{$j->marime}} <Br> 
                    Suplimente :{{$j->suplimente}} <Br>
                     <?php if ($j->message !='') echo 'User Message :',$j->message ?>  </h4>
                    <br>
                </h4>
            @endforeach
            <hr>
        @endforeach 
    @else
    <h1>Nu sunt produse</h1>
    @endif
</div>
    
  @endsection
