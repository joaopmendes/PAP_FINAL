 <nav class="navbar navbar-expand-lg navbar-light bg-light @if($nav_fixed == 'true') fixed-top @endif"  style="background : rgba(0, 0, 0, 0.5)">
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
            active
          @endif" href="{{ route('home')}}">Home
        </a>
          </li>
          <li class="nav-item">

            <div class="dropdown open">
              <a class="dropdown-toggle nav-link" type="" style="cursor: pointer;" id="serviceDropdown" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                    Serviços
              </a>
              <div class="dropdown-menu text-center" aria-labelledby="serviceDropdown">
                  <a class="dropdown-item nav-link @if ($current == 'terapias')
                  active
                @endif" href="{{ route('terapias')}}" >Terapias</a>
                <a class="dropdown-item nav-link @if ($current == 'workshops')
                  active
                @endif" href="{{ route('workshops')}}" >Workshops</a>

              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($current == 'blog')
            active
          @endif" href="{{ route('blog.index') }}">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if ($current == 'contactos')
            active
          @endif "href="{{ route('contactos')}}">Contactos

            </a>
          </li>

            @auth
              <ul class="top-right list-inline">
                    @if ($current == 'blog')
                    <li class="nav-item " style="margin-right: 2em" >
                        <div class="md-form active-purple active-purple-2 mb-3 " >
                            <form action="{{ route('search_post') }}" method='post'>
                                @csrf
                                <input class="form-control nav-link search-bar " id="search_string" name="search_string" type="text" placeholder="Procurar Post" aria-label="Search">
                            </form>
                        </div>
                    </li>
                  @endif
                <li class="nav-item">
                    <div class="dropdown open">
                        <a class="dropdown-toggle nav-link" type="" style="cursor: pointer;" id="serviceDropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="">
                              {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="serviceDropdown">
                            @if (Auth::user()->admin == 'true')
                                <a class="dropdown-item nav-link" href="{{ route('dashboard') }}" >Admin Dashboard</a>
                            @endif
                            <a class="dropdown-item nav-link" href="/logout">Logout</a>

                        </div>
                      </div>
                </li>
                <li class="nav-item">

                </li>
              </ul>
            @endauth
            @guest
              <ul class="top-right list-inline">
                @if ($current == 'blog')
                    <li class="nav-item " style="margin-right: 2em" >
                        <div class="md-form active-purple active-purple-2 mb-3 " >
                            <form action="{{ route('search_post') }}" method='POST'>
                                @csrf
                                <input class="form-control nav-link search-bar " id="search_string" name="search_string" type="text" placeholder="Procurar Post" aria-label="Search">
                            </form>
                        </div>
                    </li>
                  @endif
                <li class="nav-item">
                    <a href="{{ route('login')}}" class="nav-link @if ($current == 'login')
                      active
                    @endif">Iniciar Sessão</a>
                </li>
                <li class="nav-item" id="registerButton">
                    <a href="{{route('register')}}" class="nav-link @if ($current == 'register')
                      active
                    @endif">Registar</a>
                </li>
              </ul>
            @endguest

        </ul>

      </div>
  </div>

</nav>
