@extends('layouts.app', [])

@section('content')
    Book <b>{{ $book->name }}</b>
    <p>
        {{ $book->author }}
    </p>
@endsection
