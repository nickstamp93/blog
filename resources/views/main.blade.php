<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body>

@include('partials._nav')

<!-- Page Content -->
<div class="container">

    @include('partials._messages')

    @yield('content')

</div>
<!-- /.container -->

@include('partials._footer')

@include('partials._javascript')

@yield('scripts')

</body>

</html>
