@extends('layout')
@section('page_title','View Libaryan')
@section('container')
<div class="show">
   <table class="table">
       <tr>
           <th>Name</th>
           <th>City</th>
           <th>Address</th>
           <th>contact_us</th>
           <th colspan='2'>Action</th>
       </tr>
       @foreach($data as $list)
  
    <tr>
        
        <th class="label">{{$list->name}}</th>
        <th class="label">{{$list->city}}</th>
        <th class="label">{{$list->addres}}</th>
        <th class="label">{{$list->contact_us}}</th>
        <th class="label"><a href="{{url('admin/delete')}}/{{$list->id}}">Delete</a></th>
        <th class="label"><a href="{{url('account/add_account')}}/{{$list->id}}">Edit</a><th>
    </tr>
    @endforeach
   </table>
</div>    
@endsection('container')