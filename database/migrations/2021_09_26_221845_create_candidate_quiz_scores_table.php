<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateQuizScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_quiz_scores', function (Blueprint $table) {
            $table->foreignId('quiz_id')->constrained('quizzes');
            $table->foreignId('user_id')->constrained('users');
            $table->float('quiz_grade');
            $table->float('score_percentage');
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_quiz_scores');
    }
}
