@extends("admin_panel.welcome2")
@section("content2")

<div class="head" style="margin-top:65px;color:white;">
 @foreach($data as $b)
    
        
         
            
        <div>

            <p style="margin-left:10px;">
                    Nume: {{$b->name}}  <br> 
                    E-mail: {{$b->email}} <Br>
                    Number: {{$b->number}} <Br> 
                    Adresa: {{$b->adr}} <Br>
                    Drepturi de Admin: {{$b->admin}}
                  
                         
                    
                   <button type="button" name='{{$b->admin}}' class=" btn-primary  mod" id="{{$b->id}}">Modificare drepturi </button></p>
           
                   
          
            <Br>
         </div>
   
@endforeach
 </div>
 <script> 
 
$("body").on("click",".mod",function() {
    var drept=0;
     var id=$(this).attr("id");
     var admin=$(this).attr("name");
      if (admin==='1') {drept=0}else{drept=1}
   
      
        $.ajax({  
            type: 'GET',  
            url: "{{URL('/upadm')}}", 
            data: 
                { id:id,
                  adm:drept
                  
            
                },
            success: function(data) {
              if (data==='true'){location.reload();}
            }
        });
   
    });
</script>
  @endsection
