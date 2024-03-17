<nav class="navbar navbar-expand-lg bg-dark text-white">
    <div class="container-fluid">
      
      {{-- <div class="collapse navbar-collapse" id="navbarNavDropdown"> --}}
      
      <ul class="navbar-nav me-auto">
                @php 
                use App\Models\SiteSetting;
                $result = SiteSetting::get();
                $admin = $result->load('photo');
                @endphp
               
               @if(!empty($admin[0]->icon))
               <a class="nav-link active text-white" aria-current="page" href="{{ route('companie.dashboard') }}">
               <img src="{{ asset('uploads/site_image/' . $admin[0]->photo->file) }}" alt="logo" style="max-height: 50px;">
              </a>
              @endif
            </ul>
      
        <ul class="nav justify-content-end">
            
            <li class="nav-item">
                 <a class="nav-link active text-white" aria-current="page" href="{{ route('companie.dashboard') }}">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="#">Winning</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active text-white " aria-current="page" href="{{ route('auctions.bit') }}">Your Bids</a>
             </li>

              {{-- <li class="nav-item">
                 <a class="nav-link active text-white " aria-current="page" href="{{ route('auctions') }}">Your Auctions</a>
              </li> --}}
               @if(Auth::guard('companie')->user())
              <li class="nav-item">
              <a href="{{ route('companieslogout') }}" class="nav-link active btn btn-danger">Logout</a>
            </li>
               @endif
         
        </ul>
      {{-- </div> --}}
    </div>
  </nav>

