<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizTake extends Model
{
    use HasFactory;
    protected $primaryKey = 'answer_id';

    protected $fillable = [
        'user_id',
        'answer_id',
    ];

    public function answer(){
        $this->belongsTo(QuizQuestionAnswer::class);
    }
}
