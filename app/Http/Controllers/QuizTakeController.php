<?php

namespace App\Http\Controllers;

use App\Models\QuizTake;
use App\Models\QuizAssignedTo;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizTakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $quizList = QuizAssignedTo::where('user_id', $request->input('id'));
        return $quizList;
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
        $request->question == null;
        $quizTake = new QuizTake();
        $user_id = Auth::id();
        if($request->question != null){
            foreach($request->question as $answer){
                $quizTake-> create([
                    'user_id' => $user_id,
                    'answer_id' => $answer,
                ]);
            }
        }
        elseif($request->question_multi_answers == null){
            return redirect()->back()->with('status', 'No answers has been selected');
        }

        if($request->question_multi_answers != null){
            foreach($request->question_multi_answers as $answer){
                $quizTake-> create([
                    'user_id' => $user_id,
                    'answer_id' => $answer,
                ]);
        }
        return back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuizTake  $quizTake
     * @return \Illuminate\Http\Response
     */
    public function show($quiz_id)
    {
        $quiz_questions = QuizQuestion::where('quiz_id', $quiz_id)->with('question_answers')->get();
        $total_points = $quiz_questions->where('is_optional', 0)->sum('question_weight');
        return view('quizzes.quiz_take.load', [
            'questions' => $quiz_questions,
            'quiz_name' => Quiz::find($quiz_id)->quiz_name,
            'total_points' => $total_points,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuizTake  $quizTake
     * @return \Illuminate\Http\Response
     */
    public function edit(QuizTake $quizTake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuizTake  $quizTake
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuizTake $quizTake)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuizTake  $quizTake
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuizTake $quizTake)
    {
        //
    }
}
