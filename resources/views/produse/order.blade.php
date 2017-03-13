<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
       
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"
          <link href="{{asset('/css/bootstrap-theme.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap-theme_1.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
          <link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/> 
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Delicious Pizza</title> 
    </head>
    <body> 
     <div id="toata">
         
         <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          <a class="navbar-brand" href="{{URL("/")}}">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
     
        <li><a href="{{URL("articleon")}}"><span class=""></span> Pizza</a></li>
           <li><a href="{{URl("salate")}}"><span class=""></span> Salate</a></li>
        <li><a href="{{URl("desert")}}"><span class=""></span> Desert</a></li>
        <li><a href="{{URl("bauturi")}}"><span class=""></span> Bauturi</a></li>
       
      </ul>
    
    </div>
  </div>
</nav>
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
                                <form class="formnr">
                                   <input type="number" size="3" min='1' value="1" >
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
                <small >{{$e->pret}}</small>
                <Select style="color:black" class='span2 small topping_preference' id='{{$e->id}}' style="width:90px;"> 
                 <option> Normal</option>  
                 <option> Putin </option>  
                 <option> Mult </option> 
                 </select>
             
            </span>
         <Br>  
         <span  id="supp{{$e->id}}" style='display: none;'> 
             <Select style="color:black" class='span2 small topping_preference' style="width:90px;" > 
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
 </div>
 
  @endif

  <div  style="position: relative;" class="jos stinga10px footer-distributed ">
		Copyright © 2016 Delicious Pizza
		</div>
 

     
      

</body>
</html>