@extends('main')

@section('title','| Edit Blog Post')

@section('stylesheets')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
        <div class="col-md-8">
            <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" data-parsley-validate>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control form-control-lg" id="title" name="title" rows="1"
                              style="resize:none;" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <label for="slug">Url:</label>
                    <input type="text" class="form-control form-control-lg" id="slug" name="slug" rows="1"
                              style="resize:none;" value="{{ $post->slug }}">
                </div>
                <div class="form-group">
                    <label name="category_id">Category:</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category->id == $category->id ? "selected" : "" }}>{{ $category->name }}</option>
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
                    <label for="body">Body:</label>
                    <textarea type="text" class="form-control" id="body" name="body"
                              rows="10">{{ $post->body }}</textarea>
                </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <dl class="row dl-horizontal">
                        <dt class="col-sm-5">Created at</dt>
                        <dd class="col-sm-7">{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
                        <dt class="col-sm-5">Last update</dt>
                        <dd class="col-sm-7">{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </div>
                    </div>
                    ﻿
                </div>
            </div>
        </div>
        </form>
    </div>

@endsection

@section('scripts')
    {{--<script href="../js/select2.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            // init select2 plugin
            $('.tags-multi-select').select2();

            //get the current tags and set them selected
            $('.tags-multi-select').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');


        });
    </script>
@endsection