@extends('layout.master');
@section('title')
<title>AdminLTE 3 | Dashboard</title>
@stop
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Create Post</h1>
                </div>
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
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Post</h3>
                    </div>
                    <form action="{{ Route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="PostName">Post Name</label>
                                <input type="text" name="name" class="form-control" id="PostName" placeholder="Post Name">
                            </div>
                            <div class="form-group">
                                <label for="PostName">Details</label>
                                <input type="text" name="details" class="form-control" id="Details" placeholder="Details">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>
</div>
@stop
