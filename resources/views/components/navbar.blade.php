@auth  
  $recuiter = auth()->user()->isRecruiter();
@endauth
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
            

            @if ($links !== 'false')
                <div class="collapse navbar-collapse" id="navbar_toggle">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-center">
                        <li class="nav-item">
                            <a href="{{ route('job.index') }}" class="nav-link {{ request()->is('jobs') ? 'active' : '' }}" aria-current="page" href="#">Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('start.message') }}">Profile Setup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('job.create') }}">Post Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-warning nav-link" href="{{ route('admin.login') }}">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-secondary nav-link" href="{{ route('staff.login') }}">Staff</a>
                        </li>                        
                    {{-- </ul> --}}
                    {{-- <form class="d-flex"> --}}
                        {{-- <ul class="nav justify-content-center"> --}}
                        <li class="nav-item">
                            <div class="search_input_group">
                                <img src="{{asset('/images/icons/search-green.png')}}" class="search_icon_input">
                                <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
                            </div>
                        </li>
                    </ul>
                </div>
            @endif
               
            {{-- </form> --}}

            <!-- Right elements -->
            <div class="d-flex align-items-center lg-authentication">
                @auth
                    {{-- <li class="nav-item"> --}}
                        
                    {{-- </li> --}}
                    
                    <span class="me-2">{{ auth()->user()->name }}</span>
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
                            src="{{ asset('images\general\avatar.png') }}"
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
                        @auth('web')
                          <li>
                            <a class="dropdown-item" href="{{ route('freelancer.index') }}">My profile</a>
                          </li>                            
                          <li>
                            <a class="dropdown-item" href="{{ route('recruiter.job.index') }}">Posted Jobs</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('job.offer.index') }}">Job Offers</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ ($recuiter) ? route('recruiter.contract.index') : route('freelancer.contract.index') }}">Active Contracts</a>
                          </li>
                        @endauth
                        @auth('admin')
                          <li>
                            <a class="dropdown-item" href="{{ route('tag.index') }}">Tags</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('skill.index') }}">Skills</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('category.index') }}">Categories</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('staff.create') }}">Add Staff</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="{{ route('staff.index') }}">Staff List</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="#">
                              &laquo; Authorization
                            </a>
                            <ul class="dropdown-menu dropdown-submenu dropdown-submenu-left">
                              <li>
                                <a class="dropdown-item" href="{{ route('permission.index') }}">Permissions</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="{{ route('role.index') }}">Roles</a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="{{ route('permission.role.index') }}">Permission to Role</a>
                              </li>
                            </ul>
                          </li>
                        @endauth
                          <li>
                            <a class="dropdown-item" href="#">Settings</a>
                          </li>
                          <li>
                            <form action="{{ route('user.logout') }}" method="post">
                                @csrf
                                <button  class="dropdown-item" type="submit">Logout</button>
                            </form>
                          </li>
                        </ul>
                    </div>
                @endauth
                @guest('admin')
                    @guest()
                    {{-- <li class="nav-item"> --}}
                            <a class="nav-link login" aria-current="page" href="{{ route('user.login') }}">Sign In</a>
                        {{-- </li> --}}
                        {{-- <li class="nav-item"> --}}
                            <a class="btn btn-outline-success signup-lg" role="button" href="{{ route('user.register') }}">Sign Up</a>
                        {{-- </li> --}}
                    @endguest
                @endguest
            </div>
        </div>
    </nav>
</section>