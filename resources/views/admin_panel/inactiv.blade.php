@extends("admin_panel.welcome2")
@section("content2")
<div class="head" style="margin-top:65px;color:white;">
    @if(!empty($lista) && count($lista)>0)
        @foreach($lista as $i)
        <div class="afisareprod">
             <h4 >
                 <?php $total=0; ?>
                > Shipping Details   {{$i["name"]->usname}},{{$i["name"]->number}},{{$i["name"]->adr}}
               
             </h4>
             @foreach($i["produse"] as $j)
             <?php 
              $total+=$j->sum+$j->price;
              ?>
                <h5> Nume Pizza : {{$j->pzname}} </h3>
                <h4>Cantitate: {{$j->cantitate}} <br>
                    Blat :{{$j->blat}} <br>
                    Marimea : {{$j->marime}} <Br> 
                    Suplimente :{{$j->suplimente}} <Br>
                     <?php  if ($j->message !='') echo 'User Message :',$j->message;    ?>  </h4>
                
                  
                </h5>
            @endforeach
          <?php   echo  'Suma Totala ',$total;   ?>
            <hr>
        @endforeach 
          </div>
    @else
    <h1>Nu sunt produse</h1>
    @endif
</div>
    


  @endsection
