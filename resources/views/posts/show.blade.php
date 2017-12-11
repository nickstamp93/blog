@extends('main')

@section('title','| Blog post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p>{{ $post->body }}</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <dl class="row dl-horizontal">
                        <dt class="col-sm-5">Url</dt>
                        {{--<dd class="col-sm-7"><a href="{{ url('blog/'.$post->slug) }}">{{ url($post->slug) }}</a></dd>--}}
                        <dd class="col-sm-7"><a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a></dd>
                        <dt class="col-sm-5">Created at</dt>
                        <dd class="col-sm-7">{{ date('M j, Y h:ia',strtotime($post->created_at)) }}</dd>
                        <dt class="col-sm-5">Last update</dt>
                        <dd class="col-sm-7">{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
                        <dt class="col-sm-5">Category</dt>
                        <dd class="col-sm-7">{{ $post->category->name }}</dd>
                    </dl>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                        <div class="col-sm-6">
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Delete" class="btn btn-danger btn-block">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>﻿
                            {{--<a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-block">Delete</a>--}}
                        </div>
                        <div class="col-sm-12">
                            <a href="{{ route('posts.index')}}" class="btn btn-secondary btn-block"><< All Posts</a>
                        </div>
                    </div>﻿
                </div>
            </div>
        </div>
    </div>


@endsection


{{--With CSRF protection.
<div class="col-sm-6">
    <form method="POST" action="{{ route('posts.edit', $post->id) }}">
        <input type="submit" value="Edit" class="btn btn-primary btn-block">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
</div>
<div class="col-sm-6">
    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        <input type="submit" value="Delete" class="btn btn-danger btn-block">
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
</div>﻿--}}