

@extends('layout')


@section('content')

<form method="POST" action="/edit/{{$bill->id}}">

    {{ csrf_field() }}
    {{ method_field('PATCH') }}

<input type="text" name="title" value="{{$bill->title}}">
    <input type="text" name="description" value="{{$bill->description}}">
    <input type="text" name="number" value="{{$bill->number}}">
    <input type="submit" value="Update" class="success button">
</form>

<form method="POST" action="/edit/{{ $bill->id}}">

    {{ method_field('DELETE')}}
    {{ csrf_field() }}



    <input type="submit" value="delete" class="alert button">


</form>

@if ($errors->any())

@foreach ($errors->all() as $error)

<p>{{$error}}</p>
    
@endforeach

@endif

@endsection