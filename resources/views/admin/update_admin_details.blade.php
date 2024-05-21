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
                        <h3 class="card-title">Update Admin Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                        @if (Session('success'))
                            <div class="alert alert-success">
                                {{ Session('success') }}
                            </div>
                        @endif
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ url('admin/update-admin-details') }}/{{ Auth::guard('admin')->user()->id }}">
                            @csrf
                            <div class="form-group">
                                <label for="admin_email">Email address</label>
                                <input disabled value="{{ Auth::guard('admin')->user()->email }}" class="form-control"
                                    id="admin_email" style="background: #666">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{ Auth::guard('admin')->user()->name }}" class="form-control" id="name">
                            </div>
                            @if (Session('error'))
                                <p class="text-danger">{{ Session('error') }}</p>
                            @endif
                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input type="text" name="mobile" value="{{ Auth::guard('admin')->user()->mobile }}" class="form-control" id="mobile">
                            </div>
                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" name="photo" class="form-control" id="photo">
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
