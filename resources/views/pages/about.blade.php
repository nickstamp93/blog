@extends('main')

@section('title', '| About me')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <h1 class="my-4">{{$data['fullName']}}
                <small>{{$data['email']}}</small>
            </h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto assumenda at dolor esse facilis
                id nulla numquam voluptate. Autem consequatur consequuntur delectus dolorum numquam perspiciatis
                praesentium quia temporibus, totam veniam.</p>
        </div>
    </div>
    <!-- /.row -->
@endsection