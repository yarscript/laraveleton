@extends('admin::layouts.content')

@section('title')
{{--    {{ __('admin::app.sales.orders.title') }}--}}{{ 'Dashboard' }}
@stop

@section('content')

    @component('admin::layouts.common.breadcrumb')
        @slot('title') {{ 'Dashboard' }} @endslot
        @slot('li_1')  Dashboard @endslot
    @endcomponent

@stop

