@extends('testApp')
<h1> Home Screen </h1>

@if(Auth::check())
<a href="/logout">Logout</a>
@else
<a href="/login">Login Screen</a>
<a href="/register">Register Screen</a>
@endif

{{ Form::open(array('url'=>'/make_search')) }}

{{ Form::text('string_to_search', null, array('placeholder'=>'Search')) }}
{{ Form::submit('Search') }}

{{ Form::close() }}
