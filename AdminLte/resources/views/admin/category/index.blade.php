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
              <h3 class="box-title sys-info">Category List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                  $i=1;
                @endphp
                @foreach($categoryList as $category)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $category->name }}</td>
                  <td>
                    @if($category->title)
                    {{ str_limit($category->title,15) }} 
                    @if(strlen($category->title) > 15)
                      <a href="#" data-toggle="modal" class="text-primary" data-target="#catTitle{{ $category->id }}">Read More</a>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="catTitle{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="companyDetailsTitle">Company Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            {{ $category->title }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </td>
                  <td>
                    @if(($category->description))
                    {{ str_limit($category->description,20) }} 
                    @if(strlen($category->description) > 20)
                      <a href="#" data-toggle="modal" class="text-primary" data-target="#catDesc{{ $category->id }}">Read More</a>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="catDesc{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="companyDetailsTitle">Company Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            {{ $category->description }}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </td>
                  <td>
                    @if($category->status=='Active')
                      <p class="text-success">Active</p>
                    @else
                      <p class="text-danger">Inactive</p>
                    @endif
                  </td>
                  <td>
                  <!--Edit-->
                  <a href="{{ url('admin/category/' . $category->id . '/edit') }}">
                      <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i>&nbsp;Edit</button>
                  </a>                                                           
                  <!--Delete-->
                  <a href="javascript:void(0);" data-toggle="modal" data-target="#deleteRow{{ $category->id }}">
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                  </a>
                  <div id="deleteRow{{ $category->id }}" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-sm">
                          <div class="modal-content">
                              <form method="POST" action="{{ url('admin/category/'.$category->id ) }}">
                                  @method('Delete')
                                  @csrf
                                  <div class="modal-header" style="background-color: #F2DEDE;">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h5 class="modal-title" >Are you sure you want to delete?</h5>
                                      <input type="hidden" id="id" name="id" value="" />
                                  </div>
                                  <div class="modal-footer">
                                      <button type="submit" id="btnDelete" name="btnDelete" class="btn btn-danger center-block"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  <!--Delete-->
                  </td>
                </tr>
                @endforeach
                <tfoot>
                  <tr>
                      <td class="text-center" colspan="5"></td>
                      <td class="text-left" colspan="1">
                          <a href="{{ url('admin/category/create') }}">
                              <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New Category</button>
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
        $("#category").addClass("active");
        $("#category").parent().parent().addClass("menu-open");
        $("#category").parent().css("display","block");
</script>
  <!--Menubar auto select-->
@endsection 

