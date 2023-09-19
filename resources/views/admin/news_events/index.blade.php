@extends('admin.layouts.master')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Notifications</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item ">Notifications</li>
                    <li class="breadcrumb-item active">View</li>
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
                        <h3 class="card-title">List</h3>
                        <div class="card-tools">
                            <a href="{{route('admin.notification.create')}}" class="btn btn-sm btn-primary">Add New</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0" style="height: 400px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>News Section</th>
                                    <th>Title</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($news_events as $key => $event )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{date('d M, Y',strtotime($event->date))}}</td>
                                    <td>
                                       @php
                                            $newsTypeIds = explode(',', $event->news_type_id);
                                            $newsTypes = DB::table('news_sections')->whereIn('id', $newsTypeIds)->get();
                                       @endphp
                                       @foreach ($newsTypes as $types)
                                            {{$types->name}},
                                       @endforeach
                                    </td>
                                    <td width="40%">{{$event->title}}</td>
                                    <td>
                                        @if ($event->pdf_file == null)
                                            <a href="{{$event->pdf_file}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye"></i></a>
                                        @else
                                            <a href="{{$event->url}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-eye"></i></a>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($event->status == '1')
                                            <span class="badge bg-sucess">Active</span>
                                        @else
                                            <span class="badge bg-warning">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{route('admin.notification.edit',Crypt::encrypt($event->id))}}"
                                            class="btn btn-info btn-xs mr-1"><i class="fa fa-pen"></i></a>

                                        <a href="{{route('admin.notification.delete',Crypt::encrypt($event->id))}}"
                                            class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i
                                                class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" style="color:red; text-align:center"> No Tenders Uploaded Yet</td>
                                </tr>

                                @endforelse


                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>


    </div><!-- /.container-fluid -->
</div>

@endsection
