<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return response()->view('categories.index', [
            'super_category' => $category,
            'categories' => $category->categories,
            'is_super' => false
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return response()->view('categories.create', [
            'super_category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category) //wahrscheinlich supercategory
    {
        $this->validateProject();

        $newCategory = new Category();
        $newCategory->body = request('body');
        $newCategory->path = '2.jpg';
        $newCategory->super_category = $category->id;
        $newCategory->user_id = Auth::id();
        $newCategory->save();

        return response()->view('categories.index', [
            'super_category' => $category,
            'categories' => $category->categories,
            'is_super' => false
        ]);

//        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param Category $super_category
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $super_category, Category $category)
    {
        return response()->view('categories.show', [
            'super_category' => $super_category,
            'category' => $category,
            'questions' => $category->questions
        ]);
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
     * @param Category $super_category
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $super_category, Category $category)
    {
        if(Auth::id()==$category->user->id) {
            try {
                Category::find($category->id)->delete();
            } catch (\Exception $e) {

            }
        }

        return response()->view('categories.index', [
            'super_category' => $super_category,
            'categories' => $super_category->categories,
            'is_super' => false
        ]);
    }

    protected function validateProject() {
        return request()->validate([
            'body' => 'required'
        ]);
    }
}
