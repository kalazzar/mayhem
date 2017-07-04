<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        
<!--         <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}"> -->


        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>This is Mayhem</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')
        @yield('after-styles-end')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

        <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}"  media="screen,projection"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />

            <!-- CSS Files -->
        <link rel="stylesheet" href="{{asset('css/main_style.css')}}">

    </head>
    <body id="app-layout">

    @if(Auth::check()) 
    @include('includes.nav')
    @endif
        <div class="container">
            @include('includes.partials.messages')
            @yield('content')
        </div><!-- container -->

        <!-- JavaScripts -->


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>

        <script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.js"></script>  

        <script type="text/javascript">

           $(document).ready(function(){
                $('.tooltipped').tooltip({delay: 50});
              });
        </script>


        @yield('before-scripts-end')


        @yield('after-scripts-end')

        @include('includes.partials.ga')
    </body>
</html>