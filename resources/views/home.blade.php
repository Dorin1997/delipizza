@extends("welcome")
@section("content")


<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          

            <Div>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav  " >
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a aria-expanded="false" style="font-style: italic;" >
                                {{ Auth::user()->name }} 
                            </a>

                           
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div >
        
        
        
        
        <!------------------- -->
        
        
        
        <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#mod">Modificare date account</button>
  

                <div class="head" style="margin-top:65px;">
       
            
       <!-- add funcha -->
        
           <div class="modal fade" id="mod" role="dialog">
          <div class="modal-dialog">
              
             
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificare Date</h4>
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
                <td>Name User  </td>
                <td><input id="nume" type="text" name="nume" required  value="{{Auth::user() -> name }}" </td>
                
            </tr>
            
            <tr>
                <td>E-mail </td>
                <td> <input type="email" name="nume" required id="email"  value="{{Auth::user() ->email}}" </td>
               
            </tr>
            
          
            
            
            
               <tr>
              <td>Number Phone  </td>
                <td> <input type="text" name="nume" required id="number" value="{{Auth::user() ->number}}" </td>
                
            </tr>
            
                <tr>
                <td>Address  </td>
                <td> <input type="text" name="nume" required id="adre" value="{{Auth::user() ->adr}}" </td>
                </td>
                
            </tr>
            
            
        </table>
            
           
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary pull-left add"  id="{{Auth::user()->id}}" >   Adauga  </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           </form>
        </div>
      </div>
          </div>
           </div>
        
       
        
       
      

        
     
       
  
       </div>
    
    <!-- Scripts -->
    
    <script> 
  
    
    
     $("body").on("click",".add",function() {
        id=$(this).attr("id");
      
        $.ajax({  
            type: 'GET',  
            url: "{{URL('/updateu')}}", 
            data: 
                { id:id,
                  nume:$("#nume").val(),
                  email:$("#email").val(),
                  password:$("#password").val(),
                  number:$("#number").val(),
                  adre:$("#adre").val()
            
                },
            success: function(data) {
              if (data==='true'){location.reload();}
            }
        });
   
    });
    </script>
    <div > </div>
    </div>


    
    
@endsection
