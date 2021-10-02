<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;

class QuizController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ListofQuizzes = DB::table('quizzes')
                        ->join('users', 'quizzes.created_by', '=', 'users.id')
                        ->select('quizzes.*', 'users.email')
                        ->get();
        return view('quizzes.index', [
            'ListOfQuizzes' => $ListofQuizzes
        ]);
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
        $newQuiz = new Quiz();
        try{
            $newQuiz-> fill([
                'quiz_name' => $request->name,
                'quiz_description' => $request->description,
                'created_by' => Auth::id()
            ])->save();
            return back();
        }
            catch (Exception $e){
                return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);
        $listOfQuizQuestion = QuizQuestion::where('quiz_id', $id)->get();
        foreach($listOfQuizQuestion as $question){
            $answers = QuizQuestionAnswer::where('quiz_question_id', $question->id)->get();
            $question['ListOfAnswers'] = $answers;
        }
        return view('quizzes.questions.index', [
            'questionsList' => $listOfQuizQuestion,
            'quiz_name' => $quiz->quiz_name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return $quiz;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $quiz = Quiz::find($id);
        try{
            $quiz-> update([
                'quiz_name' => $request->name,
                'quiz_description' => $request->description,
            ]);
            return 1;
        }
            catch (Exception $e){
                return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz_questions = QuizQuestion::where('quiz_id', $id)->get();
        foreach($quiz_questions as $q){
            QuizQuestionAnswer::where('quiz_question_id', $q->id)->delete();
            $q->delete();
        }
        $quiz = Quiz::find($id);
        $quiz->delete();
        return 1;
    }
}
