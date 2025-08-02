<x-app title="Pengguna">
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.css') }}">
    @endpush

    <x-alert />

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Manajemen Pengguna</h2>
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Peran</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($user as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->role }}</td>
                                                    <td>
                                                        @if ($item->active)
                                                            <span class="badge badge-success">Aktif</span>
                                                        @else
                                                            <span class="badge badge-secondary">Tidak Aktif</span>
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
                                                            <a class="dropdown-item"
                                                                href="{{ route('pengguna.edit', $item->id) }}">
                                                                <i class="fe fe-edit fe-12 mr-2"></i>Edit
                                                            </a>
                                                            <a class="dropdown-item text-danger" href="#"
                                                                onclick="confirmDelete({{ $item->id }}, '{{ $item->name }}')">
                                                                <i class="fe fe-trash fe-12 mr-2"></i>Hapus
                                                            </a>
                                                            <form id="delete-form-{{ $item->id }}"
                                                                action="{{ route('pengguna.destroy', $item->id) }}"
                                                                method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak ada pengguna
                                                        ditemukan
                                                    </td>
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

            function confirmDelete(userId, userName) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Akan menghapus pengguna "${userName}"`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${userId}`).submit();
                    }
                });
            }
        </script>
    @endpush

</x-app>
