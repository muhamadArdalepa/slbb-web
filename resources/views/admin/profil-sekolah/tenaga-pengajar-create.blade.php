@php($data ?? ($data = null))
@extends('layouts.app', ['title' => 'Tenaga Pengajar - '])
@push('css')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.css" rel="stylesheet">
@endpush
@section('content')
    <header class="py-4">
        <div class="d-flex  justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $data ? 'Ubah' : 'Tambah' }} Tenaga Pengajar {{ $data ? $data->name : '' }}</h3>
                        <form method="post"
                            action="{{ route('tenaga-pengajar.' . ($data ? 'update' : 'store'), $data ? $data->id : '') }}"
                            enctype="multipart/form-data">
                            @method($data ? 'PUT' : 'POST')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group mb-3">
                                        <label for="picture" class="form-label">Foto</label>
                                        <div class="bg-primary d-flex align-items-center position-relative overflow-hidden"
                                            style="height: 350px">
                                            <div class="img-cover"
                                                onclick="document.querySelector('.form-control-file').click()"
                                                style="
                                        cursor: pointer;
                                        ">
                                                <h3 class="text-white d-flex flex-column align-items-center"><i
                                                        class="fa-solid fa-image fa-2xl mb-4"></i>Ganti Gambar</h3>
                                            </div>
                                            <img src="{{ $data ? asset('storage/' . $data->picture) : '' }}" alt=""
                                                class="img-thumbnail">
                                            <input type="file" class="form-control-file d-none" name="picture">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="name"
                                                    class="form-label {{ $errors->has('name') ? 'is-invalid' : '' }}">Nama</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ $data ? $data->name : old('name') }}">
                                                <div class="invalid-feedback">
                                                    @error('name')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="nimp"
                                                    class="form-label {{ $errors->has('nimp') ? 'is-invalid' : '' }}">NIP</label>
                                                <input type="text" name="nimp" id="nimp" class="form-control"
                                                    value="{{ $data ? $data->nimp : old('nimp') }}">
                                                <div class="invalid-feedback">
                                                    @error('nimp')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="username"
                                                    class="form-label {{ $errors->has('username') ? 'is-invalid' : '' }}">Username</label>
                                                <input type="text" name="username" id="username" class="form-control"
                                                    value="{{ $data ? $data->username : old('username') }}">
                                                <div class="invalid-feedback">
                                                    @error('username')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="email"
                                                    class="form-label {{ $errors->has('email') ? 'is-invalid' : '' }}">Email</label>
                                                <input type="email" name="email" id="email" class="form-control"
                                                    value="{{ $data ? $data->email : old('email') }}">
                                                <div class="invalid-feedback">
                                                    @error('email')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="password"
                                                    class="form-label {{ $errors->has('password') ? 'is-invalid' : '' }}">password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                                <div class="invalid-feedback">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label for="password_confirmation"
                                                    class="form-label {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">Konfirmasi Password</label>
                                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                                <div class="invalid-feedback">
                                                    @error('password_confirmation')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group text-end mt-5">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@push('js')
    <script>
        // Function to display image preview when file input changes
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    input.previousElementSibling.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Bind the readURL function to the file input change event
        $(document).ready(function() {
            $('.form-control-file').change(function(e) {
                e.preventDefault(); // Prevent form submission
                readURL(this);
            });
        });
    </script>
@endpush
