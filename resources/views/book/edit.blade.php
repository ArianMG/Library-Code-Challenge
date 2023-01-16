@extends('layouts.app', [])

@section('title', "Edit Book")

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col">
                <div class="col-md-12 text-end">
                    <a href="{{ route('book.index') }}"> 
                        <button type="button" class="btn btn-danger"> Back </button>
                    </a>
                </div>
                
                <div class="card text-bg-light mb-3 mt-3">
                    <div class="card-header"> Edit Book </div>
                    <div class="card-body">
                        <form action="{{ route('book.update', $book) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                <input type="text" name="name" value="{{ $book->name }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
    
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Author</span>
                                <input type="text" name="author" value="{{ $book->author }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
    
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Published Date</span>
                                <input type="date" name="published_date" value="{{ date($book->published_date) }}" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>
    
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                <select name="categories[]" class="form-select" id="inputGroupSelect01">
                                    <option>Choose...</option>
                                    @forelse ($categories as $key => $category)
                                        <option value={{ $key }} {{ $category == $book->categories[0]->name ? 'selected' : '' }}> {{ $category }} </option>
                                    @empty
                                        <option> No category avaliable </option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="input-group mb-3 mt-3">
                                <button type="submit"  class="btn btn-primary"> Save </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
