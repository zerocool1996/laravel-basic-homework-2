<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('index') }}">Home</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        {{-- <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> --}}
    </ul>
    @if ( Auth::check() )
        <div class="form-inline my-2 my-lg-0">
            <p><span>Hi <strong>{{ Auth::user()->firstname }}</strong> - </span><a href="{{ route('logout') }}">Log out</a></p>
        </div>
    @else
        <div class="form-inline my-2 my-lg-0">
            <a class="sign-in" href="javascript:void(0)"  data-toggle="modal" data-target="#signin">Đăng nhập</a>
            <span>/</span>
            <a class="register" href="javascript:void(0)"  data-toggle="modal" data-target="#register">Đăng kí</a>
        </div>
    @endif

    </div>
</nav>
