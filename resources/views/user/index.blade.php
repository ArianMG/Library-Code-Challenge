@extends('layouts.app', [])

@section('title', 'Users')

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="{{ route('book.index') }}">
                    <button type="button" class="btn btn-danger"> Back </button>
                </a>
                <a href="{{ route('user.create') }}">
                    <button type="button" class="btn btn-primary"> Add User </button>
                </a>
            </div>
            <div class="col-md-12 mt-4">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $user) }}" class="btn btn-success">
                                            View
                                        </a>
                                        <a href="{{ route('user.edit', $user) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                        <a href="{{ route('user.destroy', $user) }}" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <td colspan="5"><span> No users available </span></td>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
