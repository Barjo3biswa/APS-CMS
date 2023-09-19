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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List</h3>

                        <div class="card-tools">
                            <a href="{{route('admin.menu.create')}}" class="btn btn-sm btn-primary">Add New</a>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 400px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Sublink</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($menus as$key => $menu )
                                <tr>
                                    <td>{{$key +1}}</td>
                                    <td>{{$menu->name}}</td>
                                    <td>
                                        @if ($menu->sublink == 1)
                                        <span class="badge badge-success">Yes</span>
                                        @else
                                        <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($menu->status == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-warning">Inactive</span>
                                        @endif
                                    </td>

                                    <td></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="text-center">No Menus Added</td>

                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        {{-- <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>

@endsection
