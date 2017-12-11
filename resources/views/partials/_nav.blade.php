<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Nick Stampoulis</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ?  "active" : ""}}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ Request::is('blog') ?  "active" : ""}}">
                    <a class="nav-link" href="blog">Blog</a>
                </li>
                <li class="nav-item {{ Request::is('about') ?  "active" : ""}}">
                    <a class="nav-link" href="about">About</a>
                </li>
                <li class="nav-item {{ Request::is('contact') ?  "active" : ""}}">
                    <a class="nav-link" href="contact">Contact</a>
                </li>
                <li class="nav-item dropdown navbar-right">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">{{ Auth::check() ? "Hello ". Auth::user()->name : "Login/Register" }}</a>
                    <div class="dropdown-menu">
                        @if (Auth::check())
                            <a class="dropdown-item" href="{{ route('posts.index') }}">My Posts</a>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                            <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"> Logout </a>
                        @else
                            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>