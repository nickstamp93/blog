@extends('main')

@section('title','| Categories')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>

                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th>{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $categories->links() !!}
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">New Category</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}" data-parsley-validate>
                        <div class="form-group">
                            <label name="name">Name:</label>
                            <input id="name" name="name" class="form-control" required maxlength="50" minlength="5">
                        </div>
                        <input type="submit" value="Create" class="btn btn-primary btn-lg btn-block">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
            {{--<h2>New Category</h2>
            <hr>
            <form method="POST" action="{{ route('categories.store') }}" data-parsley-validate>
                <div class="form-group">
                    <label name="name">Name:</label>
                    <input id="name" name="name" class="form-control" required maxlength="50" minlength="5">
                </div>
                <input type="submit" value="Create" class="btn btn-success btn-lg btn-block">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>--}}
        </div>
    </div>

@endsection