@extends('layouts.app', [])

@section('content')
    Category <b>{{ $category->name }}</b>
    <p>
        {{ $category->description }}
    </p>
@endsection
