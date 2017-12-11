@extends('main')

@section('title', 'Create new post')

@section('styles')

    <link rel="stylesheet" href="../css/parsley.css" type="text/css">

@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            <form method="POST" action="{{ route('posts.store') }}" data-parsley-validate>
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
                    <label name="body">Post Body:</label>
                    <textarea id="body" name="body" rows="10" class="form-control" required></textarea>
                </div>
                <input type="submit" value="Create Post" class="btn btn-success btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>﻿

@endsection

@section('scripts')
    <script href="../js/parsley.min.js"></script>
@endsection