

@extends('layout')


@section('content')

<form method="POST" action="/edit/{{$bill->id}}">

    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" value="{{$bill->title}}" class="form-control">
    </div>
    <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" value="{{$bill->description}}" class="form-control">
    </div>
    <div class="form-group">
    <label for="number">Amount</label>
    <input type="text" name="number" value="{{$bill->number}}" class="form-control">
    </div>
    <input type="submit" value="Update" class="btn btn-primary">
</form>

<form method="POST" action="/edit/{{ $bill->id}}">

    {{ method_field('DELETE')}}
    {{ csrf_field() }}



    <div class="form-group">
    <input type="submit" value="Delete" class="btn btn-danger">
    </div>


</form>

@if ($errors->any())

@foreach ($errors->all() as $error)

<p>{{$error}}</p>
    
@endforeach

@endif

@endsection