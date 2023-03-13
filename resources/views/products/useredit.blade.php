@extends('../layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User Details</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/user-update/{{$user->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">User Full Name </label>
                            <input type="text" name="name" class="form-control" id="userName" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="InputEmail1" value="{{$user->email}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" value="{{$user->password}}">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                        <select name="role" class="form-control" id="role" value="{{$user->role}}">
                            <option @if ( $user->role == "Employee")
                                selected
                            @endif>Employee</option>
                            <option @if ( $user->role == "Manager")
                                selected
                            @endif>Manager</option>
                          </select>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="/users" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </section>



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
