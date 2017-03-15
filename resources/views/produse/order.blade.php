@extends("produse.welcome3")
@section("content3")
 @if (!empty($produs))
 <div style="margin-top:65px;">

     <div>
        <table class="table table-condesed table-striped table-bordered color">
            <thead>
                <tr> <th> {{$produs->name}} </th>
                    <th> Cantitate </th>
                    <th> Price </th> </tr>
            </thead>
            <tbody> 
                <tr> <th> Ingrediente :{{$produs->ingrediente}} </th>
                            <th> 
                                <form class="formnr" method="get">
                                   <input type="number" id="qty" size="3" min='1'  value="1" onchange="qtynumar()">
                                </form>      
                            </th>
                     <th> ${{$produs->price}} </th> </tr>
            </tbody>
        </table>  
    </div>
   
         <div >
             <div class="stinga10px" >  <img class="imgprodus" src="{{ asset($produs->image) }}">  </div>
             <hr class="hrstyle">
         </div>
        
            
         
    
     <div style="color:white">
    
  <div class="row" >
      <h3 style="text-align: center;" > Personalizează-ți pizza cu suplimentele preferate:</h3>
      <div class="col-md-6"  >
          <h3 style="margin-left:100px;"> Select size </h3>
         <form>
             <input style="margin-left:90px;" type="radio" name="size" value="Medium" checked>Medium(8 felii)<br>
  <input style="margin-left:90px;" type="radio" name="size" value="XLarge">Large(12 felii) <br>
    <input  style="margin-left:90px;" type="radio" name="size" value="Party">Party(24 felii) 
         </form> 
      </div>
      
      <div class="col-md-6" >
          <h3 style="margin-left:70px;">Select Crust Style </h3>
          <form style="margin-left:70px;">
              <input style="margin-left:50px;" type="radio" name="size" value="Subtire" checked>Blat Subțire<br>
  <input style="margin-left:50px;" type="radio" name="size" value="Gros">Blat Gros<br>
          </form>
      </div>
      
  </div>
     <br> 
     <h3 style="text-align: center;" > Alegeți suplemete: </h3>
     
     
     <div style="margin-left:70px;" >
        
         
            
            
              <form> 
            
           
             
            @foreach($elem as $e)
           
            <div style="float:left;margin-right: 50px">
         <label style="font-weight: normal;">   <input id="{{$e->id}}" class='imp' type="checkbox"  value=""  >     {{$e->produs}}  </label>
            <span id="sup{{$e->id}}" style='display: none;'>  <small >{{$e->pret}}</small>
               
             
            </span>
         
         <span  id="supp{{$e->id}}" style='display: none;'> 
             <Select style="color:black" class='span2 small topping_preference' style="width:90px;" > 
              <option> Toata pizza</option>  
              <option> Partea dreapta </option>   
              <option> Partea Stinga </option> 
             
             </select> 
         </span>
            </div>
          
         
            
            
         
         
              </form>
         
           @endforeach
        
     </div>
     
     </div>
      <br>
     
    <script>
        $('.imp').on('click' ,function() {
            $("#sup"+this.id).toggle();
            $("#supp"+this.id).toggle();
        });
        
        function qtynumar() {
            
    var x = document.getElementById("qty").value;
      return x;
  
}
    </script>
    <div class="butnjos">
        <p>.</p>
              <a class="btn btn-success" href="{{URL("add-to-cart/".$produs->id)}}">Add to cart</a>
   
      <a style="color:black" href="{{URL("/articleon")}}"> <button type="button"> Cancel</button>  </a>
      </div>
     <hr class="hrstyle2">
      </div>
    
 
  @endif

  @endsection