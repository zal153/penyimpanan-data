<x-app title="Berkas">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    @endpush

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Manajemen Berkas</h2>
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pengguna</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Jenis</th>
                                                <th>Ukuran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($berkas as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->kategori->nama }}</td>
                                                    <td>{{ $item->jenis_berkas }}</td>
                                                    <td>{{ $item->ukuran_readable }}</td>
                                                    <td>
                                                        @if ($item->diarsipkan)
                                                            <span class="badge badge-secondary">Diarsipkan</span>
                                                        @else
                                                            <span class="badge badge-success">Aktif</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm dropdown-toggle more-horizontal"
                                                            type="button" data-toggle="dropdown">
                                                            <span class="text-muted sr-only">Aksi</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#" data-toggle="modal"
                                                                data-target="#detailModal{{ $item->id }}">
                                                                <i class="fe fe-eye fe-12 mr-2"></i>Detail
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fe fe-edit fe-12 mr-2"></i>Backup
                                                            </a>
                                                            <a class="dropdown-item text-danger" href="#">
                                                                <i class="fe fe-trash fe-12 mr-2"></i>Hapus
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal Detail -->
                                                <div class="modal fade" id="detailModal{{ $item->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Detail Berkas</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p><strong>Nama File:</strong>
                                                                            {{ $item->nama_berkas }}</p>
                                                                        <p><strong>Nama Asli:</strong>
                                                                            {{ $item->nama_asli }}</p>
                                                                        <p><strong>Lokasi:</strong>
                                                                            {{ $item->lokasi_berkas }}</p>
                                                                        <p><strong>Tipe MIME:</strong>
                                                                            {{ $item->tipe_mime }}</p>
                                                                        <p><strong>Deskripsi:</strong>
                                                                            {{ $item->deskripsi }}</p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p><strong>Token Akses:</strong>
                                                                            {{ $item->token_akses }}</p>
                                                                        <p><strong>Berakhir Pada:</strong>
                                                                            {{ $item->berakhir_pada }}</p>
                                                                        <p><strong>Metadata:</strong>
                                                                            <pre>{{ json_encode($item->metadata, JSON_PRETTY_PRINT) }}</pre>
                                                                        </p>
                                                                        <p><strong>Favorit:</strong>
                                                                            {{ $item->favorit ? 'Ya' : 'Tidak' }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <tr>
                                                    <td colspan="8" class="text-center">Tidak ada data berkas yang
                                                        tersedia.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            $('#dataTable-1').DataTable({
                autoWidth: true,
                "lengthMenu": [
                    [16, 32, 64, -1],
                    [16, 32, 64, "All"]
                ]
            });
        </script>
    @endpush
</x-app>
