<nav class="navbar navbar-expand-md shadow-sm {{ $class }} ">
    <div class="container-fluid">
        <a class="navbar-brand d-flex" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50" class="d-inline-block align-text-top">
            <div class="lh-1 ms-2 fw-bold d-flex flex-column justify-content-center  fs-6">
                <div class="">SLB-B</div>
                <div class="">DHARMA ASIH</div>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                @foreach (\App\Models\Nav::with('dropdown')->whereNull('parent_id')->where('is_auth', 0)->get() as $nav)
                    <li class="nav-item {{ count($nav->dropdown) > 0 ? 'dropdown' : '' }}">
                        <a class="nav-link {{ count($nav->dropdown) > 0 ? 'dropdown-toggle' : '' }} {{ Route::currentRouteName() == $nav->route ? 'active' : '' }}"
                            href="{{ count($nav->dropdown) > 0 ? '#' : env('APP_URL') . '/' . $nav->route }}"
                            @if (count($nav->dropdown) > 0) 
                            role="button"
                            data-bs-toggle="dropdown" 
                            aria-expanded="false" 
                            @endif
                            >
                            {{ $nav->name }}
                        </a>
                        @if (count($nav->dropdown) > 0)
                            <ul class="dropdown-menu">
                                @foreach ($nav->dropdown as $dropdown)
                                    <li><a class="dropdown-item"
                                            href="{{ env('APP_URL') . '/' . $nav->route . '/' . $dropdown->route }}">{{ $dropdown->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                @auth
                    @foreach (\App\Models\Nav::with('dropdown')->whereNull('parent_id')->where('is_auth', 1)->get() as $nav)
                        <li class="nav-item {{ count($nav->dropdown) > 0 ? 'dropdown' : '' }}">
                            <a class="nav-link {{ count($nav->dropdown) > 0 ? 'dropdown-toggle' : '' }}"
                                href="{{ count($nav->dropdown) > 0 ? '#' : env('APP_URL') . '/' . $nav->route }}"
                                @if (count($nav->dropdown) > 0) role="button"
                            data-bs-toggle="dropdown" 
                            aria-expanded="false" @endif>
                                {{ $nav->name }}
                            </a>
                            @if (count($nav->dropdown) > 0)
                                <ul class="dropdown-menu">
                                    @foreach ($nav->dropdown as $dropdown)
                                        <li><a class="dropdown-item"
                                                href="{{ env('APP_URL') . '/' . $nav->route . '/' . $dropdown->route }}">{{ $dropdown->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                @endauth
                @guest
                    <li class="nav-item ">
                        <a class="nav-link {{Route::currentRouteName() == 'login' ? 'active' : ''}}" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        </div>
    </div>
</nav>
