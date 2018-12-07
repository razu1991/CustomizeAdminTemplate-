  @extends('admin.layouts.master')
  @section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
     <div class="row">
      <!-- left column -->
      <div class="col-md-10 col-md-push-1">
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
          <h3 class="box-title text-uppercase sys-info">Add Product</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="POST" action="{{ url('admin/product') }}" enctype="multipart/form-data">
          @csrf
          <div class="box-body">
            <div class="col-md-10 col-md-push-1">
              <div class="form-group {{ $errors->has('name') ? 'has-error':''}} ">
                <label for="name">Name&nbsp;<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
                @if($errors->has('name'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('name') }}</p>
                </strong>
                @endif
              </div>
              <div class="form-group {{ $errors->has('category_id') ? 'has-error':''}}">
                <label for="category_id">Category&nbsp;<span class="text-danger">*</span></label>
                <select class="form-control requiredFocus" id="category_id"  name="category_id">
                  <option value="">Choose Category</option>
                  @foreach($categoryList as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @if($errors->has('category_id'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('category_id') }}</p>
                </strong>
                @endif
              </div>
              <div class="form-group {{ $errors->has('price') ? 'has-error':''}}">
                <label for="price">Price&nbsp;<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price">
                @if($errors->has('address'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('address') }}</p>
                </strong>
                @endif
              </div>
              <div class="form-group">
                <label for="barcode">Barcode</label>
                <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Enter product barcode">
                @if($errors->has('barcode'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('barcode') }}</p>
                </strong>
                @endif
              </div>  
              <div class="form-group {{ $errors->has('code') ? 'has-error':''}}">
                <label for="code">Code</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Enter product code">
                @if($errors->has('code'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('code') }}</p>
                </strong>
                @endif
              </div>  
              <div class="form-group {{ $errors->has('discount') ? 'has-error':''}}">
                <label for="discount">Discount&nbsp;<span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="discount" id="discount" placeholder="Enter product discount">
                @if($errors->has('discount'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('discount') }}</p>
                </strong>
                @endif
              </div>
              <div class="form-group">
                <label for="quantity">Quantity&nbsp;<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter product quantity">
              </div>
              <div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
                <label for="title">Title</label>
                <textarea class="form-control" name="title" id="title" placeholder="Enter product title"></textarea>
              </div>
              <div class="form-group">
                <label for="details">Details</label>
                <textarea class="form-control" name="details" id="details" placeholder="Enter product details"></textarea>
                @if($errors->has('details'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('details') }}</p>
                </strong>
                @endif
              </div> 
              <div class="form-group {{ $errors->has('status') ? 'has-error':''}}">
                <label for="status">Status&nbsp;<span class="text-danger">*</span></label>
                <select class="form-control requiredFocus" id="status"  name="status">
                  <option value="Active" @if(old('status')=='Active') selected @endif>Active</option>
                  <option value="Inactive"@if(old('status')=='Inactive') selected @endif>Inactive</option>
                </select>
                @if($errors->has('status'))
                <strong>
                  <p class="text-danger" ><i class="fa fa-warning"></i>{{ $errors->first('status') }}</p>
                </strong>
                @endif
              </div> <br> 
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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
  $("#product").addClass("active");
  $("#product").parent().parent().addClass("menu-open");
  $("#product").parent().css("display","block");
</script>
<!--Menubar auto select-->
@endsection 
