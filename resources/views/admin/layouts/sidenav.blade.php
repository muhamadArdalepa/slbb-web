@push('css')
    <style>
        .accordion-item i {
            transition: transform 300ms ease-in-out
        }
    </style>
@endpush
<div class="offcanvas offcanvas-start border-0 bg-light shadow-sm" style="z-index: 10;top: unset;width: unset"
    data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
    aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-body">
        <div class="accordion" style="width: 240px" id="accordionSidenav">
            <a href="{{ route('admin.dashboard') }}"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.dashboard' ? 'warning' : 'light' }}  w-100 text-start">
                Home
            </a>
            <a href="{{ route('admin.home') }}"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.home' ? 'warning' : 'light' }}  w-100 text-start">
                Home
            </a>
            @foreach (\App\Models\Nav::with('dropdown')->whereNull('parent_id')->get() as $i => $nav)
                @if (count($nav->dropdown) > 0)
                    <div class="accordion-item my-1 bg-transparent border-0" id="heading-{{ $i }}">
                        <a href="#"
                            class="btn my-1 btn-{{ request()->is('admin/' . $nav->route . '*') ? 'warning' : 'light' }} w-100 text-start d-flex"
                            data-bs-toggle="collapse" data-bs-target="#collapse-{{ $i }}"
                            aria-expanded="true" aria-controls="collapse-{{ $i }}">
                            {{ $nav->name }}
                            <i class="fa-solid fa-chevron-down ms-auto align-self-center fa-2xs"></i>
                        </a>
                        <div id="collapse-{{ $i }}"
                            class="accordion-collapse ps-3 {{ request()->is('admin/' . $nav->route . '*') ? '' : 'collapse' }}"
                            aria-labelledby="heading-{{ $i }}" data-bs-parent="#accordionSidenav">

                            @foreach ($nav->dropdown as $dropdown)
                                <a href="{{env('APP_URL'). '/admin/' . $nav->route.'/'. $dropdown->route }}"
                                    class="btn btn-{{ request()->is('*' . $dropdown->route) ? 'secondary' : 'light' }} my-1 w-100 text-start">
                                    {{ $dropdown->name }}
                                </a>
                            @endforeach

                        </div>
                    </div>
                @else
                    <a href="{{ route('admin.' . $nav->route) }}"
                        class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.' . $nav->route ? 'warning' : 'light' }}  w-100 text-start">
                        {{ $nav->name }}
                    </a>
                @endif
            @endforeach


        </div>
        <div class="text-center p-4">
            <span class="btn my-1 border-0 mx-auto" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-circle-chevron-left fa-2xl opacity-25"></i>
            </span>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('.offcanvas').css('height', 'calc(100vh - ' + $('nav')[0].offsetHeight + 'px)')
    </script>
@endpush
