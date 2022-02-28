@extends('admin::layouts.anonymous-master')

@section('title')
    {{ $title ?? 'Admin Login' }} | {{ config('app.name', 'Laraveleton') }}
@endsection

@section('content')
    <login submit-url="{{ route('admin.session.store') }}"></login>
@endsection
