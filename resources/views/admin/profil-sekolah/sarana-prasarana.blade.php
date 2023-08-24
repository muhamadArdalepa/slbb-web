@extends('layouts.app', ['title' => 'Sarana Prasarana - '])
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

                            <h3>Kelola Halaman Sarana Prasarana</h3>
                            <a href="{{ route('sarana-prasarana.create') }}" class="btn btn-primary">Tambah data</a>
                        </div>

                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table id="Table" class="table">
                            <thead>
                                <tr class="small">
                                    <th>No</th>
                                    <th class="lh-1">Sarana<br>prasarana</th>
                                    <th>Gambar</th>
                                    <th>Ditambahkan</th>
                                    <th>Diubah</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $i => $d)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $d->name }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $d->img) }}" style="max-width: 10rem">
                                        </td>
                                        <td style="white-space: nowrap">
                                            {{ \Carbon\Carbon::parse($d->created_at)->translatedFormat('d/m/y | H:i') }}
                                        </td>
                                        <td style="white-space: nowrap">
                                            {{ \Carbon\Carbon::parse($d->updated_at)->translatedFormat('d/m/y | H:i') }}
                                        </td>
                                        <td class="text-center" style="white-space: nowrap">
                                            <a href="{{ route('sarana-prasarana.edit', $d->id) }}"
                                                class="text-decoration-none p-1 text-primary">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form class="d-inline" method="POST"
                                                action="{{ route('sarana-prasarana.destroy', $d->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <span type="submit" class="text-decoration-none p-1 text-danger">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </span>
                                            </form>
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
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Hapus</button>
                </div>
            </div>
        </div>
    </div>


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
        $("form > span").on('click', e => {
            e.preventDefault();

            // Menampilkan modal konfirmasi saat tombol di bawah <span> diklik
            $('#confirmationModal').modal('show');

            // Mengatur tindakan penghapusan ketika tombol "Hapus" dalam modal diklik
            $('#confirmDelete').on('click', function() {
                $(e.currentTarget).closest('form').submit();
            });
        });
    </script>
@endpush
