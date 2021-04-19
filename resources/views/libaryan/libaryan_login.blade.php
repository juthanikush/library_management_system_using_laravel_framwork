@extends('layout')
@section('page_title','Library')
@section('container')
<h1>Welcome Library</h1>
<form action ="{{url('libray/login')}}" method = "post">
    @csrf
    <label class="label">UserName  :</label><input type = "text" name ="username" class = "box"/><br /><br />
    <label class="label">Password  :</label><input type = "password" name ="password" class = "box" /><br/><br />
    
    @if(session()->has('error'))
    <label class="label">{{session('error')}}</label>
    @endif
    <input type = "submit" value = "Submit" name="submit" class="btn btn-primary"/><br />
</form>
<a href="{{url('/')}}" class="btn btn-primary">Back</a>
@endsection('container')