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

  

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <div style="height: 615px;"> </div>



    
    
@endsection
