<x-app>
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title">Manajemen Pengguna</h2>
                    <div class="row my-4">
                        <div class="col-md-8">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Edit Pengguna</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{ route('pengguna.update', $user->id) }}"
                                        method="POST" novalidate>
                                        @csrf
                                        @method('PUT')

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $user->name }}" required>
                                                <div class="invalid-feedback"> Nama wajib diisi </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Alamat Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ $user->email }}" required>
                                                <div class="invalid-feedback"> Gunakan email yang valid </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="password">Password <small>(kosongkan jika tidak
                                                        diganti)</small></label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password">
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="role">Peran</label>
                                                <select class="custom-select" id="role" name="role" required>
                                                    <option value="admin"
                                                        {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="user"
                                                        {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                </select>
                                                <div class="invalid-feedback"> Pilih peran </div>
                                            </div>

                                            <div class="col-md-3 mb-3">
                                                <label for="active">Status</label>
                                                <select class="custom-select" id="active" name="active" required>
                                                    <option value="1" {{ $user->active ? 'selected' : '' }}>Aktif
                                                    </option>
                                                    <option value="0" {{ !$user->active ? 'selected' : '' }}>
                                                        Nonaktif</option>
                                                </select>
                                                <div class="invalid-feedback"> Pilih status </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</x-app>
