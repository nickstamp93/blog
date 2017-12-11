@extends('main')

@section('title','| Tags')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>

                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{ $tag->id }}</th>
                        <td><a href="{{ route('tags.show' , $tag->id) }}">{{ $tag->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{--{!! $tags->links() !!}--}}
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">New Tag</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tags.store') }}" data-parsley-validate>
                        <div class="form-group">
                            <label name="name">Name:</label>
                            <input id="name" name="name" class="form-control" required maxlength="50" minlength="3">
                        </div>
                        <input type="submit" value="Create" class="btn btn-primary btn-lg btn-block">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection