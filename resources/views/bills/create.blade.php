@extends('layout')


@section('content')

<h1>Create New Bill</h1>

<form method="POST" action="/create">

    {{ csrf_field() }}
    <div class="form-group">
    <input type="text" name="title" placeholder="Title" class="form-control">
    </div>

    <div class="form-group">
    <textarea type="text" name="description" placeholder="Description" class="form-control"></textarea>
    </div>

    <div class="form-group">
    <input type="text" name="number" placeholder="Amount" class="form-control">
    </div>
    <input type="submit" class="btn btn-primary">
</form>

@if ($errors->any())

@foreach ($errors->all() as $error)

<p>{{$error}}</p>
    
@endforeach

@endif

@endsection