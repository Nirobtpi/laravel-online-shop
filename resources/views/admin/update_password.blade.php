@extends('admin.layouts.layout')

@section('dashboard')
{{ 'Udate Admin Password' }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-2">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Admin Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    @if(Session('success'))
                            <div class="alert alert-success">
                                {{ Session('success') }}
                            </div>
                        @endif
                    <form method="POST" action="{{ url('admin/update-admin-password') }}/{{ Auth::guard('admin')->user()->id }}">
                        @csrf
                        <div class="form-group">
                            <label for="admin_email">Email address</label>
                            <input disabled value="{{ Auth::guard('admin')->user()->email }}" class="form-control"
                                id="admin_email" style="background: #666">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Old Password</label>
                            <input type="password" name="old_password" class="form-control" id="exampleInputPassword1"
                                placeholder="Password">
                        </div>
                        @if(Session('error'))
                            <p class="text-danger">{{ Session('error') }}</p>
                        @endif
                        <div class="form-group">
                            <label for="new_password">New Password</label>
                            <input type="password" name="password" class="form-control" id="new_password"
                                placeholder="Password">
                        </div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-group">
                            <label for="confire_password">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="confire_password" placeholder="Password">
                        </div>
                        
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- /.card-body -->


            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
