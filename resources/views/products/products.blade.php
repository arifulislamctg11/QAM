@extends('../layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Products</h1>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable </h3>
                            </div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                        {{session('status')}}
                                </div>
                                
                            @endif
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name </th>
                                            <th>Description</th>
                                            <th>Prodcut Type</th>
                                            <th>Price</th>
                                            <th>Product Condition</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $row)
                                            <tr>
                                                <td>{{$row->id}}</td>
                                                <td>{{$row->product_name}}</td>
                                                <td>{{$row->description}}</td>
                                                <td>{{$row->price}}</td>
                                                <td>{{$row->condition}}</td>
                                                <td>{{$row->comment}}</td>
                                                <td>
                                                    <a href="/productedit/{{$row->id}}" ><i class='fas fa-edit'></i></a> 
                                                    <a href="/productdelete/{{$row->id}}" ><i class='fas fa-trash' style="color: red"></i></a> 
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                               
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>



        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
