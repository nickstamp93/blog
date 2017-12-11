@extends('main')

@section('title',"|  $post->title ")

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <hr>
            <p>Posted in : {{ $post->category->name }}</p>
        </div>
    </div>

@endsection