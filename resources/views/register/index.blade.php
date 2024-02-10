@extends('layout.nav')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-registration m-auto">
                <form action="/register" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Register Now</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid
                        @enderror"
                            id="floatingInput" placeholder="username" name="name" autocomplete="off"
                            value="{{ old('name') }}">
                        <label for="floatingInput">Your Username</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email"
                            class="form-control @error('email') is-invalid
                        @enderror"
                            id="floatingInput" placeholder="name@example.com" name="email" autocomplete="off"
                            value="{{ old('email') }}">
                        <label for="floatingInput">Your Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password"
                            class="form-control @error('password') is-invalid
                        @enderror"
                            id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Your Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3" type="submit">Register</button>
                </form>
            </main>
        </div>
    </div>
@endsection
