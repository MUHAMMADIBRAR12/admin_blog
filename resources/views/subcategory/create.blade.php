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
                <h1 class="m-0">Create SubCategory</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./../index.php">Home</a></li>
                        <li class="breadcrumb-item active">SubCategories</li>
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
                        <h3 class="card-title">Create SubCategory</h3>
                    </div>
                    @if($errors->has('default'))
                        <div class="alert alert-danger">
                           {{ $errors->first('default') }}
                        </div>
                    @endif
                    <form action="{{ Route('subcategory.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="SubCategoryName">SubCategory Name</label>
                                <input type="text" name="name" class="form-control" id="SubCategoryName" placeholder="SubCategory Name">
                            </div>
                            @if($errors->has('name'))
                             <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="CategoryName">Select category</label>
                                <select name="category_id" class="form-control" id="select category">
                                    <option selected>Select menu</option>s
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('category_id'))
                             <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('image'))
                             <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
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
