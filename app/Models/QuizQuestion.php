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
        'question_weight',
        'is_one_choice_answer',
        'is_optional'
    ];

    public function question_answers(){
        return $this->hasMany(QuizQuestionAnswer::class);
    }
}
