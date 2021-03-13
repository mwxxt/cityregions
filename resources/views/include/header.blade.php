@section('header')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">TMNT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('personlist')}}">Peoples</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('product')}}">Area</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('productcat')}}">Region</a>
            </li>
            </ul>

        </div>
    </div>
</nav>