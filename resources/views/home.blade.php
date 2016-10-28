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
    <div class="col-md-5 ">
        
        <table class="tableedit">
            <tr>
                <th> </th>
                <th> </th>
                <th> </th>
            </tr>
            <tr>
                <td>User  </td>
                <td><input id="name" type="text" name="nume" readonly="readonly" value="  {{Auth::user() -> name }}" </td>
                <td><button   id="Aname" </button> Modifica </td>
            </tr>
            
            <tr>
                <td>E-mail  </td>
                <td> <input type="text" name="nume" readonly="true" value="  {{Auth::user() ->email}}" </td>
                <td><button  </button> Modifica </td>
            </tr>
            
               <tr>
                <td>Number Phone  </td>
                <td> <input type="text" name="nume" readonly="true" value="  {{Auth::user() ->number}}" </td>
                <td><button   </button> Modifica </td>
            </tr>
            
                <tr>
                <td>Address  </td>
                <td> <input type="text" name="nume" readonly="true" value="  {{Auth::user() ->adr}}" </td>
                <td> <button   </button> Modifica </td>
            </tr>
        </table>
     
        
      
        
        
      
<script type="text/javascript">
 

   $('Aname').click(function(){

         $(':input').removeAttr('readonly'); 
    
       
    
});
</script>
        
     
       
  
       </div>
    
    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <div style="height: 615px;"> </div>



    
    
@endsection
