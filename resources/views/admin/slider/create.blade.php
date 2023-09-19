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
                    <li class="breadcrumb-item active">Slider Image</li>
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
                        <h3 class="card-title">Add Slider Image</h3>
                    </div>
                    <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="file_name" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="exampleInputFile" name="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div style="margin:1rem;">
            <h5 class="m-0">Slider Images</h5>
        </div>
        <div class="row">
           @forelse ($sliders as $key => $data )
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title"> {{$data->filename}}</h3> --}}
                    </div>
                    <div class="card-body">
                        <img src="{{asset($data->file)}}" alt="Image" width="200rem">
                    </div>
                    <div class="card-footer">
                        @if ($data->status == 0)
                        <a href="{{route('admin.slider.publish',Crypt::encrypt($data->id))}}"
                            class="btn btn-success btn-sm">Publish</a>
                        @else
                        <a href="{{route('admin.slider.unpublish',Crypt::encrypt($data->id))}}"
                            class="btn btn-warning btn-sm">Unpublish</a>
                        @endif

                        <a href="{{route('admin.slider.delete',Crypt::encrypt($data->id))}}"
                            class="btn btn-danger btn-sm">Delete</a>
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
