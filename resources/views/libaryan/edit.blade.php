@extends('layout')
@section('page_title','Add Books')
@section('container')

<form method="post" action="{{route('library/update')}}">
@csrf
<input type="hidden" name="id" value="{{$data[0]->id}}" class="form-control" required>
<div class="form-group">
    <label class="label">Call no:</label>
    <input type="text" name="call_no" value="{{$data[0]->call_no}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Name:</label>
    <input type="text" name="name" value="{{$data[0]->name}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Auther:</label>
    <input type="text" name="auth" value="{{$data[0]->Auth}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Publisher:</label>
    <input type="text" name="publi" value="{{$data[0]->publishar}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Quantity:</label>
    <input type="text" name="qty" value="{{$data[0]->qty}}" class="form-control" required>
</div><br>
<button class="btn btn-success">Submit</button>
</form>


@endsection('container')