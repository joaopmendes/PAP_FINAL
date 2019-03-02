 <nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container">
      <a class="navbar-brand" rel="home" href="{{ route('home')}}" title="Clinica de Ser">
          <img style="max-width:100px; margin-top: -7px;"src="{{ asset('img/logo.png') }}">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link @if ($current == 'index')
            active underline
          @endif" href="{{ route('home')}}">Home  
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($current == 'terapias')
            active underline
          @endif" href="{{ route('terapias')}}" >Terapias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($current == 'blog')
            active underline
          @endif" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($current == 'contactos')
            active underline
          @endif" href="{{ route('contactos')}}">Contactos 
              
            </a>
          </li>
        </ul>
        <form class="form-inline">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
  </div>
  
</nav>

