@auth  
  @php
    $recruiter = (session('user_type') == 2) ? false : true;
    $user_account = auth()->user()->userAccount;
  @endphp
@endauth
<div class="nav-wrapper">
  <section class="container navbar_section text-center">
      <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container-fluid">
              <span class="responsive-nav-justify">
                  @if ($links !== 'false')
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_toggle" aria-controls="navbar_toggle" aria-expanded="false" aria-label="Toggle navigation">
                          <i class="fas fa-bars"></i>
                      </button>
                  @endif
                  <a class="nav-brand" href="{{ url('/') }}">Bizzzy</a>
              </span>

              
              <div class="d-flex align-items-center sm-authentication">
                  @auth
                      {{-- <li class="nav-item"> --}}
                          <form action="{{ route('user.logout') }}" method="post">
                              @csrf
                              <button class="btn-nav-link" type="submit">Logout</button>
                          </form>
                      {{-- </li> --}}
                  @endauth
                  @guest
                      {{-- <li class="nav-item"> --}}
                          <a class="nav-link login" aria-current="page" href="{{ route('user.login') }}">Sign In</a>
                      {{-- </li> --}}
                      {{-- <li class="nav-item"> --}}
                          <a class="nav-link signup-sm" role="button" href="{{ route('user.register') }}">Sign Up</a>
                      {{-- </li> --}}
                  @endguest
              </div>
              

              
                
              {{-- </form> --}}

              @auth
              <!-- Right elements -->
              @if ($links !== 'false')
                  <div class="collapse navbar-collapse" id="navbar_toggle">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">                      
                        <li class="nav-item">
                            <div class="search_input_group">
                                <img src="{{asset('/images/icons/search-gray.svg')}}" class="search_icon_input">
                                <input class="form-control me-2" type="text" placeholder="Search here" aria-label="Search">
                            </div>
                        </li>
                      </ul>
                      <ul class="navbar-nav ms-auto">
                        {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex"> --}}
                          @if ($recruiter)
                            <li class="nav-item dropdown">
                              <a class="nav-link text-reset me-2 dropdown-toggle hidden-arrow" href="#" id="jobsDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" > Jobs </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="jobsDropdown" >
                                <li>
                                  <a class="dropdown-item" href="{{ route('recruiter.job.index') }}">My Jobs</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="{{ route('user.job.index') }}">All Job Posts</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="{{ route('recruiter.contract.index') }}">All Contracts</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('recruiter.job.create') }}">Post a Job</a>
                                </li>
                                <li>
                                  <a href="{{ route('freelancer.index') }}" class="dropdown-item" aria-current="page" href="#">Any Hire</a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link text-reset me-2 dropdown-toggle hidden-arrow" href="#" id="talentsDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" > Talent </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="talentsDropdown" >
                                <li>
                                  <a class="dropdown-item" href="#">Discover</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Your Hires</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Company Hires</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">BYO Talents</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Recently viewed </a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Saved talent</a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link text-reset me-2 dropdown-toggle hidden-arrow" href="#" id="reportsDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" > Reports </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="reportsDropdown" >
                                <li>
                                  <a class="dropdown-item" href="#">Transaction Reports</a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-reset me-3" aria-current="page" href="#">Messages</a>
                            </li>  
                          @else
                            <li class="nav-item dropdown">
                              <a class="nav-link text-reset me-2 dropdown-toggle hidden-arrow" href="#" id="findWorkDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" > Jobs </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="findWorkDropdown" >
                                <li>
                                  <a class="dropdown-item" href="{{ route('user.job.index') }}">Find Work</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="{{ route('freelancer.save.job.index') }}">Saved jobs</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="{{ route('job.offer.index') }}">Proposals</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('freelancer.profile.index') }}">Profile</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">My Stats</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Bizzzy readiness test</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">My project dashboard</a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link text-reset me-2 dropdown-toggle hidden-arrow" href="#" id="myJobsDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" > My Jobs </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="myJobsDropdown" >
                                <li>
                                  <a class="dropdown-item" href="#">My Jobs</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="{{ route('freelancer.contract.index') }}">All Contracts</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="{{ route('freelancer.work.diary.index') }}">Work Diary</a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link text-reset me-2 dropdown-toggle hidden-arrow" href="#" id="freelancerReportsDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false" > Reports </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="freelancerReportsDropdown" >
                                <li>
                                  <a class="dropdown-item" href="{{ route('freelancer.overview.index') }}">Overview</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">My Reports</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Billings & Earnings</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Connects History</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Transaction History</a>
                                </li>
                                <li>
                                  <a class="dropdown-item" href="#">Certifacte of Earnings</a>
                                </li>
                              </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-reset me-3" aria-current="page" href="#">Messages</a>
                            </li>                        
                          @endif
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('start.message') }}">Profile Setup</a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="text-warning nav-link" href="{{ route('admin.login') }}">Admin</a>
                            </li>
                            <li class="nav-item">
                                <a class="text-secondary nav-link" href="{{ route('staff.login') }}">Staff</a>
                            </li> --}}
                        {{-- </ul> --}}
                      </ul>
                  </div>
              @endif
              <div class="ms-auto d-flex align-items-center lg-authentication">
                  {{-- <li class="nav-item"> --}}
                      
                  {{-- </li> --}}
                  
                  {{-- <span class="me-2">{{ auth()->user()->name }}</span> --}}
                  <!-- Avatar -->
                  <div class="dropdown">
                      <a
                        class="dropdown-toggle d-flex align-items-center hidden-arrow"
                        href="#"
                        id="navbarDropdownMenuAvatar"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <img
                          src="
                          @if (!empty(auth()->user()->photo) AND file_exists(public_path('storage/' . auth()->user()->photo)))
                            {{ asset('storage/' . auth()->user()->photo) }}
                          @else
                            {{ asset('images\general\avatar.png') }}
                          @endif
                          "
                          class="rounded-circle"
                          height="25"
                          alt="Black and White Portrait of a Man"
                          loading="lazy"
                        />
                      </a>
                      <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="navbarDropdownMenuAvatar"
                      >
                      <li>
                        <div class="form-check" style="display: inline-block; white-space: nowrap; text-align: center; padding: 1rem">
                            <input class="register-radio left" type="radio" id="freelancer" name="freelancer_or_recuriter" value="freelancer" checked/>
                            <label for="freelancer">Online</label>
                            <input class="register-radio right" type="radio" id="recruiter" name="freelancer_or_recuriter" value="recruiter" />
                            <label for="recruiter">Invisible</label>
                        </div>
                      </li>
                      <li>
                        @foreach ($user_account as $item)
                          <div class="navbar-freelancer @if ($item->client_or_freelancer == session('user_type')) active @endif" @if ($item->client_or_freelancer != session('user_type')) onclick="change_type({{ $item->client_or_freelancer }})" @endif style="cursor: pointer">
                            <img src="@if (!empty(auth()->user()->photo) AND file_exists(public_path('storage/' . auth()->user()->photo)))
                              {{ asset('storage/' . auth()->user()->photo) }}
                            @else
                              {{ asset('images\general\avatar.png') }}
                            @endif" class="rounded-circle" height="45" alt="Black and White Portrait of a Man" loading="lazy" />
                            <div class="nav-text">
                              <strong>{{ ($item->client_or_freelancer == '1' AND !is_null(auth()->user()->recruiter_profile)) ? auth()->user()->recruiter_profile->name : auth()->user()->name }}</strong>
                              @if ($item->client_or_freelancer == '1')
                              <p class="m-0 p-0">Recruiter</p>
                              @else
                              <p class="m-0 p-0">Freelancer</p>
                              @endif
                            </div>
                          </div>
                        @endforeach                        
                      </li>
                        <li>
                          <a class="dropdown-item" href="{{ route('setting.index') }}"><i class="fa-solid fa-gear"></i><span class="ms-2">Settings</span></a>
                        </li>
                        <li>
                          <form action="{{ route('user.logout') }}" method="post">
                              @csrf
                              <button  class="dropdown-item" type="submit"><i class="fas fa-sign-out"></i><span class="ms-2">Logout</span></button>
                          </form>
                        </li>
                      </ul>
                  </div>
                </div>
                @endauth
                @guest('admin')
                <div class="d-flex align-items-center lg-authentication">
                  @guest()
                      {{-- <li class="nav-item"> --}}
                              <a class="nav-link login" aria-current="page" href="{{ route('user.login') }}">Sign In</a>
                          {{-- </li> --}}
                          {{-- <li class="nav-item"> --}}
                              <a class="btn btn-outline-success signup-lg" role="button" href="{{ route('user.register') }}">Sign Up</a>
                          {{-- </li> --}}
                      @endguest
                  </div>
                  @endguest
                </div>
          </div>
      </nav>
  </section>
</div>