<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'created_by',
        'category_id'
    ];

    public function quiz_category(){
        return $this->belongsTo(QuizCategory::class);
    }

    public function quiz_questions(){
        return $this->hasMany(QuizQuestion::class);
    }

    public function get_quiz_questions_with_answers(){
        return QuizQuestion::where('quiz_id', $this->id)->with('question_answers');
    }
}
