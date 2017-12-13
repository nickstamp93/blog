@extends('main')

@section('title', 'Create new post')

@section('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: "link code",
            toolbar: 'undo redo | copy paste | bold italic alignleft aligncenter alignright outdent indent link code'
        });
    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                <div class="form-group">
                    <label name="title">Title:</label>
                    <input id="title" name="title" class="form-control" required maxlength="180">
                </div>
                <div class="form-group">
                    <label name="slug">URL:</label>
                    <input id="slug" name="slug" class="form-control" required minlength="5" maxlength="180">
                </div>
                <div class="form-group">
                    <label name="category_id">Category:</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label name="tags">Tags:</label>
                    <select class="form-control tags-multi-select" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label name="featured_image" for="featured_image">Featured Image:</label>
                    <input type="file" class="form-control-file" id="featured_image" name="featured_image">
                </div>
                <div class="form-group">
                    <label name="body">Post Body:</label>
                    <textarea id="body" name="body" rows="10" class="form-control"></textarea>
                </div>
                <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>﻿

@endsection

@section('scripts')
    {{--<script href="../js/select2.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.tags-multi-select').select2();
        });
    </script>
@endsection