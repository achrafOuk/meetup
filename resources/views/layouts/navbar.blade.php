<nav class="navbar navbar-light bg-light">
<div>
  <a class="navbar-brand" href="{{route('index')}}">Meetup </a>
@auth
  <a class="navbar-brand">Manage your events</a>
@endauth
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
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
    @endauth

</div >
</nav>