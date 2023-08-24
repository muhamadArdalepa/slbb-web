@php($data ?? ($data = null))
@extends('layouts.app', ['title' => 'Tambah Kegiatan Siswa - '])
@push('css')
    @include('admin.layouts.trix-editor')
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [
            ['name' => 'Kegiatan Siswa', 'route' => 'kegiatan-siswa'],
            ['name' => 'Kelas ' . $kelas->name, 'route' => 'kegiatan-siswa/' . $kelas->name],
        ],
        'active' => 'Tambah Kegiatan',
    ])
    <section class="bg-white">
        <div class="d-flex justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $data ? 'Ubah' : 'Tambah' }} Kegiatan {{ $data ? $data->title : '' }}</h3>
                        <form method="post"
                            action="{{ route('kegiatan-siswa.' . ($data ? 'update' : 'store'), $data ? $data->id : '') }}"
                            enctype="multipart/form-data">
                            @method($data ? 'PUT' : 'POST')
                            @csrf
                            <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="img" class="form-label">Gambar</label>
                                        <div class="bg-primary d-flex align-items-center position-relative overflow-hidden"
                                            style="height: 200px">
                                            <div class="img-cover"
                                                onclick="document.querySelector('.form-control-file').click()"
                                                style="cursor: pointer;">
                                                <h3 class="text-white d-flex flex-column align-items-center">
                                                    <i class="fa-solid fa-image fa-2xl mb-4"></i>
                                                    Ganti Gambar
                                                </h3>
                                            </div>
                                            <img src="{{ $data ? asset('storage/' . $data->img) : '' }}" alt=""
                                                class="img-fluid">
                                            <input type="file" class="form-control-file d-none" name="img">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 align-self-end">
                                    <div class="form-group mb-3">
                                        <label for="title"
                                            class="form-label {{ $errors->has('title') ? 'is-invalid' : '' }}">Nama
                                            Kegiatan</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ $data ? $data->title : '' }}">
                                        <div class="invalid-feedback">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group mb-3">
                                <label for="desc" class="form-label">Deskripsi</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
                                <div id="descFeedback" class="invalid-feedback">
                                    @error('desc')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-end">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
