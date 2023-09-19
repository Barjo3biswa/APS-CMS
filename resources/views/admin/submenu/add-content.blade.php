@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-sm-6">
                <ol class="breadcrumb ">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    {{-- <li class="breadcrumb-item "><a href="#">{{$menu->name}}</a></li>
                    <li class="breadcrumb-item active">Add Content</li> --}}
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                @if (isset($content))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> {{$submenu->name}} Content</h3>
                        <div class="float-right">
                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="conatiner">
                            <div class="form-group">
                                {!! $content->content!!}
                            </div>
                        </div>


                        </form>
                    </div>
                    @else
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Add {{$submenu->name}} Content</h3>
                        </div>
                        <form action="{{route('admin.submenu.content')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputFile">Banner Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id="exampleInputFile" name="file">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Content</label>
                                    <textarea class="form-control" id="description" name="content"></textarea>
                                    <input type="hidden" class="form-control" id="" name="submenu_id" value={{$submenu->id}}>
                                    <input type="hidden" class="form-control" id="" name="menu_id" value={{$submenu->menu_id}}>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif

                    <!-- /.card -->
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </div>

    @endsection

    @section('js')

    <script>
        CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            customConfig : "{{asset('ckeditor/config.js')}}",
            filebrowserUploadMethod: 'form',
            allowedContent:true,
            height: '300px',
            width: '100%',
            // removePlugins: 'sourcearea'
    })
    </script>
    @endsection
