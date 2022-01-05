@extends('admin::layouts.anonymous-master')

@section('title')
    {{ $title ?? 'Admin Login' }} | {{ config('app.name', 'E-assurance') }}
@endsection

@section('content')
    <login submit-url="{{ route('admin.session.store') }}"></login>
@endsection
