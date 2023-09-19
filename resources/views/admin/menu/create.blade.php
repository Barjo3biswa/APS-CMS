@extends('admin.layouts.master')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Menu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Menu</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Menu</h3>
                    </div>
                   <form action="{{route('admin.menu.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name">
                            </div>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="sublink" id="exampleCheck1" value="1">
                                <label class="form-check-label" for="exampleCheck1">Sublink</label>
                            </div>

                            {{-- <div class="form-group">
                                <label for="exampleInputFile">Banner Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="file">

                                    </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Breif Description</label>
                                <textarea name="breif" id="" class="form-control"></textarea>
                            </div> --}}

                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>

@endsection
