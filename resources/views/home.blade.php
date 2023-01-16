@extends('app')

@section('content')
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Four Complete Novels (Great Expectations, Hard Times, A Christmas Carol, A Tale of Two Cities)</td>
                                <td>Charles Dickens</td>
                                <td>Classic Literature</td>
                                <td>
                                    <button type="button" class="btn btn-success">Edit</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    
@endsection