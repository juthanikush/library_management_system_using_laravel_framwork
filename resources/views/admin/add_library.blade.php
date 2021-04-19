@extends('layout')
@section('page_title','Add libaryan')
@section('container')
<form method="post" action="{{route('admin/add_library')}}">
@csrf
<input type="hidden" name="id" val="id" class="form-control" required>
<div class="form-group">
    <label class="label">Name:</label>
    <input type="text" name="name" val="name" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Password:</label>
    <input type="password" name="password" val="password" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">City:</label>
    <input type="text" name="city" val="email" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Address:</label>
    <textarea name="address"   class="form-control"></textarea>
</div>
<div class="form-group">
    <label class="label">Contact:</label>
    <input type="text" name="contact" val="contact" class="form-control" required>
</div><br>
<button class="btn btn-success">Submit</button>
</form>


@endsection('container')