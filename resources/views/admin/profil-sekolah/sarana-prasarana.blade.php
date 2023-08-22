@extends('layouts.app', ['title' => 'Visi Misi - '])
@push('css')
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.css" rel="stylesheet">
@endpush
@section('content')
    <header class="py-4">
        <div class="d-flex  justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <h3>Kelola Halaman Visi dan Misi</h3>
                            <button class="btn btn-primary">Tambah data</button>
                        </div>

                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table id="Table" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Sarana prasarana</th>
                                    <th>Gambar</th>
                                    <th>Ditambahkan pada</th>
                                    <th>Diubah pada</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $d)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $d->img) }}" alt="" class="img-fluid">
                                        </td>
                                        <td style="white-space: nowrap">
                                            {{ \Carbon\Carbon::parse($d->created_at)->translatedFormat('d/m/y | H:i') }} 
                                        </td>
                                        <td style="white-space: nowrap">
                                            {{ \Carbon\Carbon::parse($d->updated_at)->translatedFormat('d/m/y | H:i') }}
                                        </td>
                                        <td class="text-center" style="white-space: nowrap">
                                            <a href="" class="text-decoration-none p-1 text-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="" class="text-decoration-none p-1 text-danger">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.js"></script>
    <script>
        let table = new DataTable('#Table', {
            columns: [
                null,
                null,
                null,
                null,
                null,
                {
                    orderable: false,
                    searchable: false,
                }
            ]
        });
    </script>
@endpush
