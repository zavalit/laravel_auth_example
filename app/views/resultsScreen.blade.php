@extends('testApp')
<h1> Results Screen </h1>

<ul>
@foreach($results as $user)

  <li>Name: {{ $user->name }}, Email: {{ $user->email }}</li>

@endforeach
</ul>
