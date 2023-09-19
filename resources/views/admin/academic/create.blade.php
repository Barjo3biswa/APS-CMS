@extends('admin.layouts.master')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Academic Achievers</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Academic Achievers</li>
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
                        <h3 class="card-title">Add Image</h3>
                    </div>
                    <form action="{{route('admin.academic.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Student Name</label>
                                <input type="text" class="form-control" name="student_name" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Class</label>
                                <input type="text" class="form-control" name="class" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Percentage</label>
                                <input type="text" class="form-control" name="percentage" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="file">
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Display in Home</label>
                                <input type="checkbox" style="margin-left:2rem;" name="display_in_home" value="1">
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
    </div>
    <hr>

    <div class="container-fluid">
        <div style="margin:1rem;">
            <h5 class="m-0">Academic Achievers</h5>
        </div>
        <div class="row">
            @forelse ($academic as $data )
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> {{$data->name}}</h3>
                        </div>
                        <div class="card-body">
                            <img src="{{asset($data->file)}}" alt="Image" width="200rem">
                        </div>
                        <div class="card-footer">
                           @if ($data->status == 0)
                                <a href="{{route('admin.academic.publish',Crypt::encrypt($data->id))}}" class="btn btn-success btn-sm">Publish</a>
                            @else
                                <a href="{{route('admin.academic.publish',Crypt::encrypt($data->id))}}" class="btn btn-warning btn-sm">Unpublish</a>
                           @endif

                           <a href="{{route('admin.academic.delete',Crypt::encrypt($data->id))}}" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            @empty
            <div class="col-md-3">
                <div class="card">

                    <div class="card-body">
                        No Image Uploaded.
                    </div>
                </div>
            </div>

            @endforelse
        </div>
    </div>
</div>

@endsection
