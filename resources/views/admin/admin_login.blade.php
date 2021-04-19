@extends('layout')
@section('page_title','Admin')
@section('container')
<h1 >Welcome Admin</h1>
<form action ="{{route('login')}}" method = "post">
    @csrf
    <label class="label">UserName  :</label><input type = "text" name ="username" class = "box" required/><br /><br />
    <label class="label">Password  :</label><input type = "password" name ="password" class = "box" required/><br/><br />
    
    @if(session()->has('error'))
    <label class="label">{{session('error')}}</label>
    @endif
    <input type = "submit" value = "Submit" name="submit" class="btn btn-primary"/><br />
</form>

<a href="{{url('/')}}" class="btn btn-primary">Back</a>
@endsection('container')