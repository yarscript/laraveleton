<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $layout = isset($_COOKIE['layout']) ? $_COOKIE['layout'] : "light";
    $css_file = "";
    switch ($layout) {
        case 'dark':
            $css_file = "admin/assets/css/app-dark.css";
            break;
        case 'rtl':
            $css_file = "admin/assets/css/app-rtl.css";
            break;
        default:
            $css_file = "admin/assets/css/app.css";
            break;
    }
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ url('favicon.png') }}">
    <title>
        @yield('title', config('app.name', 'Laraveleton'))
    </title>
    <meta content="Laraveleton Admin" name="description" />
    <script src="{{ asset('admin/assets/js/app.js') }}" defer></script>
    <link href="{{ asset($css_file) }}" rel="stylesheet" id="layout-css">
</head>

<body>
<noscript>
    <strong>We're sorry but Laraveleton doesn't work properly without JavaScript enabled. Please enable it to
        continue.</strong>
</noscript>
<div id="app">
    @yield('content')
</div>
<!-- built files will be auto injected -->
@stack('scripts')
</body>

</html>
