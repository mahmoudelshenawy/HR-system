<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @include('layouts.partials.head')
      <style>
        .page-wrapper{
        min-height: 625px;
        padding-top: 0px                                             }
      </style>
  </head>
  <body>
@include('layouts.partials.nav')
@include('layouts.partials.header')
@yield('content')
@include('layouts.partials.footer-scripts')
  </body>
</html>
