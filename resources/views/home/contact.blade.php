@extends('layouts.app')

@section('title', 'Contact page')

@section('content')
<h1>Contant page</h1>

@can('home.secret')
    <a href="{{ route('home.secret') }}">Visit secret contact page.</a>
@endcan
@endsection
