@extends('main')

@section('title',"|  $post->title ")

@section('content')

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4">{{ $post->title }}</h1>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">Author</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{ date("F m, Y h:i A" , strtotime($post->created_at)) }}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">{!! $post->body !!}</p>

            <hr>

            <!-- Single Comment -->
            @foreach($post->comments as $comment)
                <div class="media mb-4">
                    {{--<img class="d-flex mr-3 rounded-circle" src="http://placehold.it/64x64" alt="">--}}
                    <img class="d-flex mr-3 rounded-circle" src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=80&d=mm" }}" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">{{$comment->name}}</h5>
                        <p>
                            <span class="font-weight-light">{{ date("m M \\a\\t h:i A" , strtotime($comment->created_at)) }}</span>
                            <br>
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            @endforeach

        <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('comments.store' , $post->id) }}">
                        <div class="form-group">
                            <textarea id="comment" name="comment" class="form-control" rows="3"></textarea>
                        </div>
                        {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>

        </div>

        @include('partials._sidebar')

    </div>
    <!-- /.row -->


@endsection