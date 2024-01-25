@extends('layout.master');
@section('title')
<title>AdminLTE 3 | Dashboard</title>
@stop
@section('content')
{{-- <div class="content-wrapper"> --}}
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Posts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Posts</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Posts</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Post Name</th>
                            {{-- <th>Category Name</th> --}}
                            <th>Details</th>
                            <th>Post Image</th>
                            <th>Created AT</th>
                            <th>Updated AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $item)

                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['details'] }}</td>
                                <td>
                                    <img src="{{('posts/'). $item->image}}" alt="" class="rounded-circle" width="50px" height="50px">
                                </td>
                                <td> {{ $item['created_at'] }}</td>
                                <td> {{ $item['updated_at'] }}</td>
                                <td>
                                    <div class="" >
                                    <form action="{{ route('post.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete_btn" value="">Delete</button>
                                    </form>

                                    <a href="{{ route('post.edit',$item->id) }}" class="btn btn-info">Edit</a>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
    </section>
{{-- </div> --}}
@stop
