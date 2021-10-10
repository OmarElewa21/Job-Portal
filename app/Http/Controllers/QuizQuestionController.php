<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\QuizQuestionAnswer;
use Exception;
use Illuminate\Support\Facades\View;


class QuizQuestionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $newQuestion = new QuizQuestion();
        $newAnswer = new QuizQuestionAnswer();
        try{
            $newQuestion->fill([
                'quiz_id' => $request->query('id'),
                'question_text' => $request->question_text,
                'question_weight' => $request->question_weight,
                'is_one_choice_answer' => $request->is_true_answer != null ? (count($request->is_true_answer) > 1 ? 0 : 1) : 1,
                'is_optional' => $request->is_optional == 'on' ? 1 : 0
            ])->save();
            
            foreach($request->answer_text as $index=>$value){
                $newAnswer->create([
                    'quiz_question_id' => $newQuestion->id,
                    'answer_text' => $value,
                    'is_true_answer' => $request->is_true_answer != null ? (array_key_exists($index, $request->is_true_answer) ? 1 : 0) : 0
                ])->save();
            }
            return back();
        }
            catch (Exception $e){
                return $this->sendError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit($question_id)
    {
        $question = QuizQuestion::find($question_id);
        $question['answers'] = QuizQuestionAnswer::where('quiz_question_id', $question_id)->get();
        return View::make('quizzes.questions.edit_modal', ['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $question = QuizQuestion::find($request->query('id'));
        QuizQuestionAnswer::where('quiz_question_id', $request->query('id'))->delete();
        try{
            $question->update([
                'question_text' => $request->question_text,
                'question_weight' => $request->question_weight,
                'is_one_choice_answer' => $request->is_true_answer != null ? (count($request->is_true_answer) > 1 ? 0 : 1) : 1,
                'is_optional' => $request->is_optional == 'on' ? 1 : 0
            ]);
            foreach($request->answer_text as $index=>$value){
                QuizQuestionAnswer::create([
                    'quiz_question_id' => $request->query('id'),
                    'answer_text' => $value,
                    'is_true_answer' => $request->is_true_answer != null ? (array_key_exists($index, $request->is_true_answer) ? 1 : 0) : 0
                ])->save();
            }
            return back();
        }
            catch (Exception $e){
                return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        QuizQuestionAnswer::where('quiz_question_id', $id)->delete();
        QuizQuestion::find($id)->delete();
        return 1;
    }
}
