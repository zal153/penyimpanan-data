<x-app title="Tambah Pengguna">
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Manajemen Pengguna</h2>
                    <div class="row my-4">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Tambah Pengguna</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('pengguna.store') }}"
                                        method="POST" novalidate>
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    required>
                                                <div class="invalid-feedback"> Nama wajib diisi </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Alamat Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required>
                                                <div class="invalid-feedback"> Gunakan email yang valid </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" required>
                                                <div class="invalid-feedback"> Password wajib diisi </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="role">Peran</label>
                                                <select class="custom-select" id="role" name="role" required>
                                                    <option selected disabled value="">Pilih...</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                                <div class="invalid-feedback"> Pilih peran </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="active">Status</label>
                                                <select class="custom-select" id="active" name="active" required>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Nonaktif</option>
                                                </select>
                                                <div class="invalid-feedback"> Pilih status </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Simpan</button>
                                        <a href="{{ route('pengguna.index') }}" class="btn btn-danger mx-2">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-app>
