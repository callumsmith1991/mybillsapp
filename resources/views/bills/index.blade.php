@extends('layout')


@section('content')

<h1>{{ Auth::user()->name }}'s Bills</h1>

@if($income == 0)

<h3>Add your Monthly income to calculate take home pay</h3>
<form method="POST" action="/createamount">
    {{ csrf_field() }}
     <div class="row">
         <div class="col-md-3 form-group">
            <input type="text" name="amount" class="form-control" />
         </div>
         <div class="col-md-3">
             <input type="submit" class="btn btn-primary" value="Add">
         </div>
     </div>
</form>

@else 

<p>Monthly Income: £{{$income}}</p>

@endif

@if(count($bills) > 0)

<table class="table table-dark">
    <thead>
        <tr>
        <th><strong>Title</strong></th>
        <th><strong>Amount</strong></th>
        <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach ($bills as $bill)

        <tr>

        <td>{{$bill->title}}</td>
        <td>£{{$bill->number}}</td>


        <td><a href="{{ url('/') }}/edit/{{$bill->id}}" class="btn btn-secondary">Edit</a></td>

        <tr>

        
            
        @endforeach
        
    </tbody>
</table>

@endif

<div class="row">
    <div class="col-md-3"><p><a href="{{ url('/') }}/create/" class="btn btn-primary">Create New Bill</a></p></div>
</div>

@if(count($bills) > 0)

<div class="row">
    <div class="col-md-3"><h4>Total Bills Amount: £{{$bills_total}}</h4></div>
</div>

@endif

@if($take_home_pay > 0)

<div class="row">
    <div class="col-md-12">
      <p>Take home pay after Bills: £{{$take_home_pay}}</p>
    </div>
</div>

@endif


@endsection