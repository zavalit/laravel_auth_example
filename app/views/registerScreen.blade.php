@extends('testApp')
<h1>Register Screen</h1>

{{ Form::open(array('url'=>'register_user')) }}
<ul>
  @foreach($errors->all() as $error)

       <li>{{ $error }}</li>

  @endforeach
</ul>
  {{ Form::text('name', null, array('placeholder'=>'Name')) }}
  {{ Form::text('email', null, array('placeholder'=>'Email')) }}
  {{ Form::password('password', array('placeholder'=>'Password')) }}
  {{ Form::password('password_confirmation', array('placeholder'=>'Password Confirmation')) }}
  
  {{ Form::submit('Register') }}

{{ Form::close() }}
