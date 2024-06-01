<footer>
         <div class="container">
            <div class="row d-flex">
               <div class="footer-logo">
                  <a href="{{ route('home') }}"><img src="{{asset('images/main-logo.png') }}"></a>
                  <a href="mailto:support@bid.agency">support@bid.agency</a>
               </div>
               <div class="footer-content">
                  <h3>Quick Links</h3>
                  <ul>
                     <li><a href="{{ route('home') }}">Home</a></li>
                     <li><a href="{{ route('categories') }}">Categories</a></li>
                     <li><a href="{{ route('about') }}">About</a></li>
                     <li><a href="{{ route('contact') }}">Contact us</a></li>
                  </ul>
               </div>
               <div class="footer-content">
                  <h3>Other</h3>
                  <ul>
                     <li><a href="#">Home user</a></li>
                     <li><a href="#">User Status</a></li>
                     <li><a href="{{ route('about') }}">About</a></li>
                     <li><a href="{{ route('contact') }}">Contact</a></li>
                  </ul>
               </div>
               <div class="footer-content">
                  <h3>Contact info</h3>
                  <ul>
                     <li><a href="#"><i class="fa-solid fa-phone"></i>+123 4567 89</a></li>
                     <li><a href="#"><i class="fa-solid fa-envelope"></i>Lorem@ipsum.lore</a></li>
                     <li><a href="#"><i class="fa-solid fa-location-dot"></i>Lorem ipsum - 71171</a></li>
                  </ul>
               </div>
               <div class="footer-content">
                  <h3>Social media</h3>
                  <ul>
                      @php
                     $socialMediaModels = \App\Models\SocialMediaModel::get();
                  @endphp
                     @foreach($socialMediaModels as $socialMediaModel)
                     <li><a href="{{ $socialMediaModel->link }}"><i class="fa-brands fa-facebook-f"></i>{{ $socialMediaModel->title }}</a></li>
                     @endforeach
                  </ul>
               </div>
            </div>
            <hr>
            <div class="row footer-bottom-row">
               <p class="text-16 text-center">© 2020 Lift Media. All rights reserved</p>
            </div>
         </div>
      </footer>