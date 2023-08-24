@extends('layouts.app', ['title' => 'Kelola Sejarah - '])
@push('css')
@include('admin.layouts.trix-editor')
@endpush
@section('content')
    <header class="py-4">
        <div class="d-flex  justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3>Kelola Halaman Sejarah</h3>
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        <form method="post" action="{{ route('sejarah.update',1) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="page" value="sejarah">
                            <div class="form-group mb-3">
                                <label for="img" class="form-label">Gambar</label>
                                <div class="d-flex align-items-center position-relative overflow-hidden"
                                    style="max-height: 400px">
                                    <div class="img-cover" onclick="document.querySelector('.form-control-file').click()"
                                        style="
                                        cursor: pointer;
                                        ">
                                        <h3 class="text-white d-flex flex-column align-items-center"><i
                                                class="fa-solid fa-image fa-2xl mb-4"></i>Ganti Gambar</h3>
                                    </div>
                                    <img src="{{ asset('storage/'.$data->img) }}" alt="" class="img-fluid">
                                    <input type="file" class="form-control-file d-none" name="img">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="title"
                                    class="form-label {{ $errors->has('title') ? 'is-invalid' : '' }}">Judul</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    value="{{ $data->title }}">
                                <div class="invalid-feedback">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="body" class="form-label">Body</label>
                                <input id="x" value="{{ $data->body }}" type="hidden" name="body">
                                <trix-editor input="x"></trix-editor>
                                <div id="bodyFeedback" class="invalid-feedback">
                                    @error('body')
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
