@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <header class="bg-white p-5 mb-5">
        <div class="col-md-8 offset-md-2 p-5 my-5"
            style="
            border: solid 1px;
            border-top: none;
            border-bottom-width: 3px;
            border-color: #ffc107;">

            <h1 class="h3">Login - Kegiatan Siswa SLB - B Dharma Asih</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username" class="form-label">Username</label>
                            <input id="username" type="texr"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autofocus placeholder="Masukkan username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning w-100">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </header>
@endsection
