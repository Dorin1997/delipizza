@extends("welcome2")
@section("content2")

 
 @foreach($data as $b)
    
        
           

            
        <div>

            <p style="margin-left:10px;">Nume: {{$b->name}}  <br> E-mail: {{$b->email}} <Br>
            
                Password: {{$b->password}} <Br> Number: {{$b->number}} <Br> Adresa: {{$b->adr}} 
                <Br>Drepturi de Admin: {{$b->admin}} </p>
            

            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#mod{{$b->id}}">Modificare </button>
            <Br>
         </div>
    
@endforeach

  @endsection
