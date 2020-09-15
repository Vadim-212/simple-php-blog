<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(User $user)
    {
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
        return view('categories.form');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|string|min:5'
        ]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
