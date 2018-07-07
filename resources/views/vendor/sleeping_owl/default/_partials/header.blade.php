<a href="{{ url(config('sleeping_owl.url_prefix')) }}" class="logo">
    <span class="logo-lg">{!! AdminTemplate::getLogo() !!}</span>
    <span class="logo-mini">{!! AdminTemplate::getLogoMini() !!}</span>
</a>
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>

                    <a href="{{ route('logout') }}" style="color: white;position:relative;top:10px"
                       onmouseover="this.style.textDecorationLine='underLine'"
                       onmouseout="this.style.textDecorationLine='none';"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        @stack('navbar')
    </ul>

    <ul class="nav navbar-nav navbar-right">
        @stack('navbar.right')
    </ul>
</div>
</nav>
