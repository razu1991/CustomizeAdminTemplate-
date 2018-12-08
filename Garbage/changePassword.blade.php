@extends('admin.layouts.master')
@section('content')
<div class="content p-4">
    <h2 class="mb-4" style="text-transform: uppercase;">Change Password</h2>
    <div class="card mb-4">
        @if(session()->has('success'))
            <div class="alert alert-success text-center">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="card-body">
            <form action="{{ url('admin/changePassword') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="oldword" class="col-sm-2 col-form-label">Current Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control {{ $errors->has('oldword') ? ' is-invalid' : '' }}"  id="oldword" name="oldword" placeholder="Enter Current Password">
                        @if ($errors->has('oldword'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('oldword') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newword" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control {{ $errors->has('newword') ? ' is-invalid' : '' }}" id="newword" name="newword" placeholder="New Password">
                        @if ($errors->has('newword'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('newword') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newword_confirmation" class="col-sm-2 col-form-label">Re-type Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control {{ $errors->has('newword_confirmation') ? ' is-invalid' : '' }}"  id="newword_confirmation" name="newword_confirmation" placeholder="Enter Password Again">
                        @if ($errors->has('newword_confirmation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('newword_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newword" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-8">
                       <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>		
@endsection
