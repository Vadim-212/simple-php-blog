<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(User $user)
    {
        $categories = $user->categories->get();
        $categories = Category::query()
            ->where('user_id', $user->id)
            ->get();

        return view('categories.index', [
            'categories' => $categories,
            'user' => $user
        ]);
    }


    public function create()
    {
        $this->authorize('create', Category::class);
        return view('categories.form');
    }


    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
        $data = $this->validated();
        $data['user_id'] = auth()->id();
        Category::query()->create($data);

        return redirect()->route('categories.index', auth()->user());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }


    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        return view('categories.form', [
            'category' => $category
        ]);
    }


    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);
        $data = $this->validated();
        $category->update($data);
        return redirect()->route('categories.index', auth()->user());
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }

    protected function validated() {
        return request()->validate([
            'name' =>'required|string|min:5'
        ]);
    }
}
