<nav class="navbar navbar-expand shadow-sm {{ $class }} ">
    <div class="container">
        <a class="navbar-brand d-flex" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="50" class="d-inline-block align-text-top">
            <div class="lh-1 ms-2 fw-bold d-flex flex-column justify-content-center  fs-6">
                <div class="">SLB-B</div>
                <div class="">DHARMA ASIH</div>
            </div>
        </a>

        <div class="navbar-nav ms-auto">
            <button class="nav-item btn btn-white lh-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <i class="fa-solid fa-bars "></i>
            </button>
            <div class="nav-item dropdown me-2">
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
            </div>
        </div>
    </div>
</nav>
