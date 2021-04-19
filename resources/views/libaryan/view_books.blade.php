@extends('layout')
@section('page_title','View Libaryan')
@section('container')
<div class="show">
   <table class="table">
       <tr>
           <th>call_no</th>
           <th>name</th>
           <th>Auth</th>
           <th>publishar</th>
           <th>qty</th>
           <th colspan='2'>Action</th>
       </tr>
       @foreach($data as $list)
       <tr>
           <td>{{$list->call_no}}</td>
           <td>{{$list->name}}</td>
           <td>{{$list->Auth}}</td>
           <td>{{$list->publishar}}</td>
           <td>{{$list->qty}}</td>
           <td class="label"><a href="{{url('libaryan/delete')}}/{{$list->id}}">Delete</a></td>
            <td class="label"><a href="{{url('libaryan/edit')}}/{{$list->id}}">Edit</a><td>
       </tr>
       @endforeach
    </table>
</div>
@endsection('container')