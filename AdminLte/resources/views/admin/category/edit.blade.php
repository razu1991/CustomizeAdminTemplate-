@extends('admin.layouts.master')
@section('content')
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
     <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
              <strong>{{ session()->get('success') }}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <!-- general form elements -->
          <div class="box box-primary">

            <div class="box-header bg-primary">
              <h3 class="box-title text-uppercase sys-info">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ url('admin/category/'.$category->id) }}">
              @method('PUT')
              @csrf
              <div class="box-body">
                  <div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
                    <label for="name">Name&nbsp;<span class="text-danger">*</span></label>
                    <input type="name" class="form-control" value="{{ $category->name }}" name="name" id="name" placeholder="Enter category name">
                   @if($errors->has('name'))
                   <strong>
                      <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('name') }}</p>
                    </strong>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" value="{{ $category->title }}" id="title" name="title" placeholder="Enter category title">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" value="{{ $category->description }}" name="description" placeholder="Enter category description">
                  </div>
                    <div class="form-group {{ $errors->has('status') ? 'has-error':''}}">
                          <label for="status">Status&nbsp;<span class="text-danger">*</span></label>
                          <select class="form-control requiredFocus" id="status"  name="status">
                              <option value="Active"{{ $category->status=='Active' ? 'selected':'' }}>
                                Active
                              </option>
                              <option value="Inactive" {{ $category->status=='Inactive' ? 'selected':'' }}>Inactive</option>
                          </select>
                          @if($errors->has('status'))
                           <strong>
                            <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('status') }}</p>
                            </strong>
                        @endif
                    </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
        </div>
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
