@extends('testApp')
<h1> Home Screen </h1>

<a href="/login">Login Screen</a>
<a href="/register">Register Screen</a>

<form action="/make_search" method="post">
<label>Search</label>
<input type="text" name="string_to_search"/>
</form>
