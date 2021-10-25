<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_id',
        'question_text',
        'checkbox'
    ];

    public function question_answers(){
        return $this->hasMany(QuizQuestionAnswer::class);
    }

    public function get_question_answers(){
        return QuizQuestionAnswer::where('quiz_question_id', $this->id)->get();
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
