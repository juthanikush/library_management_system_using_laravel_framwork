@extends('layout')
@section('page_title','View Libaryan')
@section('container')
<div class="show">
   <table class="table">
       <tr>
           <th>call_no</th>
           <th>id</th>
           <th>name</th>
           <th>contact</th>           
       </tr>
       @foreach($data as $list)
       <tr>
           <td>{{$list->book_call_no}}</td>
           <td>{{$list->student_id}}</td>
           <td>{{$list->student_name}}</td>
           <td>{{$list->student_contact}}</td>
        
          
       </tr>
       @endforeach
    </table>
</div>
@endsection('container')