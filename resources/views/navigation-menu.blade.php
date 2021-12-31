<nav class="navbar">
    @auth
    <div class="navbar-content">
        <button id="toggle-sidebar-btn" class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
    </div>
    @endauth
    <a href="{{ config('app.url') }}" class="navbar-brand ml-10 ml-sm-20">
        <span class="d-none d-sm-flex">{{ config('app.name') }}</span>
    </a>
    <div class="navbar-content ml-auto">
        <button class="btn btn-action mr-5" type="button" onclick="halfmoon.toggleDarkMode()">
            <i class="fa fa-moon-o" aria-hidden="true"></i>
            <span class="sr-only">Toggle dark mode</span>
        </button>
        <div class="dropdown">
            <button class="btn btn-primary" data-toggle="dropdown" type="button" id="sign-in-dropdown-toggle-btn"
                    aria-haspopup="true" aria-expanded="false">
                @auth
                    {{ auth()->user()->name }} @endauth @guest Sign in @endguest <i class="fa fa-angle-down ml-5"
                                                                                    aria-hidden="true"></i>
                <!-- ml-5 = margin-left: 0.5rem (5px) -->
            </button>
            <div class="dropdown-menu dropdown-menu-right w-250 w-sm-350" aria-labelledby="sign-in-dropdown-toggle-btn">
                <!-- w-250 = width: 25rem (250px), w-sm-350 = width: 35rem (350px) only on devices where width > 576px -->
                <div class="dropdown-content p-20"> <!-- p-20 = padding: 2rem (20px) -->
                    @auth
                        <h6 class="dropdown-header">Logged as {{ auth()->user()->name }}</h6>
                        <a href="#" class="dropdown-item">Show profile</a>
                        <a href="{{ route('profile.show') }}" class="dropdown-item">Edit profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            Log out
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    @endauth
                    @guest
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="required">Username</label>
                                <input type="text" name="email"
                                       class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                       placeholder="Username"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <label for="password" class="required">Password</label>
                                <input type="password" name="password"
                                       class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                       placeholder="Password"
                                       required="required">
                            </div>
                            <div class="form-group">
                                <div class="custom-switch">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember me</label>
                                </div>
                            </div>
                            <input class="btn btn-primary btn-block" type="submit" value="Sign in">
                            <div class="text-right mt-10">
                                <!-- text-right = text-align: right, margin-top: 1rem (10px) -->
                                <a href="{{ route('password.request') }}" class="hyperlink">Forgot password?</a>
                                <!-- hyperlink = used on regular links to remove anti-aliasing in dark mode -->
                            </div>
                        </form>
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item text-center">Don't have an account? Sign up</a>
                <!-- text-center = text-align: center -->
                @endguest
            </div>
        </div>
    </div>
</nav>
@auth
    <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>
    <div class="sidebar">
        <div class="sidebar-menu">
            <!-- Sidebar brand -->
            <a href="#" class="sidebar-brand">
                {{ config('app.name') }}
            </a>
            <!-- Sidebar links and titles -->
            <h5 class="sidebar-title">Your place</h5>
            <div class="sidebar-divider"></div>
            <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-nav-link>
            <br/>
            <h5 class="sidebar-title">Information</h5>
            <div class="sidebar-divider"></div>
            <x-jet-nav-link href="#">
                {{ __('Schedule') }}
            </x-jet-nav-link>
            <br/>
            <h5 class="sidebar-title">Group</h5>
            <div class="sidebar-divider"></div>
            <x-jet-nav-link href="#">
                {{ __('Show your group') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="#">
                {{ __('Edit your group') }}
            </x-jet-nav-link>
            <br/>
            <h5 class="sidebar-title">Your community</h5>
            <div class="sidebar-divider"></div>
            <x-jet-nav-link href="#">
                {{ __('Friends') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="#">
                {{ __('Messages') }}
            </x-jet-nav-link>
            <x-jet-nav-link href="#">
                {{ __('Communities') }}
            </x-jet-nav-link>
        </div>
    </div>
@endauth
