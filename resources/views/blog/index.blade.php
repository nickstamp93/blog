@extends('main')

@section('title','| Blog')

@section('content')

    @foreach($posts as $post)
        <div class="card mb-4">
            <img class="card-img-top img-fluid" src="{{ asset('images/' . $post->image) }}" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{ $post->title }}</h2>
                <p class="card-text">{{ substr(strip_tags($post->body),0,300) }} {{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                <a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on {{ date('M d, Y',strtotime($post->created_at)) }}
            </div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection