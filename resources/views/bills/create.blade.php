@extends('layout')


@section('content')

<h1>Create New Bill</h1>

<form method="POST" action="/create">

    {{ csrf_field() }}
    <input type="text" name="title" placeholder="Title">
    <textarea type="text" name="description" placeholder="Description"></textarea>
    <input type="text" name="number" placeholder="Amount">
    <input type="submit" class="success button">
</form>

@if ($errors->any())

@foreach ($errors->all() as $error)

<p>{{$error}}</p>
    
@endforeach

@endif

@endsection