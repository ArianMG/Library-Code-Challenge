@extends('layouts.app', [])

@section('title', "Create Book")

@section('content')
    <div class="container text-center mt-5">

        <x-message></x-message>

        <div class="row">
            <div class="col">
                <div class="col-md-12 text-end">
                    <a href="{{ route('category.index') }}"> 
                        <button type="button" class="btn btn-danger"> Back </button>
                    </a>
                </div>
                
                <div class="card text-bg-light mb-3 mt-3">
                    <div class="card-header"> Edit Category </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                                <input type="text" name="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group">
                                <span class="input-group-text">Description</span>
                                <textarea class="form-control" name="description" aria-label="description" cols="60" rows="10"></textarea>
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
