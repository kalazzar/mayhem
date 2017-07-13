@extends('layouts.master')

@section('content')

<style type="text/css">
    .big_button {
    /*margin-top: 100px;*/
    width: 300px;
    height: 170px;
    margin: 0 20px 40px 20px; 
    display: inline-block;
    padding: 50px;
    border-radius: 6px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.14), 0 2px 10px 2px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}
.big_button:hover {
    cursor: pointer;
    box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}

a {
    position: inherit;
}

a:hover, a:focus {
    color: white;
    text-decoration: none;
}

nav i, nav [class^="mdi-"], nav [class*="mdi-"], nav i.material-icons {
    margin-top: 12px;
    font-size: 35px;
}

</style>

<!-- <link rel="stylesheet" href="{{asset('css/timeline.css')}}"> -->
<link rel="stylesheet" href="{{asset('css/flowermenu.css')}}">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

<!-- <div>
<h4 align="center" style="margin-top: 140px;color: white;font-weight: bold;border:solid white 5px;padding:15px 0 15px 0;width: 60%;margin-left: 23%">Welcome to Project Mayhem</h4>
</div> -->

 <nav class="menu">
   <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
   <label class="menu-open-button tooltipped" data-position="top" data-delay="50" data-tooltip="Menu" for="menu-open">
    <span class="lines line-1"></span>
    <span class="lines line-2"></span>
    <span class="lines line-3"></span>
  </label>

<!--    <a href="#" class="menu-item blue"> <i class="fa fa-anchor"></i> </a>
   <a href="#" class="menu-item green"> <i class="fa fa-coffee"></i> </a> -->
   <a href="store" class="menu-item green tooltipped" data-position="right" data-delay="50" data-tooltip="Store Inventory"><i class="material-icons">system_update_alt</i> </a>
   <a href="inventory" class="menu-item blue tooltipped" data-position="bottom" data-delay="50" data-tooltip="Inventory"><i class="material-icons">content_paste</i></a>
   <a href="#" class="menu-item orange tooltipped" data-position="bottom" data-delay="50" data-tooltip="Inventory Log"><i class="material-icons">description</i> </a>
  
   @if(Voyager::can('browse_admin'))
   <a href="/admin" class="menu-item purple tooltipped" data-position="left" data-delay="50" data-tooltip="Admin Dashboard"><i class="material-icons">fingerprint</i></a>
   @else
   <a href="#" class="menu-item purple tooltipped" data-position="left" data-delay="50" data-tooltip="About"><i class="material-icons">fingerprint</i></a>
   @endif
</nav>


@endsection
