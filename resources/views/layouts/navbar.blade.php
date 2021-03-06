<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Laravel
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/employee') }}">사원정보</a></li>
                
                <li class="dropdown">
                    <a href="{{ url('/contract') }}">계약<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/contract') }}">계약목록</a></li>
                        <li><a href="{{ url('/bond') }}">지급보증</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/asset') }}">자산<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/asset') }}">자산목록</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/insurance') }}">보험<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/insurance') }}">보험목록</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/policy') }}">규정<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/policy/hrm') }}">인사규정</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{ url('/information') }}">정보<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/information') }}">정보</a></li>
                    </ul>
                </li>


            </ul>
      
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
