<style>
    /*notification css*/
 
 
 .wrapper{
   width: 100%;
   height: 100%;
 }
 
 .navbar{
   background: #fff;
   width: 100%;
   height: 60px;
   padding: 0 25px;
   display: flex;
   justify-content: space-between;
   align-items: center;
   box-shadow: 0 1px 2px rgba(0,0,0,0.1);
 }
 
 
 
 .navbar .navbar_right{
    display: flex;
 }
 
 .navbar .navbar_right img{
   width: 35px;
 }
 
 .icon_wrap{
   cursor: pointer;
 }
 
 /* .navbar .navbar_right .notifications{
   margin-right: 25px;
 } */
 
 .notifications .icon_wrap {
     font-size: 28px;
     color: #217262;
 }
 
 
 .notifications{
   position: relative;
 }
 
 
 .navbar .profile .profile_dd,
 .notification_dd{
   position: absolute;
   top: 48px;
   right: -15px;
   user-select: none;
   background: #fff;
   border: 1px solid #c7d8e2;
   width: 350px;
   height: auto;
   display: none;
   border-radius: 3px;
   box-shadow: 10px 10px 35px rgba(0,0,0,0.125),
               -10px -10px 35px rgba(0,0,0,0.125);
               z-index:1;
 }
 /* .navbar .navbar_right .notifications:hover .notification_dd {
     display: block;
 } */
 
 .notification_dd:before{
     content: "";
     position: absolute;
     top: -20px;
     right: 15px;
     border: 10px solid;
     border-color: transparent transparent #fff transparent;
 }
 
 .notification_dd li {
     border-bottom: 1px solid #f1f2f4;
     display: flex;
     align-items: center;
 }
 .notification_dd li .act_link {
     padding: 10px 20px;
 }
 
 .notification_dd li a.act_link,.notification_dd li .notify_icon{
   display: flex;
   align-items: center;
 }
 
 .notification_dd .starbucks:hover .act_link{
     background: #ebebeb;
 }
 
 .notification_dd li .notify_icon .icon{
   display: inline-block;
       width: 40px;
     height: 42px;
 }
 
 .notification_dd li.baskin_robbins .notify_icon .icon{
   background-position: 0 -43px;
 }
 
 .notification_dd li.mcd .notify_icon .icon{
   background-position: 0 -86px;
 }
 
 .notification_dd li.pizzahut .notify_icon .icon{
   background-position: 0 -129px;
 }
 
 .notification_dd li.kfc .notify_icon .icon{
   background-position: 0 -178px;
 }
 
 .notification_dd li .notify_data{
   margin: 0 15px;
   / width: 185px; /
 }
 
 .notification_dd li .notify_data .title{
   color: #000;
   font-weight: 600;
   font-size: 13px;
 }
 
 .notification_dd li .notify_data .title > b{
   font-weight: 600;
 }
 
 .notification_dd li .notify_status span {
     font-size: 12px;
     color: #a2a2a2;
     font-weight: 700;
 }
 
 .custom_badge {
     font-size: 10px;
     position: absolute;
     top: 7px;
     right: -14px;
 }
 
 .notification_dd li.show_all{
   padding: 20px;
   display: flex;
   justify-content: center;
 }
 
 .notification_dd li.show_all p{
   font-weight: 700;
   color: #3b80f9;
   cursor: pointer;
 }
 
 .notification_dd li.show_all p:hover{
   text-decoration: underline;
 }
 
 .navbar .navbar_right .profile .icon_wrap{
   display: flex;
   align-items: center;
 }
 
 .navbar .navbar_right .profile .name{
   display: inline-block;
   margin: 0 10px;
 }
 
 
 .navbar .navbar_right .notifications.active .icon_wrap{
   color: #217262;
 }
  
 .navbar .profile .profile_dd{
   width: 225px;
 }
 .navbar .profile .profile_dd:before{
   rigth: 10px;
 }
 
 .navbar .profile .profile_dd ul li {
     border-bottom: 1px solid #f1f2f4;
 }
 
 .navbar .profile .profile_dd ul li  a{
     display: block;
     padding: 15px 35px;
     position: relative;
 }
 
 .navbar .profile .profile_dd ul li  a .picon{
   display: inline-block;
   width: 30px;
 }
 
 .navbar .profile .profile_dd ul li  a:hover{
   color: #3b80f9;
   background: #f0f5ff;
   border-bottom-left-radius: 0;
   border-bottom-right-radius: 0;
 }
 
 .navbar .profile .profile_dd ul li.profile_li a:hover {
     background: transparent;
     cursor: default;
     color: #7f8db0;
 }
 
 .navbar .profile .profile_dd ul li .btn{
     height: 32px;
     padding: 7px 10px;
     color: #fff;
     border-radius: 3px;
     cursor: pointer;
     text-align: center;
     background: #3b80f9;
     width: 125px;
     margin: 5px auto 15px;
 }
 
 .navbar .profile .profile_dd ul li .btn:hover{
   background: #6593e4;
 }
 
 .profile.active .profile_dd,
 .notifications.active .notification_dd{
   display: block;
 }
 .active-open .minus-image{
     display: block !important;
     transition:1s;
 }
 .active-open .plus-image{
     display: none;
     transition:1s;
 }
 
 @media (max-width: 641px) {
     .notifications .icon_wrap {
     font-size: 20px;
 }
 /*.notification_dd li .notify_icon .icon {*/
 /*    display: inline-block;*/
 /*    width: 30px;*/
 /*    height: 30px;*/
 /*}*/
 /*.notification_dd li .act_link {*/
 /*    padding: 7px 10px;*/
 /*}*/
 .navbar  .notification_dd {
     position: absolute;
     top: 48px;
     right: -15px;
     width: 315px;
     z-index:9999;
 }
    .subscription_button_admin {
     display: flex !important;
     justify-content: space-between;
     align-items: center;
 }
 }
 
 @media (max-width: 375px) {
 .headerlogo {
     height: 41px;
 }
 .navbar {
     padding: 0 20px;
 }
  .notification_dd {
     position: absolute;
     top: 48px;
     right: -15px;
     width: 240px;
     z-index: 9999;
 }
    .subscription_button_admin {
     display: block !important;
 
 }
 .subscription_button_admin a, .subscription_button_admin button {
     width: 100%;
     margin: 4px 0px;
 }
 }
 
 /*end notification css*/
 </style>
<header class="header-area style-1">
    <div class="header-logo">
        <a href="{{ route('home') }}"><img alt="image" src="{{ asset('images/main-logo.png') }}"></a>
    </div>
    <div class="main-menu">
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap ">
                <a href="{{ route('home') }}"><img alt="image" src="{{ asset('images/main-logo.png') }}"></a>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x-lg"></i>
            </div>
        </div>
        <ul class="menu-list">
            <li class="menu-item-has-children"><a href="{{ route('home') }}">Home</a></li>

            @if (Auth::check() && Auth::guard('web')->user()->role == 2)
                <li><a href="{{ route('active-auctions') }}">Active Auctions</a></li>
               <li><a href="{{ route('categories') }}">Categories</a></li>
            @else
                <li><a href="{{ route('categories') }}">Categories</a></li>
            @endif
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact </a></li>
        </ul>
        <div class="d-lg-none d-block">
            <form class="mobile-menu-form mb-5">
                <div class="input-with-btn d-flex flex-column">
                    <input type="text" placeholder="Search here...">
                    <button type="submit" class="eg-btn btn--primary btn--sm">Search</button>
                </div>
            </form>
        </div>
    </div>
    @if (Auth::check())
        <div class="nav-right d-flex align-items-center">
            <div class="user-new-menu-icon">
                <a href="{{ route('dashboard') }}"><img
                        src="{{ asset('front_assets/images/user-icon/user.png') }}"></a>
            </div>
            @php
              if(Auth::guard('web')->user()->role == 2){
            $activityLogs = \App\Models\Activitylog::where('receive',1)->where('seller_id',Auth::guard('web')->user()->id)->get();
             }else{
               $activityLogs = \App\Models\Activitylog::where('sender',1)->where('buyer_id',Auth::guard('web')->user()->id)->get();
             }
        @endphp
               
                        <!--notification icon-->
                        <div class="notifications user-new-menu-icon">
                          <div class="icon_wrap position-relative"><img src="{{asset('front_assets/images/user-icon/chat.png') }}">
                          
                          @if($activityLogs->count() > 0 )
                              <span class=" translate-middle badge rounded-pill bg-danger custom_badge">
                                  {{$activityLogs->count()}}
                                </span> 
                                @endif
                              
                          </div>
                        
                          @if($activityLogs->count() > 0)
                          <div class="notification_dd">
                            @forEach($activityLogs as $activityLog)
                              <ul class="notification_ul ps-0">
                              <a href="{{ route('active-auctions-category', ['auction_id' => $activityLog->auction_id]) }}">
    
                                  <li class="starbucks success">
                                      {{-- <div class="notify_icon">
                                          <span class="icon"></span>  
                                      </div> --}}
                                      <div class="notify_data">
                                          {{-- <div class="title">
                                            @if(Auth::guard('web')->user()->role == 2)
                                              {{ $activityLog->Buyer->name }}
                                            @else
                                            {{ $activityLog->Seller->name }}
                                            @endif
                                          </div> --}}
                                          <div class="notify_status">
                                              <span>{{ $activityLog->message }}</span>  
                                          </div>
                                      </div>
                                    
                                  </li>
                                  </a>  
                              </ul>
                              @endforeach
                          </div>
                          @endif
                          
                        </div>
                                  <!--notification end-->
            <div class="user-new-menu-icon">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                    <img src="{{ asset('front_assets/images/user-icon/logout.png') }}"></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="mobile-menu-btn d-lg-none d-block">
                <a href="{{ route('home') }}"><i class="bx bx-menu"></i></a>
            </div>
        </div>
    @else
        <div class="nav-right d-flex align-items-center">
            <div class="search-btn">
                <i class="bi bi-search"></i>
            </div>
            <div class="eg-btn btn--primary header-btn me-2">
                <a href="{{ route('login') }}">Login</a>
            </div>
            <div class="eg-btn btn--primary header-btn">
                <a href="{{ route('register') }}">Register</a>
            </div>
            <div class="mobile-menu-btn d-lg-none d-block">
                <i class="bx bx-menu"></i>
            </div>
        </div>
    @endif
</header>
