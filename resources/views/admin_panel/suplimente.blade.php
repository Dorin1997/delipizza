@extends("admin_panel.welcome2")
@section("content2")
 <!-- Add a unui toping -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mod" >
    <span class="glyphicon">New Topping </span>  </button>
                             <hr>
<div class="modal fade" id="mod" role="dialog">
                        <div class="modal-dialog">


                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">New topping</h4>
                        </div>

                            <div class="modal-body">
                                <form enctype="multipart/form-data" id="" role="form" method="get" action="" >
                                        <div class="form-group">
                                           
                                              
                                            <label >Name</label>  <input type="text" class="form-control" id="a" name="numetop" value="" >
                                            <label style="margin-top: 5px">Price</label> <input type="number" min="0"  class="form-control" id="b" name="prettop" value="" >
                                   
                                        </div>
                                                 
                                            
                                              

                                </form>
                            </div>
                                <div class="modal-footer">
                                     <button class="btn btn-primary pull-left newadd"  id="abc" >   Modifica  </button>

                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            
                        </div>
                        </div>     
                        </div>



 <!-- afisare si modificare -->
         <Div style="color:white;font-size: 24px;">
        @foreach($elem as $a )
      <div class="disp"> 
                <div class="nodisp">  

                         <button type="button" class="btn glyphicon glyphicon-pencil mod" data-toggle="modal" data-target="#mod{{$a->id}}" >
                             <span class="glyphicon">Modifica </span>  </button>
                          <button type="button" class="btn btn-default btn-sm del" id="{{$a->id}}" >
                         <span class="glyphicon glyphicon-remove">Remove </span>  </button>  
                    
                </div>  
          
          <p> {{$a->produs}} | {{$a->pret}} </p>
      </div>         
           @endforeach
</div>
              
               
     @foreach($elem as $a )
                    
                        <div class="modal fade" id="mod{{$a->id}}" role="dialog">
                        <div class="modal-dialog">


                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modificare topping</h4>
                        </div>

                            <div class="modal-body">
                                <form enctype="multipart/form-data" id="update_form{{$a->id}}" role="form" method="post" action="" >
                                        <div class="form-group">
                                            <label for="Categorie">Modificare</label>
                                              
                                            <input type="text" class="form-control" id="a{{$a->id}}" name="numetop" value="{{$a->produs}}" >
                                            <input type="number" min="0" style="margin-top: 5px" class="form-control" id="b{{$a->id}}" name="prettop" value="{{$a->pret}}" >
                                   
                                        </div>
                                                 
                                            
                                              

                                </form>
                            </div>
                                <div class="modal-footer">
                                     <button class="btn btn-primary pull-left addbtn"  id="abc{{$a->id}}" >   Modifica  </button>

                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            
                        </div>
                        </div>     
                        </div>
  @endforeach
         
   
   <script>
         $(".newadd").click(function(){ 
     
        $.ajax({  
            type: 'GET',  
            url: "{{URL('/new-toping')}}", 
            data: 
                { 
                  produs:$("#a").val(),
                  pret:$("#b").val()
                
            
                },
            success: function(data) {
              if (data==='true'){location.reload();}
           }
        });
   
    }); 
           $(".addbtn").click(function(){      
           var id=$(this).attr("id").replace("abc","");  
      
      
        $.ajax({  
            type: 'GET',  
            url: "{{URL('/update-toping')}}", 
            data: 
                { id:id,
                  produs:$("#a"+id).val(),
                  pret:$("#b"+id).val()
                
            
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
