<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function super_category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'super_category');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function countTrue($answers)
    {
        $questions = $this->questions()->get();
        $countTrue = 0;

        foreach ($questions as $question) {
            if(array_key_exists($question->id, $answers)) {
                $answer = Answer::where('id', $answers[$question->id])->first();
                $countTrue+= ($question->isTrue($answer->id) ? 1 : 0);
            }
        }

        return $countTrue;
    }
}
