<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admincp.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admincp.categories.create');
    }

    public function store(Request $request)
    {

        $categories = new Category;
        $categories->name = $request->name;
        $categories->slug = Str::slug($request->name);
        $categories->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');;
    }

    public function edit(Category $category)
    {
        return view('admincp.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
