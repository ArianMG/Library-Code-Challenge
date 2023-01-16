<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(5);

        return view('book.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view('book.create', compact('categories'));
    }

    public function show(Book $book)
    {
        return view('book.show', [
            'book' => $book
        ]);
    }

    public function edit(Book $book)
    {
        $categories = Category::pluck('name', 'id');
        return view('book.edit', [
            'book' => $book,
            'categories' => $categories
        ]);
    }

    public function store(StoreBookRequest $request)
    {
        $bookData = $request->only(['name', 'author', 'published_date']);
        $categoryData = $request->categories ?? [];

        try {
            $book = Book::create($bookData);
            $book->categories()->sync($categoryData);

            // return redirect()->route('book.show', [$book]);
            return redirect()->route('book.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }

    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return redirect()->route('book.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function update(Request $request, Book $book)
    {
        $bookData = $request->only(['name', 'author']);
        $categoryData = $request->categories ?? [];

        try {
            $book->update($bookData);
            $book->categories()->sync($categoryData);

            // return redirect()->route('book.show', [$book]);
            return redirect()->route('book.index');

        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }
}
