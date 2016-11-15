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
            <form id="id">
  
    
            <table class="tableedit">
            <tr>
                <th> </th>
                <th> </th>
                <th> </th>
            </tr>
            <tr>
                <td>Nume  </td>
                <td><input id="nume" type="text" name="nume"  value="" </td>
                
            </tr>
            
            <tr>
                <td>Descriere </td>
                <td> <textarea id="descriere" cols="40" rows="5"   ></textarea> </td>
               
            </tr>
            
               <tr>
                <td>Pret</td>
                <td> <input type="number" id="price"  value=""></td>
                
            </tr>
            
                <tr>
                <td>Poza  </td>
                <td> <input type="text" id="image"  value=""><br>
                    <input type="file" id="file" class="custom-file-input">
 </td>
                
            </tr>
            
            
        </table>
            </form>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-left create"   >   Adauga  </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
          </div>
           </div>

     <!-- finish add funcha -->
     
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
           <div class="modal fade" id="mod{{$b->id}}" role="dialog">
          <div class="modal-dialog">
              
             
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificare Pizza</h4>
        </div>
         
        <div class="modal-body">
            <form id="{{$b->id}}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
            <table class="tableedit">
            <tr>
                <th> </th>
                <th> </th>
                <th> </th>
            </tr>
            <tr>
                <td>Nume  </td>
                <td><input id="nume{{$b->id}}" type="text" name="nume"  value="{{$b->name}}" </td>
                
            </tr>
            
            <tr>
                <td>Descriere </td>
                <td> <textarea id="descriere{{$b->id}}" cols="40" rows="5">{{$b->ingrediente}}</textarea> </td>
               
            </tr>
            
               <tr>
                <td>Pret</td>
                <td> <input type="number" id="price{{$b->id}}" min='0' onkeypress='return event.charCode !== 45 ' value="{{$b->price}}" </td>
                
            </tr>
            
                <tr>
                <td>Poza  </td>
                <td> <input type="text" id="image{{$b->id}}"  value="{{$b->image}}">  
                    <input type="file" id="file" class="custom-file-input">
                </td>
                
            </tr>
            
            
        </table>
            </form>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-left add"  id="{{$b->id}}" >   Modifica  </button>
             <button class="btn btn-primary pull-left del" id="{{$b->id}}"  >   Delete  </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    
</div>  
    
    
    
</div>
         @endforeach

         
         
     
</div>
   
<script> 
   $("body").on("click",".add",function() {
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
   
    });
    
      $("body").on("click",".del",function() {
        id=$(this).attr("id");
        $.ajax({  
            type: 'GET',  
            url: "{{URL('/delete')}}", 
            data: 
                { id:id
                },
            success: function(data) {
              if (data==='true'){location.reload();}
            }
        });
    });
    
     $("body").on("click",".create",function() {
        id=$(this).attr("add");
        if (($("#price").val()!== "")&& ($("#price").val() > '0') && ($("#nume").val()!== "") && ($("#descriere").val()!== "") )  {
        
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
    } else { alert('Datele introduse sunt gresite.')};
    });
    
    </script>






  @endsection
