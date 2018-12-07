<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ArchiveBd | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('admin/css/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.datepicker.min.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- jQuery 3 -->
  <script src="{{asset('admin/js/jquery.min.js')}}"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
   <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">A-BD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Archive BD</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                <p>
                  Alexander Pierce 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li id="dashboard">
        <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
      <a href="#">
        <i class="fa fa-cogs"></i> <span>Settings</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li id="systemSettings"><a href="{{ url('admin/system/setting/') }}"><i class="fa fa-circle-o"></i>System Settings</a></li>
        <li id="category"><a href="{{ url('admin/category/') }}"><i class="fa fa-circle-o"></i>Category</a></li>
        <li id="product"><a href="{{ url('admin/product') }}"><i class="fa fa-circle-o"></i>Product</a></li>
        <li id="userSettings"><a href="{{ url('admin/user/settings/show') }}"><i class="fa fa-circle-o"></i>Brand</a></li>
        <li id="userSettings"><a href="{{ url('admin/user/settings/show') }}"><i class="fa fa-circle-o"></i>Tags</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-list"></i> <span>Order List</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li id="systemSettings"><a href="{{ url('admin/system/setting/') }}"><i class="fa fa-circle-o"></i>Pending Order</a></li>
        <li id="category"><a href="{{ url('admin/category/') }}"><i class="fa fa-circle-o"></i>Complete Order</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-calculator"></i> <span>Inventory</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Stock List</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Stock Out List</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Reorder List</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Adjustment List</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Featured Product List</a></li> 
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Hot Deals Product List</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-list"></i> <span>Sales Report</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Top Sale</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Daily Sale</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Monthly Sale</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Yearly Sale</a></li>
        <li id="systemSettings"><a href="{{ url('admin/system/settings/show') }}"><i class="fa fa-circle-o"></i>Custom Sale</a></li>
      </ul>
    </li> 
     <li id="dashboard">
        <a href="{{url('dashboard')}}">
            <i class="fa fa-arrow-down"></i><span>Logout</span>
        </a>
    </li>        
    </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
   @yield('content')
    <!--Footer-->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <!--Footer end-->
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.datepicker.min.js')}}"></script>
<script src="{{asset('admin/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>

</body>
</html>
