@extends('dashboard.lay.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Are you sure want to edit this user, {{ auth()->user()->name }}?</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form action="{{ route('user.update', ['id' => $users->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid
                        @enderror"
                id="floatingInput" placeholder="make username" name="name" autocomplete="off"
                value="{{ $users->name }}">
            <label for="floatingInput">make Username</label>
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="email" class="form-control @error('email') is-invalid
                        @enderror"
                id="floatingInput" placeholder="make email" name="email" autocomplete="off" value="{{ $users->email }}">
            <label for="floatingInput">make email</label>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" class="form-control @error('password') is-invalid
                        @enderror"
                id="floatingInput" placeholder="make password" name="password" autocomplete="off"
                value="{{ $users->password }}">
            <label for="floatingInput">make Password</label>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">
            Edit
        </button>
    </form>
@endsection
