@extends('layouts.app', [])

@section('title', "Books")

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="{{ route('book.create') }}"> 
                    <button type="button" class="btn btn-success"> Add Book </button>
                </a>
                <a href="{{ route('category.index') }}">
                    <button type="button" class="btn btn-primary"> Categories </button>
                </a>
                <a href="{{ route('user.index') }}">
                    <button type="button" class="btn btn-secondary"> Users </button>
                </a>
            </div>
            <div class="col-md-12 mt-4">                
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Author</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($books as $book)                            
                                <tr>
                                    <th scope="row">{{ $book->id }}</th>                                    
                                    <td>{{ $book->name }}</td>                                   
                                    <td>{{ $book->author }}</td>
                                    <td>
                                        @forelse ($book->categories as $categories)
                                            {{ $categories->name }}
                                        @empty
                                            <h5> No categories avaliable </h5>
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{ route('book.edit', $book) }}">
                                            <button type="button" class="btn btn-success">Edit</button>
                                        </a>
                                        <a href="{{ route('book.destroy', $book) }}">
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </a>
                                        
                                    </td>
                                </tr>
                            
                            @empty
                                <td colspan="5"><span> No books available </span></td>
                            @endforelse
                            
                        </tbody>                        
                    </table>
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
