<header class="pt-5 pb-3 bg-white">
    <div class="container">
        <div class="px-4 py-3  bg-light rounded-4">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-decoration-none text-dark" href=""><i
                                class="fas fa-home me-1"></i> Beranda</a></li>
                    @foreach ($pages ?? [] as $page)
                        <li class="breadcrumb-item"><a class="text-decoration-none text-dark"
                                href="{{ env('APP_URL') . '/' . $page['route'] }}">{{ $page['name'] }}</a>
                        </li>
                    @endforeach
                    <li class="breadcrumb-item active text-muted" aria-current="page">{{ $active }}</li>
                </ol>
            </nav>
        </div>
    </div>
</header>
