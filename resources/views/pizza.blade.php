@extends("welcome2")
@section("content2")


<div class="head" style="margin-top:65px;">
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
                <td><input id="nume{{$b->id}}" type="text" name="nume"  value="{{$b->name}} " </td>
                
            </tr>
            
            <tr>
                <td>Descriere </td>
                <td> <textarea id="descriere{{$b->id}}" cols="40" rows="5"   > {{$b->ingrediente}} </textarea> </td>
               
            </tr>
            
               <tr>
                <td>Pret</td>
                <td> <input type="text" id="price{{$b->id}}"  value="{{$b->price}} " </td>
                
            </tr>
            
                <tr>
                <td>Poza  </td>
                <td> <input type="text" id="image{{$b->id}}"  value="{{$b->image}} " </td>
                
            </tr>
            
            
        </table>
            </form>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-left add"  id="{{$b->id}}" >   Modifica  </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    
</div>  
    
    
    
</div>
         @endforeach

     
</div>
   
<script> 
    $("body").on("click",".add" , function(){
       id=$(this).attr("id");
       
       
       var form=new FormData(document.getElementById(id));
      $.ajax({
          type:"get",
          url:"{{URL('/update')}}",
          data:form,
          cache:false,
          ContentType:false,
          processData:false,
          success:function(data){
              alert(data);
          }
            
            });
      
      
            
    });
    </script>






  @endsection
