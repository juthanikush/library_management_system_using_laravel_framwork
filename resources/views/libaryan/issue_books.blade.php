@extends('layout')
@section('page_title','Add libaryan')
@section('container')
<form method="post" action="{{route('libaryn/issue_book')}}">
@csrf
<input type="hidden" name="id"  class="form-control" required>
<div class="form-group">
    <label class="label">BOOK Call No:</label>
    <input type="text" name="book_no"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Student Id:</label>
    <input type="text" name="stuid"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Student Name:</label>
    <input type="text" name="stuname"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Student Contact:</label>
    <input type="text" name="stucontact"  class="form-control" required>
</div><br>
<button class="btn btn-success">Submit</button>
</form>


@endsection('container')