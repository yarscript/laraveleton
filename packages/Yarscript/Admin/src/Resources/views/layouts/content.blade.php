@extends('admin::layouts.master')

@section('content-wrapper')

    <div class="page-content">
        <div class="container-fluid">

            <div class="content-wrapper">

                @include ('admin::layouts.tabs')

                @yield('content')

            </div>

        </div>
    </div>

@stop