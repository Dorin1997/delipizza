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
                             
                                   <input type="number" id="qty"  name="qty" size="3" min='1'  value="1" >
                                  
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
          <h3 style="margin-left:150px;"> Select size </h3>
         
             <input style="margin-left:150px; " type="radio" name="size" id="s1" value="Medium" checked >Medium(8 felii)<br>
             <input style="margin-left:150px;" type="radio" name="size" id="s2" value="Large" >Large(12 felii)<br>
             <input style="margin-left:150px;" type="radio" name="size" id="s3" value="Party">Party(24 felii) 
         
      </div>
      
      <div class="col-md-6" >
          <h3 style="margin-left:60px;">Select Crust Style </h3>
        
              <input style="margin-left:60px;" type="radio" name="size2" id="b1" value="Blat Subtire" checked >Blat Subțire<br>
              <input style="margin-left:60px;" type="radio" name="size2" id="b2" value="Blat Gros">Blat Gros<br>
              <input style="margin-left:60px;" type="radio" name="size2" id="b3" value="Deep Dish">Deep Dish<br>     
      </div>
     
  </div>
     <br> 
     <h3 style="text-align: center;" > Alegeți suplemete: </h3>
     
     
     <div style="margin-left:70px;" >
        
         
            
            
            
            
           
             <form  id="formsup"  method="post" name="formsup">
            @foreach($elem as $e)
            
            <div style="float:left;margin-right: 50px">
         <label style="font-weight: normal;">   <input id="{{$e->id}}" class='imp' type="checkbox"  name="myCheckboxes[]" value="{{$e->produs}}" >     {{$e->produs}}  </label>
            <span id="sup{{$e->id}}" style='display: none;'>  <small >{{$e->pret}}</small>
              
             
            </span>
         
    <!--     <span  id="supp{{$e->id}}" style='display: none;'> 
             <Select style="color:black" class='span2 small topping_preference' style="width:90px;" > 
              <option> Toata pizza</option>  
              <option> Partea dreapta </option>   
              <option> Partea Stinga </option> 
             
             </select> 
         </span>  -->
            </div>
          
            </form>
            
            
         
         
            
         
           @endforeach
        
     </div>

     </div>
    
      <br>
      <div class="textuser">
          <p>.</p>
          <textarea placeholder="Aici puteti specifica dorintele dumnoavoastra referitor la preparare  "id="message" name="message"rows="4" style="width:50%;"></textarea>
      </div>
   

    <div class="butnjos">
        
         <button class="btn btn-success" id="{{$produs->id}}" name="addcart">Add to cart</button>
   
        <a style="color:black" href="{{URL("/articleon")}}"> <button type="button"> Cancel</button>  </a>
      </div>
     <hr class="hrstyle2">
      </div>
        <script>
        $('.imp').on('click' ,function() {
            $("#sup"+this.id).toggle();
            $("#supp"+this.id).toggle();
        });
        
    
        $("button[name=addcart]").on("click",function(){
            
          
            
            if (document.getElementById('s1').checked) {
                size_checked = document.getElementById('s1').value;
              }
              else
               if (document.getElementById('s2').checked) {
                size_checked  = document.getElementById('s2').value;
              }
              else
               if (document.getElementById('s3').checked) {
                size_checked  = document.getElementById('s3').value;
              }
            if (document.getElementById('b1').checked) {
                blat_checked  = document.getElementById('b1').value;
              }
              else
              if (document.getElementById('b2').checked) {
                blat_checked  = document.getElementById('b2').value;
              }
             if (document.getElementById('b3').checked) {
                blat_checked  = document.getElementById('b3').value;
              }
           
           var myCheckboxes = new Array();
            $("input:checked").each(function() {
               myCheckboxes.push($(this).val());
            });
            myCheckboxes.shift();
            myCheckboxes.shift();
            var supl=myCheckboxes.toString();
         
         var message = $('textarea#message').val();
         
            var idprod=$(this).attr("id");
            $.ajax({  
                type: 'get',  
                url: "{{URL('/addcart')}}", 
                data: 
                    { 
                      id:idprod,
                      cantitate:$("input[name=qty]").val(),
                      marime:size_checked,
                      blat:blat_checked,
                      supli:supl,
                      msg:message,
                    },
                success: function(data) {
                 window.location.href="{{URL('/articleon')}}";
                }
            });
        });
</script>
  @endif

    
  @endsection