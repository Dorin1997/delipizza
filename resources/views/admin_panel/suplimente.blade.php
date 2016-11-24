@extends("admin_panel.welcome2")
@section("content2")



    @foreach($result as $key=>$value )
  
   <Div clas="row">
        <div class="showtoping"> 
            <b>{{$key}}: </b> 
            <div class="nodisp"      <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-remove"></span> Remove
                </button>
                   </div> 
  
   
         @foreach($value as $a )
    
          <br> <div class="disp" > 
             
         
             <div class="nodisp">   <button type="button" class="btn btn-default btn-sm" style="height: 24px;">
          <span class="glyphicon glyphicon-remove"></span> Remove
           </button>  </div>  {{$a->produs}}  ({{$a->pret}}) </div>
       
        @endforeach
        
        </div><br>
    @endforeach
</ul>
 </div>
   


  @endsection
