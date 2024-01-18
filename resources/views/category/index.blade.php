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
                <h1 class="m-0">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Categories</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Created AT</th>
                            <th>Updated AT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)

                            <tr>
                                <td> {{ $item['name'] }}</td>
                                <td>
                                    <img src="{{('categories/'). $item->image}}" alt="" class="rounded-circle" width="50px" height="50px">
                                </td>
                                <td> {{ $item['created_at'] }}</td>
                                <td> {{ $item['updated_at'] }}</td>
                                <td>
                                    <div class="role-group">
                                    <form action="{{ route('category.destroy',$item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    <button type="submit" class="btn btn-danger delete_btn" value="">Delete</button>
                                    </form>
                                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info">Edit</a>
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
