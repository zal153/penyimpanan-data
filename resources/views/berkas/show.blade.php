<x-app title="Detail Berkas">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <h2 class="h5 page-title">Detail Berkas</h2>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('berkas.index') }}" class="btn btn-secondary">
                                <i class="fe fe-arrow-left fe-16 mr-2"></i>Kembali
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong>Informasi Berkas</strong>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Judul:</strong> {{ $berkas->judul }}</p>
                                            <p><strong>Pengguna:</strong> {{ $berkas->user->name }}</p>
                                            <p><strong>Kategori:</strong> {{ $berkas->kategori->nama }}</p>
                                            <p><strong>Jenis:</strong> {{ $berkas->jenis_berkas }}</p>
                                            <p><strong>Ukuran:</strong> {{ $berkas->ukuran_readable }}</p>
                                            <p><strong>Status:</strong>
                                                @if ($berkas->diarsipkan)
                                                    <span class="badge badge-secondary">Diarsipkan</span>
                                                @else
                                                    <span class="badge badge-success">Aktif</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Nama File:</strong> {{ $berkas->nama_berkas }}</p>
                                            <p><strong>Nama Asli:</strong> {{ $berkas->nama_asli }}</p>
                                            <p><strong>Tipe MIME:</strong> {{ $berkas->tipe_mime }}</p>
                                            <p><strong>Dibuat:</strong> {{ $berkas->created_at->format('d/m/Y H:i') }}
                                            </p>
                                            <p><strong>Diperbarui:</strong>
                                                {{ $berkas->updated_at->format('d/m/Y H:i') }}</p>
                                            <p><strong>Deskripsi:</strong> {{ $berkas->deskripsi ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong>Aksi</strong>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('berkas.backup', $berkas->id) }}" method="POST"
                                        class="mb-2">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-block">
                                            <i class="fe fe-save fe-16 mr-2"></i>Backup Berkas
                                        </button>
                                    </form>

                                    <form action="{{ route('berkas.destroy', $berkas->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus berkas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block">
                                            <i class="fe fe-trash fe-16 mr-2"></i>Hapus Berkas
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="card shadow">
                                <div class="card-header">
                                    <strong>Riwayat Aktivitas</strong>
                                </div>
                                <div class="card-body">
                                    <div class="list-group list-group-flush my-n3">
                                        @forelse($berkas->aktivitas()->latest()->take(5)->get() as $aktivitas)
                                            <div class="list-group-item">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <small><strong>{{ $aktivitas->description }}</strong></small>
                                                        <div class="my-0 text-muted small">
                                                            {{ $aktivitas->created_at->diffForHumans() }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center text-muted">
                                                Tidak ada aktivitas
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app>
