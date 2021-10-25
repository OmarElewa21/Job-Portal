<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizQuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_question_id',
        'answer_text',
        'answer_weight'
    ];

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
