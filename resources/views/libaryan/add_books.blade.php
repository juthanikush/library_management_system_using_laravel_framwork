@extends('layout')
@section('page_title','Add Books')
@section('container')
<form method="post" action="{{route('library/add_book')}}">
@csrf
<input type="hidden" name="id"  class="form-control" required>
<div class="form-group">
    <label class="label">Call no:</label>
    <input type="text" name="call_no"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Name:</label>
    <input type="text" name="name"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Auther:</label>
    <input type="text" name="auth"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Publisher:</label>
    <input type="text" name="publi"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Quantity:</label>
    <input type="text" name="qty"  class="form-control" required>
</div><br>
<button class="btn btn-success">Submit</button>
</form>


@endsection('container')