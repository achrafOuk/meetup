<nav class="navbar navbar-light bg-light">
<div>
  <a class="navbar-brand" href="{{route('index')}}">Laravel Meetups </a>
</div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
  <div >
    @guest
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('signup')}}">register</a>
    @endguest
    @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{route('myevents')}}">My meets</a>
          <a class="dropdown-item" href="{{route('attempt_events')}}">My meets to attempt</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
        </div>
      </li>
  @endauth
</div >
</nav>