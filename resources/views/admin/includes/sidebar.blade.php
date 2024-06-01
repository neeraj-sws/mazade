          <!-- Side Nav START -->
          <div class="side-nav vertical-menu nav-menu-light scrollable">
                 <div class="nav-logo" id="logo">
                   
                     @php 
                      use App\Models\SiteSetting;
                      $result = SiteSetting::get();
                      $admin = $result->load('photo');
                      @endphp
                     
                     @if(!empty($admin[0]->icon))
                     <img src="{{ asset('uploads/site_image/' . @$admin[0]->photo->file) }}" alt="logo" style="max-height: 50px;">
                    @endif
                    
                 </div>
                 <ul class="nav-menu newnav-menu">
                    <li class="nav-menu-item {{ ($single_heading == 'Dashboard')? 'router-link-active': '' }}">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="feather icon-home"></i>
                            <span class="nav-menu-item-title">Dashboard</span>
                        </a>
                    </li>
                    <!-- <li class="nav-group-title">APPS</li> -->
                    <li class="nav-menu-item {{ ($single_heading == 'Admin')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.admins.admins') }}">
                            <i class="icon-user feather"></i>
                            <span class="nav-menu-item-title">Admin</span>
                        </a>
                    </li>
                    
                    <li class="nav-menu-item {{ ($single_heading == 'Customer')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.customer.user') }}">
                            <i class="icon-users feather"></i>
                            <span class="nav-menu-item-title">Customers</span>
                        </a>
                    </li>

                    <li class="nav-menu-item {{ ($single_heading == 'company')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.companie.companie') }}">
                            <i class="fa-solid fa-building "></i>
                            <span class="nav-menu-item-title">Companies</span>
                        </a>
                    </li>
                    
              
                    <li class="nav-menu-item {{ ($single_heading == 'Category')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.category.category') }}">
                            <i class="fa-solid fa-table-cells-large"></i>
                            <span class="nav-menu-item-title">Category</span>
                        </a>
                    </li>
                    

                    <li class="nav-menu-item {{ ($single_heading == 'Sub Category')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.sub_category.sub_category') }}">
                            <i class="fa-solid fa-table-cells-large"></i>
                            <span class="nav-menu-item-title">Sub Category</span>
                        </a>
                    </li>
                    
                     <li class="nav-menu-item {{ ($single_heading == 'Auction')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.auctions.auctions') }}">
                            <i class="fa fa-gavel" aria-hidden="true"></i>
                            <span class="nav-menu-item-title">Auctions</span>
                        </a>
                    </li>
                    
                    <!-- <li class="nav-menu-item {{ ($single_heading == 'Company Bit')? 'router-link-active': '' }} ">-->
                    <!--    <a href="{{ route('admin.companybit.companybit') }}">-->
                    <!--        <i class="fa fa-bars" aria-hidden="true"></i>-->
                    <!--        <span class="nav-menu-item-title">Company Bit</span>-->
                    <!--    </a>-->
                    <!--</li>-->

                    <li class="nav-menu-item {{ ($single_heading == 'Status Orders')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.orders.orders') }}">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span class="nav-menu-item-title">Status Orders</span>
                        </a>
                    </li>

                    <!--<li class="nav-menu-item {{ ($single_heading == 'Canceled Auctions')? 'router-link-active': '' }} ">-->
                    <!--    <a href="{{ route('admin.canceled.auctions') }}">-->
                    <!--        <i class="fa fa-times-circle-o" aria-hidden="true"></i>-->
                    <!--        <span class="nav-menu-item-title">Canceled Auction</span>-->
                    <!--    </a>-->
                    <!--</li>-->

                    <!--<li class="nav-menu-item {{ ($single_heading == 'Finished Auctions')? 'router-link-active': '' }} ">-->
                    <!--    <a href="{{ route('admin.finished.auctions') }}">-->
                    <!--        <i class="fa fa-handshake-o" aria-hidden="true"></i>-->
                    <!--        <span class="nav-menu-item-title">Finished Auction</span>-->
                    <!--    </a>-->
                    <!--</li>-->

                    <li class="nav-menu-item {{ ($single_heading == 'City')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.city.city') }}">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="nav-menu-item-title">Cities</span>
                        </a>
                    </li>
                    <li class="nav-menu-item {{ ($single_heading == 'withdraw')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.withdraw.withdraw') }}">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="nav-menu-item-title">Withdraw</span>
                        </a>
                    </li>

                    <li class="nav-menu-item {{ ($single_heading == 'Wallet History')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.wallet-history.wallet-history') }}">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="nav-menu-item-title">Wallet History</span>
                        </a>
                    </li>

                    <li class="nav-menu-item {{ ($single_heading == 'transaction')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.transaction.transaction') }}">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span class="nav-menu-item-title">Transaction</span>
                        </a>
                    </li>
                    <li class="nav-menu-item ">
                      <a href="#cms" data-bs-toggle="collapse">
                          <div class="d-flex justify-content-between">
                              <div class="">
                                  <i class="fa fa-bars" aria-hidden="true"></i>
                                  <span> CMS </span>
                              </div>
                              <div class="">
                                  <span class="menu-arrow">
                                    <i class="fa-solid fa-angle-up  up"></i>
                                    <i class="fa-solid fa-angle-down down "></i>
                                </span>
                              </div>
                          </div>
                      </a>
                      <div class="collapse" id="cms">
                          <ul class="nav-second-level">
                          <li class="nav-menu-item {{ ($single_heading == 'Home')? 'router-link-active': '' }} ">
                                <a href="{{ route('admin.home.home') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                    <span class="nav-menu-item-title">Home</span>
                                </a>
                            </li>
                            <li class="nav-menu-item {{ ($single_heading == 'About')? 'router-link-active': '' }} ">
                                <a href="{{ route('admin.about.about') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                    <span class="nav-menu-item-title">About</span>
                                </a>
                            </li>
                            <li class="nav-menu-item {{ ($single_heading == 'Contact')? 'router-link-active': '' }} ">
                                <a href="{{ route('admin.contact.contact') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                    <span class="nav-menu-item-title">Contact</span>
                                </a>
                            </li>
                              <li class="nav-menu-item {{ ($single_heading == 'Social media')? 'router-link-active': '' }} ">
                                <a href="{{ route('admin.social_media.social_media') }}">
                                <i class="fa-solid fa-arrow-right"></i>
                                    <span class="nav-menu-item-title">Social media</span>
                                </a>
                            </li>
                          </ul>
                      </div>
                  </li>


                    {{-- <li class="nav-menu-item {{ ($single_heading == 'State')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.state.state') }}">
                            <i class="icon-users feather"></i>
                            <span class="nav-menu-item-title">State</span>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-menu-item {{ ($single_heading == 'auction')? 'router-link-active': '' }} ">
                        <a href="{{ route('admin.auction.complet') }}">
                            <i class="icon-users feather"></i>
                            <span class="nav-menu-item-title">Auction Complet</span>
                        </a>
                    </li> --}}

                   

                </ul>
            </div>
            <!-- Side Nav END -->