@extends('main')

@section('title', '| Contact')

@section('content')
    <div class="row">

        <div class="col-md-8 offset-md-2">
            <h1 class="my-4">Contact me
                <hr>
                <form>
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input id="subject" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label name="body">Message:</label>
                        <textarea id="body" name="body" class="form-control">Type your message here...</textarea>
                    </div>
                    <input type="submit" value="Send message" class="btn btn-success">
                </form>
            </h1>
        </div>
    </div>
    <!-- /.row -->
@endsection