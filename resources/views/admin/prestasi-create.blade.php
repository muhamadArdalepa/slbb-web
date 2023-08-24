@php($data ?? ($data = null))
@extends('layouts.app', ['title' => 'Prestasi - '])
@section('content')
    <header class="py-4">
        <div class="d-flex  justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $data ? 'Ubah' : 'Tambah' }} Data Prestasi</h3>
                        <form method="post"
                            action="{{ route('prestasi.' . ($data ? 'update' : 'store'), $data ? $data->id : '') }}">
                            @method($data ? 'PUT' : 'POST')
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="rank"
                                            class="form-label {{ $errors->has('rank') ? 'is-invalid' : '' }}">Juara
                                            ke</label>
                                        <input type="text" name="rank" id="rank" class="form-control"
                                            value="{{ $data ? $data->rank : '' }}">
                                        <div class="invalid-feedback">
                                            @error('rank')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="year"
                                            class="form-label {{ $errors->has('year') ? 'is-invalid' : '' }}">Tahun</label>
                                        <select class="form-select" id="year" name="year">
                                            @for ($year = date('Y'); $year >= 1900; $year--)
                                                <option @if($data) {{$data->year == $year ? 'selected' : ''}} @endif  value="{{ $year }}">{{ $year }}</option>
                                            @endfor
                                        </select>
                                        <div class="invalid-feedback">
                                            @error('year')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="type"
                                    class="form-label {{ $errors->has('type') ? 'is-invalid' : '' }}">Tipe</label>
                                    <select class="form-select" id="type" name="type">
                                        <option @if($data) {{$data->type == 'Prestasi Siswa' ? 'selected' : ''}} @endif value="Prestasi Siswa">Prestasi Siswa</option>
                                        <option @if($data) {{$data->type == 'Prestasi Guru' ? 'selected' : ''}} @endif value="Prestasi Guru">Prestasi Guru</option>
                                    </select>
                                <div class="invalid-feedback">
                                    @error('type')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="name"
                                    class="form-label {{ $errors->has('name') ? 'is-invalid' : '' }}">Nama
                                    Lomba</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $data ? $data->name : '' }}">
                                <div class="invalid-feedback">
                                    @error('name')
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
