@extends("admin_panel.welcome2")
@section("content2")


<button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#mod">New pizza</button>
  

<div class="head" style="margin-top:65px;">
       
            
       <!-- add funcha -->
        
           <div class="modal fade" id="mod" role="dialog">
          <div class="modal-dialog">
              
             
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">New Pizza</h4>
        </div>
         
        <div class="modal-body">
                <form enctype="multipart/form-data" id="upload_form1" role="form" method="POST" action="" >
                    <div class="form-group">
                        <label for="catagry_name">Nume</label>
                         <input type="hidden" name="_token" value="{{ csrf_token()}}">
                        <input type="text" class="form-control" name="nume" id="catagry_name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="Descriere">Descriere</label>
                        <input type="text" class="form-control" name="descriere" id="Descriere" placeholder="Descriere">
                    </div>
                    <div class="form-group">
                        <label for="Pret">Pret</label>
                        <input type="Number" class="form-control" min="0" name="pret" id="Pret" placeholder="Pret">
                    </div>
                    <div class="form-group">
                        <label for="catagry_name">Photo</label>
                        <input type="file" name="logo" class="form-control" id="catagry_logo">
                        
                    </div>
                    </form>
                    <div class="modelFootr">
                      
        </div>
                
        </div>
        <div class="modal-footer">
              <button type="button" class="btn btn-primary pull-left addbtn">Add</button>
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <script>
                    $(".addbtn").click(function(){
                      
                        $.ajax({
                              url:'add-catagory',
                              data:new FormData($("#upload_form1")[0]),
                              dataType:'json',
                              async:false,
                              type:'post',
                              processData: false,
                              contentType: false,
                              success:function(response){
                                location.reload();
                              },
                            });
                         });
                    </script>
        </div>
      </div>
          </div>
           </div>

     <!-- finish add function -->
     <!-- display all pizza -->
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

        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#mod{{$b->id}}">Modificare </button>

        </div>

        </div>
    
    <!-- end display pizza -->
    
    
           <div class="modal fade" id="mod{{$b->id}}" role="dialog">
          <div class="modal-dialog">
              
             
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificare Pizza</h4>
        </div>
         
                <div class="modal-body">
                <form enctype="multipart/form-data" id="update_form{{$b->id}}" role="form" method="POST" action="" >
                    <div class="form-group">
                         <label for="catagry_name">Nume</label>
                         <input type="hidden" name="_token" value="{{ csrf_token()}}">
                         <input id="nume{{$b->id}}" type="text" class="form-control" name="nume"  value="{{$b->name}}" >
                      
                    </div>
                    <div class="form-group">
                        <label for="Descriere">Descriere</label>
                        <input type="text" class="form-control" id="descriere{{$b->id}}" name="descriere" value="{{$b->ingrediente}}" placeholder="Descriere">
                    </div>
                    <div class="form-group">
                        <label for="Pret">Pret</label>
                         <input type="number" class="form-control" id="price{{$b->id}}" min='0' name="price" onkeypress='return event.charCode !== 45 ' value="{{$b->price}}"
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="catagry_name">Photo</label>
                        <img alt="" class="img-polar " src="{{ asset($b->image) }}">
                     <input type="file" name="logo" class="form-control" id="catagry_logo">
                        
                    </div>
                    </form>
                    <div class="modelFootr">
                      
                    </div>
                
        
              
    
</div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-left updt"  id="abc{{$b->id}}" >   Modifica  </button>
             <button class="btn btn-primary pull-left del" id="{{$b->id}}"  >   Delete  </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    
</div>  
    
          
               
                
        
              
    
</div>
         @endforeach

         <script>
        $(".updt").click(function(){
           var id=$(this).attr("id").replace("abc","");
           var z=new FormData($("#update_form"+id)[0]);
           z.append('id',id);
             $.ajax({
                   url:'update-pizza',
                   data:z,
                   dataType:'json',
                   async:false,
                   type:'post',
                   processData: false,
                   contentType: false,
                   success:function(response){
                     location.reload();
                   },
                 });
              });
         </script>
         
     
</div>
  

  
  
<script> 
    
  
    
 /*  $("body").on("click",".add",function() {
        id=$(this).attr("id");
      
        $.ajax({  
            type: 'GET',  
            url: "{{URL('/update')}}", 
            data: 
                { id:id,
                  nume:$("#nume"+id).val(),
                  descriere:$("#descriere"+id).val(),
                  price:$("#price"+id).val(),
                  poza:$("#image"+id).val()
            
                },
            success: function(data) {
              if (data==='true'){location.reload();}
            }
        });
   
    });*/
    
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
    
   /*  $("body").on("click",".addbtn",function() {
        id=$(this).attr("add");
        if (($("#price").val()!== "") && ($("#price").val() > '0') && ($("#nume").val()!== "") && ($("#descriere").val()!== "") )  {
        
        $.ajax({  
            type: 'GET',  
            url: "{{URL('/create')}}", 
            data: 
                { id:id,
                  nume:$("#nume").val(),
                  descriere:$("#descriere").val(),
                  price:$("#price").val(),
                  poza:$("#image").val()
            
                },
            success: function(data) {
              if (data==='true'){location.reload();}
            }
        });
    } else { alert('Datele introduse nu sunt complete'); };
    });*/
    
    </script>






  @endsection
