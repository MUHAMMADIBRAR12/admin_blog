@extends('layout.master');
@section('title')
<title>AdminLTE 3 | Dashboard</title>
@stop
@section('content')
{{-- <div class="content-wrapper">
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
    </div> --}}
    <section class="content">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Post</h3>
                    </div>
                    @if ($errors->has('default'))
                        <div class="alert alert-danger">
                        {{ $errors->first('default') }}
                        </div>
                    @endif
                    <form action="{{ Route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="CategoryName">Select Category</label>
                                <select class="form-control" id="categorySelect" name="category_id" value="{{ old('category_id') }}">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('category_id'))
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="SubCategoryName">Select subcategory</label>
                                <select  class="form-control" id="subcategorySelect" name="subcategory_id">
                                    <option selected>Select menu</option>
                                    @foreach ($subcategory as $item)
                                        <option data-category="{{ $item->category_id ?? '' }}" value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('subcategory_id'))
                             <span class="text-danger">{{ $errors->first('subcategory_id') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="PostTitle">Post Title</label>
                                <input type="text" name="title" class="form-control" id="PostTitle" placeholder="Post Title">
                            </div>
                            @if($errors->has('title'))
                             <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="Post Short description">Post Short Description</label>
                                <input type="text-area" name="short_description" class="form-control" id="Post Short Description" placeholder="Post Short Description">
                            </div>
                            @if($errors->has('short_description'))
                             <span class="text-danger">{{ $errors->first('short_description') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="Post long description">Post Long Description</label>
                                <input type="text-area" name="long_description" class="form-control" id="Post Long Description" placeholder="Post Long Description">
                            </div>
                            @if($errors->has('long_description'))
                             <span class="text-danger">{{ $errors->first('long_description') }}</span>
                            @endif
                            <div class="form-group">
                                <label for="PostAuthor">Post Author</label>
                                <input type="text" name="author" class="form-control" id="Post Author" placeholder="Post Author">
                            </div>
                            @if($errors->has('author'))
                             <span class="text-danger">{{ $errors->first('author') }}</span>
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
                            <div class="form-group">
                                <label for="PostTags">Post Tags</label>
                                <input type="text" name="tags" class="form-control" id="Post Tags" placeholder="Post Tags">
                            </div>
                            @if($errors->has('tags'))
                             <span class="text-danger">{{ $errors->first('tags') }}</span>
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
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#categorySelect').change(function () {
            var selectedCategory = $(this).val();
            $('select[name="subcategory_id"] option').hide();
            $('select[name="subcategory_id"] option[data-category="' + selectedCategory + '"]').show();
            $('select[name="subcategory_id"]').val('').prop('disabled', false);
        });
    });
</script>

@stop
