@extends('layouts.app', [])

@section('title', "Categories")

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="{{ route('book.index') }}">
                    <button type="button" class="btn btn-danger"> Back </button>
                </a>
                <a href="{{ route('category.create') }}"> 
                    <button type="button" class="btn btn-success"> Add Category </button>
                </a>
            </div>
            <div class="col-md-12 mt-4">                
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)                            
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>                                    
                                    <td>{{ $category->name }}</td>                                   
                                    <td>{{ $category->description }}</td>
                                    <td width=20%>
                                        <a href="{{ route('category.edit', $category) }}">
                                            <button type="button" class="btn btn-success">Edit</button>
                                        </a>
                                        <a href="{{ route('category.destroy', $category) }}">
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </a>
                                        
                                    </td>
                                </tr>
                            
                            @empty
                                <td colspan="5"><span> No category available </span></td>
                            @endforelse
                            
                        </tbody>                        
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
