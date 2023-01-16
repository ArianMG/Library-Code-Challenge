@extends('layouts.app', [])

@section('title', 'Edit User')

@section('content')
    <div class="container text-center mt-5">

        <x-message></x-message>

        <div class="row">
            <div class="col">
                <div class="col-md-12 text-end">
                    <a class="btn btn-danger" href="{{ route('user.index') }}">
                        Go To Users List
                    </a>
                    <a class="btn btn-danger" href="{{ route('user.create') }}">
                        New User
                    </a>
                </div>

                <div class="card text-bg-light mb-3 mt-3">
                    <div class="card-header"> Edit User </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', [$user]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="input-group mb-3">
                                <span class="input-group-text">Name</span>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Email</span>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary"> Save </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card text-bg-light mb-3 mt-3">
                    <div class="card-header"> Reset Password</div>
                    <div class="card-body">
                        <form action="{{ route('user.update.pwd', [$user]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="input-group mb-3">
                                <span class="input-group-text">Password</span>
                                <input type="password" name="password" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Password Confirmation</span>
                                <input type="password" name="password_confirmation" class="form-control"
                                    aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group mb-3">
                                <button type="submit" class="btn btn-primary"> Save New Password </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
