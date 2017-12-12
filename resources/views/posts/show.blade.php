@extends('main')

@section('title','| Blog post')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>

            <p>{{ $post->body }}</p>

            <hr>
            <div class="tags">
                @foreach($post->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div class="backend-comments mt-4">
                <h3>Comments
                    <small>{{ $post->comments->count() }} total</small>
                </h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th width="160px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($post->comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>
                                <a href="{{ route('comments.edit' , $comment->id) }}"
                                   class="btn btn-xs btn-primary"><span class="fa fa-trash">Edit</span></a>
                                <a data-toggle="modal" data-target="#confirm-dialog" class="btn btn-xs btn-danger">Delete</a>
                                <!-- Modal -->
                                <div class="modal fade" id="confirm-dialog" tabindex="-1" role="dialog"
                                     aria-labelledby="confirm-label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirm-label">Confirmation dialog</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you really want to delete this comment?
                                                <hr>
                                                <strong>By : </strong>{{ $comment->name }}
                                                <br>
                                                <strong>Comment : </strong>{{ $comment->comment }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <form method="POST"
                                                      action="{{ route('comments.destroy', $comment->id) }}">
                                                    {{ method_field('DELETE') }}
                                                    <input type="submit" value="Yes, delete this comment"
                                                           class="btn btn-danger" data-toggle="modal"
                                                           data-target="#confirm-dialog">
                                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <dl class="row dl-horizontal">
                        <dt class="col-sm-5">Url</dt>
                        <dd class="col-sm-7"><a
                                    href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a>
                        </dd>
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
                            </form>

                            {{--<a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-block">Delete</a>--}}
                        </div>
                        <div class="col-sm-12">
                            <a href="{{ route('posts.index')}}" class="btn btn-secondary btn-block"><< All Posts</a>
                        </div>
                    </div>
                    ﻿
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