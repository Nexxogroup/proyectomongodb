<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="@yield('linkcss')">
    
    <title>@yield('title', 'Proformas Nexxo China')</title>

    <!-- Bootstrap -->
    {{HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen'))}}

    {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
    {{-- WARNING: Respond.js doesn't work if you view the page via file:// --}}
    {{--[if lt IE 9]>
      {{HTML::script('assets/js/html5shiv.js')}}
      {{HTML::script('assets/js/respond.min.js')}}
    <![endif]--}}
  </head>
  <body>
    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- begin page content here --}}
      <div class="container">
        @yield('content')
      </div>
    </div>
    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/bootstrap.min.js')}}
  </body>
</html>