<x-login title="Register">
    <div class="row align-items-center h-100">
        <form class="col-lg-6 col-md-8 col-10 mx-auto" action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mx-auto text-center my-4">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('login') }}">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        viewBox="0 0 120 120" xml:space="preserve">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                        </g>
                    </svg>
                </a>
                <h2 class="my-3">Register</h2>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}" required>
            </div>

            <hr class="my-4">

            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="mb-2">Ketentuan Password</p>
                    <ul class="small text-muted pl-4 mb-0">
                        <li>Minimal 8 karakter</li>
                        <li>Minimal satu karakter khusus</li>
                        <li>Minimal satu angka</li>
                        <li>Minimal satu huruf kapital</li>
                    </ul>
                </div>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>

            <p class="mt-3 text-center">
                Sudah punya akun? <a href="{{ route('login') }}">Login</a>
            </p>

            <p class="mt-5 mb-3 text-muted text-center">© {{ date('Y') }}</p>
        </form>
    </div>
</x-login>
