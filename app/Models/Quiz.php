<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'quiz_name',
        'quiz_description',
        'created_by'
    ];

    public function quiz_questions(){
        return $this->hasMany(QuizQuestion::class);
    }
}
