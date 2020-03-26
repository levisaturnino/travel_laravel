<nav class="navbar navbar-expand navbar-dark bg-primary">
    <div class="navbar-nav w-100">
        <a class="navbar-brand text-color" href="/">TravelPlanet</a>
        @auth
            <a class="nav-item nav-link" href="/hotels">Browse Hotels</a>
            <a href="{{route('reservations.index')}}" class="nav-item nav-link">Reservations</a>
        @endauth
    </div>
    @auth
    <a class="navbar-brand text-color" href="{{route('logout')}}">Logout({{ Auth::user()->name }})</a>
    @endauth
</nav>
