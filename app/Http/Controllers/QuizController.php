<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use App\Models\QuizAssignedTo;
use App\Models\QuizCategory;
use Illuminate\Support\Facades\View;

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
                        ->join('quiz_categories as qc', 'qc.id', '=', 'quizzes.category_id')
                        ->select('quizzes.*', 'users.email', 'qc.name as category')
                        ->get();
        $categories = DB::table('quiz_categories')->get();
        return view('quizzes.index', [
            'ListOfQuizzes' => $ListofQuizzes,
            'categories'    => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return back or error
     */
    public function store(Request $request)
    {
        if(count(QuizCategory::where('name', $request->category)->get()) == 0){
            QuizCategory::create(['name' => $request->category])->save();
        }
        $category = QuizCategory::where('name', $request->category)->first();
        $newQuiz = new Quiz();
        try{
            $newQuiz->fill([
                'name' => $request->name,
                'description' => $request->description,
                'created_by' => Auth::id(),
                'category_id' => $category->id
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
        $listOfQuizQuestion = QuizQuestion::where('quiz_id', $id)->with('question_answers')->get();
        return view('quizzes.questions.index', [
            'questionsList' => $listOfQuizQuestion,
            'quiz_name' => $quiz->quiz_name,
            'quiz_id' => $quiz->id
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
        $quiz = DB::table('quizzes as q')->where('q.id', $id)
                    ->join('quiz_categories as qc', 'q.category_id', '=', 'qc.id')
                    ->select('q.*', 'qc.name as category_name')->get();

        $categories = QuizCategory::all();
        return View::make('quizzes.edit_modal', ['quiz' => json_decode($quiz, true)[0], 'categories' => $categories]);
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
        if(count(QuizCategory::where('name', $request->category)->get()) == 0){
            QuizCategory::create(['name' => $request->category])->save();
        }
        $category = QuizCategory::where('name', $request->category)->first();

        $quiz = Quiz::find($id);
        try{
            $quiz-> update([
                'name'         => $request->name,
                'description'  => $request->description,
                'category_id'  => $category->id,
            ]);
            return back();
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

    /**
     * return a list of candidates to choose from
     *
     */
    public function assign_quiz_render($quiz_id){
        $candidates = DB::table('users')
                        ->join('candidates', 'candidates.user_id', '=', 'users.id')
                        ->select('users.id', 'users.first_name', 'users.last_name', 'users.email')
                        ->get();
        foreach($candidates as $candidate){
            if(count(QuizAssignedTo::where('quiz_id', $quiz_id)->where('user_id', $candidate->id)->get()) != 0){
                $candidate->checked = 1;
            }
            else{
                $candidate->checked = 0;
            }
        }
        return View::make('quizzes.load_candidates', ['candidates' => $candidates, 'quiz_id' => $quiz_id]);
    }


    /**
     * store the assigned quiz to the assigned candidates
     *
     */
    public function assign_quiz_store(Request $request){
        QuizAssignedTo::where('quiz_id', $request->input('quiz_id'))->delete();
        if($request->list != null){
            foreach($request->list as $key=>$user_id){
                QuizAssignedTo::create([
                    'quiz_id' => intval($request->input('quiz_id')),
                    'user_id' => $key
                ]);
            }
        }
        
        return back();
    }
}
