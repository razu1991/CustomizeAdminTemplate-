@extends('admin.layouts.master')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
              <strong>{{ session()->get('success') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <!-- /.box -->
          <div class="box no-border">
            <div class="box-header bg-primary">
              <h3 class="box-title sys-info">Product List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Image</th>
                  <th>Details</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                  $i=1;
                @endphp
                @foreach($productList as $product)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $product->name }}</td>
                  <td>60</td>
                  <td>100</td>
                  <td>image</td>
                  <td>
                    <button class="btn btn-primary"><i class="fa fa-eye"></i>Details</button>
                  </td>
                  <td>Active</td>
                  <td>Edit|Delete</td>
                </tr>
                @endforeach
                <tfoot>
                  <tr>
                      <td class="text-center" colspan="7"></td>
                      <td class="text-left" colspan="1">
                          <a href="{{ url('admin/product/create') }}">
                              <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Product</button>
                          </a>
                      </td>
                  </tr>
              </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--Menubar auto select-->
  <script type="text/javascript">
        $("#product").addClass("active");
        $("#product").parent().parent().addClass("menu-open");
        $("#product").parent().css("display","block");
</script>
  <!--Menubar auto select-->
@endsection 

