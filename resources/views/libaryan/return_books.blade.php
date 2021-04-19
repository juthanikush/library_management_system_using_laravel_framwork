@extends('layout')
@section('page_title','Add Books')
@section('container')
<form method="post" action="{{route('library/return_book')}}">
@csrf
<input type="hidden" name="id"  class="form-control" required>
<div class="form-group">
    <label class="label">Call no:</label>
    <input type="text" name="call_no"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Student Id:</label>
    <input type="text" name="stuid"  class="form-control" required>
</div>
@if(session()->has('message'))
    <label style="font-size:30px;color:black;">{{session('message')}}</label>
    @endif<br>
<button class="btn btn-success">Submit</button>
</form>


@endsection('container')