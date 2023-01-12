<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{route('front.index')}}"><img src="{{asset('assets/img/logo/logo.png')}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="{{route('front.index')}}">Home</a></li>
                                        <li><a href="{{route('front.find_jobs')}}">Find a Jobs </a></li>
                                        @if(auth()->check() && auth()->user()->type == 'client')
                                            <li><a href="{{route('front.create_job')}}">Post A Job </a></li>
                                            <li><a href="{{route('front.my_projects')}}">Jobs </a></li>
                                        @endif
                                        @auth
                                       <notification :auth="{{auth()->user()->id}}"></notification>
                                        @endauth
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @guest
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{route('register')}}" class="btn head-btn1">Register</a>
                                    <a href="{{route('login')}}" class="btn head-btn2">Login</a>
                                </div>
                            @else
                                <div class="header-btn d-none f-right d-lg-flex">
                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" class="btn head-btn1">Logout</a>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}"
                                          style="display: none">
                                        @csrf
                                        <button type="submit">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>
                                    <a href="{{route('front.profile')}}" class="btn head-btn2">{{auth()->user()->name}}</a>
                                </div>
                            @endguest
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
