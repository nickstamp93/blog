@extends('main')

@section('title', '| Edit Tag')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Tag</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tags.update', $tag->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label name="name">Name:</label>
                            <textarea type="text" class="form-control form-control-lg" id="name" name="name" rows="1"
                                      style="resize:none;">{{ $tag->name }}</textarea>
                        </div>
                        <input type="submit" value="Save Changes" class="btn btn-primary btn-lg btn-block">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection