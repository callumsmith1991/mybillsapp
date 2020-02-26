@extends('layout')


@section('content')

<h1>Callum bills app</h1>

<table class="table table-striped">
    <thead>
        <tr>
        <th>Title</th>
        <th>Amount</th>
        <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($bills as $bill)

        <tr>

        <td>{{$bill->title}}</td>
        <td>{{$bill->number}}</td>
        <td><a href="{{ url('/') }}/edit/{{$bill->id}}" class="button">Edit</a></td>

        <tr>

        
            
        @endforeach
        
    </tbody>
</table>

<p><a href="{{ url('/') }}/create/" class="button">Create New</a></p>



@endsection