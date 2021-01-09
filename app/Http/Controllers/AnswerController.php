<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return response()->view('answers.index', [
            'questions' => $category->questions
        ]);
    }
}
