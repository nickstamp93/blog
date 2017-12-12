@extends('main')

@section('title' , '| Edit Comment')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Comment</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label name="name">Name:</label>
                            <textarea type="text" class="form-control form-control-lg" id="name" name="name" rows="1"
                                      style="resize:none;" disabled>{{ $comment->name }}</textarea>
                        </div>
                        <div class="form-group">
                            <label name="email">Email:</label>
                            <textarea type="text" class="form-control form-control-lg" id="email" name="email" rows="1"
                                      style="resize:none;" disabled>{{ $comment->email }}</textarea>
                        </div>
                        <div class="form-group">
                            <label name="comment">Comment:</label>
                            <textarea type="text" class="form-control" id="comment" name="comment" rows="5"
                                      style="resize:none;">{{ $comment->comment }}</textarea>
                        </div>
                        <input type="submit" value="Save Changes" class="btn btn-primary btn-lg btn-block">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection