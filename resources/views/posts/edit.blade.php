@extends('main')

@section('title','| Edit Blog Post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <textarea type="text" class="form-control form-control-lg" id="title" name="title" rows="1"
                              style="resize:none;">{{ $post->title }}</textarea>
                </div>
                <div class="form-group">
                    <label for="slug">Url:</label>
                    <textarea type="text" class="form-control form-control-lg" id="slug" name="slug" rows="1"
                              style="resize:none;">{{ $post->slug }}</textarea>
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
                            {{--<a href="{{ route('posts.update', $post->id) }}" class="btn btn-success btn-block">Save
                                Changes</a>--}}
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

{{--
<form method="POST" action="{{ route('posts.update', $post->id) }}">
    <div class="form-group">
        <label for="title">Title:</label>
        <textarea type="text" class="form-control input-lg" id="title" name="title" rows="1" style="resize:none;">{{ $post->title }}</textarea>
    </div>
    <div class="form-group">
        <label for="body">Body:</label>
        <textarea type="text" class="form-control input-lg" id="body" name="body" rows="10">{{ $post->body }}</textarea>
    </div>
    </div>
    <div class="col-md-4">
        <div class="well">
            <dl class="dl-horizontal">
                <dt>Created at:</dt>
                <dd>{{ date('M j, Y h:i:sa', strtotime($post->created_at)) }}</dd>
            </dl>

            <dl class="dl-horizontal">
                <dt>Last updated:</dt>
                <dd>{{ date('M j, Y h:i:sa', strtotime($post->updated_at)) }}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-danger btn-block">Back</a>
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
    {{ method_field('PUT') }}
</form>﻿--}}
