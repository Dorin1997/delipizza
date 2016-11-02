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
            <form>
            <table class="tableedit">
            <tr>
                <th> </th>
                <th> </th>
                <th> </th>
            </tr>
            <tr>
                <td>Nume  </td>
                <td><input id="name" type="text" name="nume"  value="{{$b->name}} " </td>
                
            </tr>
            
            <tr>
                <td>Descriere </td>
                <td> <textarea name="Text1" cols="40" rows="5"   > {{$b->ingrediente}} </textarea> </td>
               
            </tr>
            
               <tr>
                <td>Pret</td>
                <td> <input type="text" name="nume"  value="{{$b->price}} " </td>
                
            </tr>
            
                <tr>
                <td>Poza  </td>
                <td> <input type="text" name="nume"  value="{{$b->image}} " </td>
                
            </tr>
            
            
        </table>
            </form>
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-left" >   Modifica  </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     
    
</div>  
    
    
    
</div>
         @endforeach

     
</div>
   







  @endsection
