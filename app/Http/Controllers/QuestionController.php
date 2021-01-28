<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    /**
     * Display the review of the questions
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return response()->view('questions.index', [
            'category' => $category,
            'questions' => $category->questions
        ]);
    }

    public function create(Category $super_category, Category $category)
    {
        return response()->view('questions.create', [
            'super_category' => $super_category,
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Category $super_category
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $super_category, Category $category)
    {
        $this->validateQuestion();

        $newQuestion = new Question();
        $newQuestion->body = request('question');
        $newQuestion->category_id = $category->id;
        $newQuestion->save();

        for($i = 1; $i < 5; $i++) {
            $newAnswer = new Answer();
            $newAnswer->body = request("answer{$i}");
            $newAnswer->is_true = $i == request('right');
            $newAnswer->question_id = $newQuestion->id;
            $newAnswer->save();
        }


        return response()->view('categories.show', [
            'super_category' => $super_category,
            'category' => $category,
            'questions' => $category->questions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $super_category
     * @param Category $category
     * @param \App\Models\Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $super_category, Category $category, Question $question)
    {
        if(Auth::id()==$category->user->id) {
            try {
                Question::find($question->id)->delete();
            } catch (\Exception $e) {}
        }

        return response()->view('categories.show', [
            'super_category' => $super_category,
            'category' => $category,
            'questions' => $category->questions
        ]);
    }

    protected function validateQuestion() {
        return request()->validate([
            'question' => 'required',
            'answer1'  => 'required',
            'answer2'  => 'required',
            'answer3'  => 'required',
            'answer4'  => 'required',
            'right'    => 'required'
        ]);
    }
}
