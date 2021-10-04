<?php

namespace App\Http\Controllers;

use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use App\Models\QuizQuestionAnswer;
use Exception;

class QuizQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
                'is_one_choice_answer' => $request->is_one_choice_answer == 'on' ? 0 : 1,
                'is_optional' => $request->is_optional == 'on' ? 1 : 0
            ])->save();
            
            foreach($request->answer_text as $index=>$value){
                $newAnswer->create([
                    'quiz_question_id' => $newQuestion->id,
                    'answer_text' => $value,
                    'is_true_answer' => array_key_exists($index, $request->is_true_answer) ? 1 : 0
                ])->save();
            }
            return back();
        }
            catch (Exception $e){
                return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizQuestion $quizQuestion)
    {
        //
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
