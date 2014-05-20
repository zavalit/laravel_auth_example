@extends('testApp')

@if(Session::has('message'))
    <p class="alert">{{ Session::get('message') }}</p>
@endif

<h1> Login Screen </h1>

{{ Form::open(array('url'=>'/login_user')) }}
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }} </li>
@endforeach
</ul>

{{ Form::text('email', null, array('placeholder'=>'Email'))}}
{{ Form::password('password', array('placeholder'=>'Password')) }}

{{ Form::submit('Login') }}

{{ Form::close() }}
