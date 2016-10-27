@extends("welcome")
@section("content")

 @if (!empty($produs))
 <div style="margin-top:65px;">
     
     
     <div>
        <table class="table table-condesed table-striped table-bordered color">
            <thead>
                <tr> <th> Product </th>
                    <th> Cantitate </th>
                    <th> Price </th> </tr>
            </thead>
            <tbody> 
                <tr> <th> <span class="name" >({{$produs->name}})</span> Ingrediente :{{$produs->ingrediente}} </th>
                            <th> 
                                <form class="formnr">
                                   <input type="text" size="3" value="1" >
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
        
            
         
    
     
    
  <div class="row">
      <h3 style="text-align: center;" > Personalizează-ți pizza cu suplimentele preferate:</h3>
      <div class="col-md-6"  >
          <h3 style="margin-left:100px;"> Select size </h3>
         <form>
             <input style="margin-left:90px;" type="radio" name="size" value="Medium" checked>Medium(8 felii)$9.95<br>
  <input style="margin-left:90px;" type="radio" name="size" value="XLarge">Large(12 felii)$13.95 <br>
    <input  style="margin-left:90px;" type="radio" name="size" value="Party">Party(24 felii)$16.95 
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
     <br>  <h3 style="text-align: center;" > Alegeți suplemete: </h3>
     
     
     <div class="row" style="margin-left:70px;" >
        
         
             @foreach($tipe as $t)
             <div class="col-md-4"  >
              <form> 
             <h3>  {{$t->numetip}} </h3>
           
             
            @foreach($elem as $e)
           
         @if ($t->id == $e->idtip)
         <label style="font-weight: normal;">   <input id="{{$e->id}}" class='imp' type="checkbox"  value=""  >     {{$e->produs}}  </label>
            <span id="sup{{$e->id}}" style='display: none;'> 
                <small style="color:gray">{{$e->pret}}</small>
                <Select class='span2 small topping_preference' id='{{$e->id}}' style="width:90px;"> 
                 <option> Normal</option>  
                 <option> Putin </option>  
                 <option> Mult </option> 
                 </select>
             
            </span>
         <Br>  
         <span  id="supp{{$e->id}}" style='display: none;'> 
             <Select class='span2 small topping_preference' style="width:90px;" > 
              <option> Toata pizza</option>  
              <option> Partea dreapta </option>   
              <option> Partea Stinga </option> 
             
             </select> 
         </span>
           
          
         <br>  @else @continue; 
              @endif
            
           
         
         @endforeach
              </form>
         </div>
           @endforeach
           
     </div>
     
    <script>
        $('.imp').on('click' ,function() {
            $("#sup"+this.id).toggle();
            $("#supp"+this.id).toggle();
        });
    </script>
    <Br>
    <input style="margin-left: 50px;" type="submit"   value="Add/Update" >
    <a style="color:black" href="{{URL("/articleon")}}"> <button type="button"> Cancel</button>  </a>
     <hr class="hrstyle2">
      </div>
   
 
  @endif
  @endsection