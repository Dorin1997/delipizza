@extends("admin_panel.welcome2")
@section("content2")
<div class="head" style="margin-top:65px;color:white;">
    @if(!empty($lista) && count($lista)>0)
        @foreach($lista as $i)
             <h4 >
                > Shipping Details   {{$i["name"]->usname}},{{$i["name"]->number}},{{$i["name"]->adr}}
                
             </h4>
        <a  class="btn btn-danger send" id="{{$i["name"]->usid}}" ><i class="glyphicon glyphicon-ok"></i></a>
             @foreach($i["produse"] as $j)
                <h5> Nume Pizza : {{$j->pzname}} </h3>
                <h4>Ingrediente: {{$j->ingrediente}} <br> 
                    Cantitate: {{$j->cantitate}} <br>
                    Blat :{{$j->blat}} <br>
                    Marimea : {{$j->marime}} <Br> 
                    Suplimente :{{$j->suplimente}} <Br>
                     <?php if ($j->message !='') echo 'User Message :',$j->message ?>  </h4>
                    <br>
                </h5>
            @endforeach
            <hr>
        @endforeach 
    @else
    <h1>Nu sunt produse</h1>
    @endif
</div>
     <Script>
         $("body").on("click",".send",function() {
            usid=$(this).attr("id");
           
            $.ajax({  
                type: 'GET',  
                url: "{{URL('/finish')}}", 
                data: 
                    { 
                        id:usid
                    },
                  
                success: function(data) {
                  if (data==='true'){location.reload();}
                }
            });
        });  
        </script>


  @endsection
