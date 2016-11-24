@extends("admin_panel.welcome2")
@section("content2")



    @foreach($result as $key=>$value )
  
        <Div clas="row">
            <div class="showtoping"> 
                   
                    <div class="disp" > 
                <div class="nodisp">  
                      <button type="button" class="glyphicon glyphicon-pencil mod" data-toggle="modal" data-target="#mod{{$key}}"> Modifica</button>
                </div>  
                      
                 <b>{{$key}}: </b> 
             
            </div>
                     
                    
                    
                    
                       
  
   
        
                            <!-- modificare -->
                        <div class="modal fade" id="mod{{$key}}" role="dialog">
                        <div class="modal-dialog">


                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modificare topping</h4>
                        </div>

                            <div class="modal-body">
                            <form enctype="multipart/form-data" id="{{$key}}" role="form" method="POST" action="" >
                                    <div class="form-group">
                                          <label for="Categorie">Categoria</label>
                                        <input type="text" class="form-control" id="a{{$key}}" name="{{$key}}" value="{{$key}}" >
                                    </div>
                                             <label for="Categorie">Elemente</label>
                                          @foreach($value as $a )
                                    <div class="form-group" >
                                        <input style="width:49%;display: inline;float:left;" type="text" class="form-control" id="a{{$a->id}}" name="supl{{$a->id}}" value=" {{$a->produs}}" >
                                        <input style="width:49%"type="text" class="form-control" id="a{{$a->id}}" name="supl{{$a->id}}" value=" {{$a->pret}}" >
                                    </div>
                                          @endforeach
                   
                            </form>
                            </div>
                                <div class="modal-footer">
                                     <button class="btn btn-primary pull-left updt"  id="{{$key}}" >   Modifica  </button>

                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            
                        </div>
                        </div>     
                        </div>
                    
                    <!-- sfirsit de modificare -->
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
    $("body").on("click",".updt",function() {
     
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
        
    $("body").on("click",".del",function() {
       id=$(this).attr("id");
       $.ajax({  
           type: 'GET',  
           url: "{{URL('/delete')}}", 
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
