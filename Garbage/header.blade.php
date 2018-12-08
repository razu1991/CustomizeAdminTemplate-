<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootadmin.min.css')}}">
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <title>Admin Panel</title>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#">Admin Panel</a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;{{ Auth::guard('admin')->user()->name }}</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="{{ url('admin/profile') }}" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
                    <a href="{{ url('admin/changePassword') }}" class="dropdown-item"><i class="fa fa-cog"></i> Change Password</a>
                    <a href="#"  class="dropdown-item"onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-angle-left"></i> Logout</a>
                    <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>