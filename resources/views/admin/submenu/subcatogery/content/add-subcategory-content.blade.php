@extends('admin.layouts.master')

@section('css')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> Add {{$subcategory->title}} Content</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{$subcategory->title}}</a></li>
                    {{-- <li class="breadcrumb-item active">Add Category</li> --}}
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Content</h3>
                    </div>
                    <form action="{{route('admin.store.subcategory.content')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1"> Select Category </label>
                                    <select name="dept_menu_id" id="" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($dept_menus as $menu )
                                            <option value="{{$menu->id}}">{{$menu->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="subcategory_id" class="form-control" value="{{$subcategory->id}}">
                                    <input type="hidden" name="submenu_id" class="form-control" value="{{$submenu_id}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="10" rows="5"></textarea>
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1">Add Picture</label>
                                <input type="file" name="file" id="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Display in frontpage</label>
                                <input type="checkbox" style="margin-left:2rem;" name="frontpage_display" value="1">
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

@section('js')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
    	function slideout(){
            setTimeout(function(){
                $("#response").slideUp("slow", function () {
                });
            }, 2000);
        }
        $("#response").hide();
    });

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
