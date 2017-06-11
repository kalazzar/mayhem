<style type="text/css">

</style>
<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container" style="margin-top: 7px">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{!! route('frontend.index') !!}">
                Project Mayhem
            </a>
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">


                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>{!! link_to('login', trans('navs.frontend.login')) !!}</li>
                    <li>{!! link_to('register', trans('navs.frontend.register')) !!}</li>
                @else
                <li class="col l1 col m6">
                        <a href="{!! route('frontend.user.dashboard') !!}">Menu</a>
                    </li>
                    <li class="col l1 col m6">
                        <!-- <i class="material-icons prefix">account_box</i>                     -->
                        <a href="#" class="dropdown-button"  data-activates="dropdownNav">
                            {{ Auth::user()->name }}
                        </a>

                        <ul id="dropdownNav" class="dropdown-content" style="margin-top: 50px;">
                            <!-- <li>{!! link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) !!}</li> -->

                           {{-- @if (access()->user()->canChangePassword())
                                <li>{!! link_to_route('auth.password.change', trans('navs.frontend.user.change_password')) !!}</li>
                            @endif  --}}

                            @permission('view-backend')
                                <li>{!! link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) !!}</li>
                            @endauth

                            <li>{!! link_to_route('auth.logout', trans('navs.general.logout')) !!}</li>
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