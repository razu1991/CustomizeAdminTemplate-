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
            <div class="panel-group">
              <div class="panel panel-primary">
                  <div class="panel-heading panel-style sys-info">System Settings Information</div>
                  <div class="panel-body sys-settings">
                      <div class="col-md-9"> 
                          @if($sysSetting)
                          <table class="table table-responsive  table-bordered" >
                              <tbody>
                                <tr>
                                      <td>Company Name</td>
                                      <td>{{ $sysSetting->name ? $sysSetting->name:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                      <td>Company Address</td>
                                      <td>{{ $sysSetting->address ? $sysSetting->address:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                      <td>Company Details</td>
                                      <td>
                                        @if(($sysSetting->details))
                                        {{ str_limit($sysSetting->details,100) }} 
                                        @if(strlen($sysSetting->details) > 100)
                                        <a href="#" data-toggle="modal" class="text-primary" data-target="#readMore">Read More</a>
                                        @endif
                                        <!-- Modal -->
                                        <div class="modal fade" id="readMore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="companyDetailsTitle">Company Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                {{ $sysSetting->details }}
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
                                  </tr>
                                  <tr>
                                      <td>Company Title</td>
                                      <td>{{ $sysSetting->title ? $sysSetting->title:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                      <td>Phone</td>
                                      <td>{{ $sysSetting->phone ? $sysSetting->phone:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                      <td>Email</td>
                                      <td>{{ $sysSetting->email ? $sysSetting->email:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                      <td>Facebook</td>
                                      <td>{{ $sysSetting->facebook ? $sysSetting->facebook:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                      <td>Twitter</td>
                                      <td>{{ $sysSetting->twitter ? $sysSetting->twitter:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                      <td>Google Plus</td>
                                      <td>{{ $sysSetting->googleplus ? $sysSetting->googleplus:'N/A' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Logo</td>
                                    <td>
                                       <div class="row">
                                          <div class='col-md-6'>
                                              @if($sysSetting->logo)
                                                <img style="width: 100px;height: 100px;" class="thumbnail img-responsive" src="{{asset($sysSetting->logo)}}"/>
                                              @else
                                              <span class="label label-danger">No Image Provided</span>
                                              @endif
                                          </div>
                                      </div>
                                    </td>
                                  </tr>
                              </tbody>
                          </table>

                          <a href="{{ url('admin/system/setting/1/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i> Update Settings&nbsp;</a>&nbsp;&nbsp;
                          @else
                            <a href="{{ url('admin/system/setting/create') }}" class="btn btn-primary"><i class="fa fa-edit"></i> Add Settings&nbsp;</a>&nbsp;&nbsp;
                          @endif
                      </div>
                  </div>
              </div>
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
        $("#systemSettings").addClass("active");
        $("#systemSettings").parent().parent().addClass("menu-open");
        $("#systemSettings").parent().css("display","block");
</script>
  <!--Menubar auto select-->
@endsection 

