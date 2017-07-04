
<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container" style="">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->


            <!-- Branding Image -->
            <a class="navbar-brand" href="{!! url('/') !!}">
                Project Mayhem
            </a>
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>{!! URL('login', trans('navs.frontend.login')) !!}</li>
                    <li>{!! URL('register', trans('navs.frontend.register')) !!}</li>
                @else
                <li class="col l1 col m6">
                        <a href="{!! URL('/') !!}">Menu</a>
                    </li>
                    <li class="col l1 col m6">
                        <!-- <i class="material-icons prefix">account_box</i>                     -->
                        <a href="#" class="dropdown-button"  data-activates="dropdownNav">
                            {{ Auth::user()->name }}
                        </a>

                        <ul id="dropdownNav" class="dropdown-content" style="margin-top: 50px;">

                           {{-- @if (access()->user()->canChangePassword())
                                <li>{!! link_to_route('auth.password.change', trans('navs.frontend.user.change_password')) !!}</li>
                            @endif  --}}

                          {{--  @if(Auth::user()->isAdmin())
                                <li>{!! URL('/admin', trans('navs.frontend.user.administration')) !!}</li>
                            @endif --}}

                             <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </li>
                        </ul>
                    </li>
                    
                @endif

            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>

<script type="text/javascript">
      $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
</script>