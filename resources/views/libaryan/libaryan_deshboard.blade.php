@extends('layout')
@section('page_title','Admin')
@section('container')
<h1 class="hadding">Welcome Libraryn</h1>
    @if(session()->has('message'))
    <label style="font-size:30px;color:black;">{{session('message')}}</label>
    @endif
    
@endsection('container')