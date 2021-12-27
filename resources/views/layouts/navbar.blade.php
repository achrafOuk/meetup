<nav class="navbar navbar-light bg-light">
<div>
  <a class="navbar-brand" href="{{route('index')}}">Laravel Meetups </a>
</div>
  @if(!empty($search))
      <form action= "{{route('search')}}" method='GET' class="form-inline">
        <input 
        class="form-control mr-sm-2" 
        name='search' 
        value='{{$search}}'
        type="search" 
        placeholder="search" aria-label="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">search</button>
      <input type="text" name="search" required/>
      <button type="submit">search</button>
    </form>
  @else
      <form action= "{{route('search')}}" method='GET' class="form-inline">
        <input 
        class="form-control mr-sm-2" 
        type="search" 
        name='search' 
        placeholder="search" aria-label="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">search</button>
    </form>
  @endif
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