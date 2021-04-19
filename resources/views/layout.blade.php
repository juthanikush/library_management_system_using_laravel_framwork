<!DOCTYPE html>
<html>
<head>
	<title>@yield('page_title')</title>
	<!-- CSS only -->
	<link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  @if(session()->has('ADMIN_LOGIN'))
    <a class="navbar-brand" href="{{url('admin/admin_deshboard')}}">Admin</a>
  @endif
  @if(session()->has('ADMIN_ACCOUNT'))
    <a class="navbar-brand" href="{{url('libaryan_deshboard')}}">Library</a>
    
  @endif
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      @if(session()->has('ADMIN_LOGIN'))
      <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('admin/admin_deshboard')}}">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('admin/Add_library')}}">Add Library</a>
      </li>
      <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('admin/view')}}">View Library</a>
      </li>
      <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('admin/logout')}}">Logout</a>
      </li>
        @endif
      @if(session()->has('LIBRARY_LOGIN'))
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('libaryan_deshboard')}}">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="{{url('libaryan/add_books')}}">Add Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('libaryan/view_books')}}">View Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('libaryan/issue_books')}}">Issue Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('libaryan/view_issue_books')}}">View Issue Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('libaryan/return_books')}}">Return Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('libaryan/logout')}}">Logout</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<div class="contaner" >
	<div class="blank">
        @section('container')
        @show
	</div>
</div>
<footer class="footer">
	<center><label class="label">Create By Kush Juthani</label></center>
</footer>
</body>
</html>