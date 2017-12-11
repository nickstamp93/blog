@extends('main')

@section('title',"| $tag->name tag")

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>
                {{ $tag->name }} tag
                <small>{{ $tag->posts()->count() }} posts</small>
            </h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('tags.edit' , $tag->id) }}" class="btn btn-primary btn-block btn-h1-margin">Edit</a>
        </div>
        <div class="col-md-2">
            <form method="POST" action="{{ route('tags.destroy', $tag->id) }}">
                {{ method_field('DELETE') }}
                <input type="submit" value="Delete" class="btn btn-danger btn-block btn-h1-margin">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Tags</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag->posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @foreach($post->tags as $tag)
                                <span class="badge badge-secondary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-secondary">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection