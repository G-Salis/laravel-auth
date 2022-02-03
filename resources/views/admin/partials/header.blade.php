<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Boolpress</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Vai al Sito</a>
            </li>
          @auth
                
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('admin.index') }}">Dashboard</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.posts.index') }}">Elenco Post</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.posts.create') }}">Nuovo Post</a>
              </li>
          @endauth
          </ul>
        </div>
      </div>

      <div class="navbar-nav">
        @auth
        <a class="navbar-link" href="{{route('logout')}}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout</a>
    
        <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
         @csrf
        </form>
        @endauth
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
      </li>
      @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
      @endif
        @endguest
        </div>
    </nav>
</header>