@extends('main')

@section('title','| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-margin">Create post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    {{--end of row--}}

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th width="250px">Body</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th width="120px"></th>
                </tr>

                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ substr($post->body,0,50) }} {{ strlen($post->body) > 50 ? '...' : '' }}</td>
                        <td>{{ date('M d, Y',strtotime($post->created_at)) }}</td>
                        <td>{{ date('M d, Y',strtotime($post->updated_at)) }}</td>
                        <td><a href="{{ route('posts.show',$post->id)}}" class="btn btn-sm btn-secondary">View</a> <a
                                    href="{{ route('posts.edit',$post->id)}}"
                                    class="btn btn-sm btn-secondary">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $posts->links() !!}

        </div>
    </div>

@endsection