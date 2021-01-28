<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function trueAnswer()
    {
        return $this->answers()->where('is_true', true)->first();
    }

    public function isTrue($answer_id)
    {
        return $answer_id == $this->trueAnswer()->id;
    }

    public function getAnswer($answer_id)
    {
        return ($answer_id == null) ? -1 : $this->answers()->where('id', $answer_id)->first();
    }
}
