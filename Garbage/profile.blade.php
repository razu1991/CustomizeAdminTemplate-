@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Profile</h2>
    <div class="card mb-4">
        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{ url('admin/profile') }}" method="post">
                @csrf
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="name" style="text-transform: uppercase;"><strong>Name</strong></label>
                        <input class="form-control form-control-lg mb-3 {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" placeholder="Enter Name" value="{{ Auth::guard('admin')->user()->name }}">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-12  container-fluid">
                    <div class="form-group">
                        <label for="email" style="text-transform: uppercase;"><strong>Email</strong></label>
                        <input class="form-control form-control-lg mb-3 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" placeholder="Enter Email" value="{{ Auth::guard('admin')->user()->email }}">
                         @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection