<nav class="navbar navbar-expand-lg bg-dark text-white">
    <div class="container-fluid">
      <!--<div class="w-100 logo">-->
        <ul class="navbar-nav me-auto">
          @php 
          use App\Models\SiteSetting;
          $result = SiteSetting::get();
          $admin = $result->load('photo');
          @endphp
         
         @if(!empty($admin[0]->icon))
         <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}">
         <img src="{{ asset('uploads/site_image/' . $admin[0]->photo->file) }}" alt="logo" style="max-height: 50px;">
        </a>
        @endif
      </ul>
      {{-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> --}}
        <ul class="nav justify-content-end">
            <li class="nav-item ">
              <a class="nav-link active text-white" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="{{ route('categoryshow') }}">Category</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">About</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Contact</a>
              </li>

              @guest

            @if (Route::has('login'))
            <li class="nav-item">     
              <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif
            @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif

                    @else

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-white" id="navbarDropdown"  data-mdb-dropdown-init
                          aria-expanded="false">
                          {{ Auth::user()->name }}</a>
    
                        <div class="dropdown-menu dropdown-menu-end text-center" aria-expanded="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
          
                 @endguest
           
          </ul>
          </li>
        </ul>
      {{-- </div> --}}
    </div>
  </nav>

