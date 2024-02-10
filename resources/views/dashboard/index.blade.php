@extends('dashboard.lay.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    @can('admin')
                        <th scope="col">Action</th>
                    @endcan
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        @can('admin')
                            <td class="d-flex">
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0 mx-1" onsubmit="return confirm('you sure wanna delete it?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>

                                </form>

                                <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-info text-light">Edit</a>
                                {{-- 
                            <form action="{{ route('user.edit', $users->id) }}" type="button" class="btn info p-0  mx-1">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-info text-light">Edit</button>
                            </form> --}}
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
