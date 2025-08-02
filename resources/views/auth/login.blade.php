<x-login title="Login">
    <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{ route('login.authenticate') }}"
            method="POST">
            @csrf
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('login') }}">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
            <h1 class="h6 mb-3">Login</h1>

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
                <label for="email" class="sr-only">Email address</label>
                <input type="email" name="email" id="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="Email address" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" id="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password"
                    required>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="remember-me"> Stay logged in
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

            <p class="mt-3">
                Belum punya akun? <a href="{{ route('register') }}">Register</a>
            </p>

            <p class="mt-5 mb-3 text-muted">© {{ date('Y') }}</p>
        </form>
    </div>
</x-login>
