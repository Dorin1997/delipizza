@extends("admin_panel.welcome2")
@section("content2")
<div class="head" style="margin-top:65px;color:white;">
    @if(!empty($lista) && count($lista)>0)
        @foreach($lista as $i)
             <h4 >
                > Shipping Details   {{$i["name"]->usname}},{{$i["name"]->number}},{{$i["name"]->adr}}
             </h4>
             @foreach($i["produse"] as $j)
                <h5> Nume Pizza : {{$j->pzname}} </h3>
                <h4>Cantitate: {{$j->cantitate}} <br>
                    Blat :{{$j->blat}} <br>
                    Marimea : {{$j->marime}} <Br> 
                    Suplimente :{{$j->suplimente}} <Br>
                     <?php if ($j->message !='') echo 'User Message :',$j->message ?>  </h4>
                  
                </h5>
            @endforeach
            <hr>
        @endforeach 
    @else
    <h1>Nu sunt produse</h1>
    @endif
</div>
    


  @endsection
