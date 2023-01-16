<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('category.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function show(Category $category)
    {
        return view('category.show', [
            'category' => $category
        ]);
    }

    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category
        ]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        try {
            $category = Category::create($data);

            return redirect()->route('category.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()->route('category.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()]);
        }
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        try {
            $category->update($data);

            return redirect()->route('category.index');
        } catch (\Exception $e) {

            return back()->withErrors([$e->getMessage()])->withInput();
        }
    }
}
