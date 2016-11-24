@extends("admin_panel.welcome2")
@section("content2")



    @foreach($result as $key=>$value )
  
        <Div clas="row">
            <div class="showtoping"> 
                    <b>{{$key}}: </b> 
                     <div class="nodisp">      
                              <button type="button" class="btn btn-default btn-sm">
                                   <span class="glyphicon glyphicon-remove">Remove  </span> 
                              </button>
                     </div> 
  
   
         @foreach($value as $a )
    
            <br>
            <div class="disp"> 
                <div class="nodisp">  
                     <button type="button" class="btn btn-default btn-sm del" id="{{$a->id}}" style="height: 24px;">
                             <span class="glyphicon glyphicon-remove">Remove </span> 
                     </button>  
                </div>  
                
             {{$a->produs}}  ({{$a->pret}}) 
            </div>
            
          
            
       
         @endforeach
        
            </div><br>
            
    @endforeach

        </div>
    
   
    
    
    
   <script>
    $("body").on("click",".del",function() {
     
            id=$(this).attr("id");
            $.ajax({  
                type: 'GET',  
                url: "{{URL('/supldel')}}", 
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


  @endsection
