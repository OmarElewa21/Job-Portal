<?php

namespace App\Http\Controllers;

use App\Models\QuizTake;
use DB;
use App\Models\QuizAssignedTo;
use App\Models\CandidateQuizScore;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizTakeController extends Controller
{
    /**
     * Helper Function
     * Calculate quiz score
     * @param user_id, quiz_id, quiz_total_score
     * @return score number
     */
    private function calculate_score($user_id, $quiz_id){
        $score = 0;
        $quiz_questions = Quiz::find($quiz_id)->quiz_questions();
        $total_quiz_points = $quiz_questions->where('is_optional', 0)->sum('question_weight');
        $user_answers = DB::table('quizzes as q')->where('q.id', $quiz_id)
                        ->join('quiz_questions as qq', 'q.id', '=', 'qq.quiz_id')
                        ->join('quiz_question_answers as qqa', 'qq.id', '=', 'qqa.quiz_question_id')
                        ->join('quiz_takes as qt', 'qqa.id', '=', 'qt.answer_id')
                        ->select('qt.*', 'qq.*', 'qqa.*')
                        ->where('qt.user_id', $user_id)->get();

        $answer_id_list = [];
        foreach($user_answers as $answer){
            if($answer->is_one_choice_answer == 1){
                if($answer->is_true_answer == 1){
                    $score += $answer->question_weight;
                }
            }

            else{
                if(!array_key_exists(strval($answer->quiz_question_id), $answer_id_list)){
                    $answer_id_list[strval($answer->quiz_question_id)] = 0;
                }

                if($answer->is_true_answer == 1){
                    $answer_id_list[strval($answer->quiz_question_id)] += $answer->question_weight/QuizQuestionAnswer::where('quiz_question_id', $answer->quiz_question_id)->count('quiz_question_id');
                }
                else{
                    if($answer_id_list[strval($answer->quiz_question_id)] > 0){
                        $answer_id_list[strval($answer->quiz_question_id)] -= $answer->question_weight/QuizQuestionAnswer::where('quiz_question_id', $answer->quiz_question_id)->count('quiz_question_id');
                    }
                }
            }
        }
        foreach($answer_id_list as $q_score){
            $score += $q_score;
        }
        
        return [
            "score" => $score,
            "score_percentage" => strval($score / $total_quiz_points * 100) . '%'
        ];
    }

    /**
     * Display a listing pending quizzes.
     *
     * @return list of pending quizzes
     */
    public function show_pending_quizzes(){
        $user_id = Auth::id();
        $quizzes = DB::table('quiz_assigned_tos as qat')->where('user_id', $user_id)
                        ->where('is_pending', 1)
                        ->join('quizzes as q', 'q.id', '=', 'qat.quiz_id')
                        ->select('q.*')->get();
        return view('candidate.quiz_take.index_pending', ['quizzes' => $quizzes, 'sectionName' => 'pending_quizzes']);
    }

    /**
     * Display a listing taken quizzes.
     *
     * @return list of taken quizzes
     */
    public function show_taken_quizzes(){
        $user_id = Auth::id();
        $quizzes = DB::table('quizzes as q')
                        ->join('candidate_quiz_scores as qqs', 'q.id', '=', 'qqs.quiz_id')
                        ->join('quiz_assigned_tos as qat', 'q.id', '=', 'qat.quiz_id')
                        ->select('q.*', 'qqs.*', 'qat.is_pending')
                        ->where('qqs.user_id', $user_id)->where('qat.is_pending', 0)
                        ->get();
        return view('candidate.quiz_take.index_taken', ['quizzes' => $quizzes, 'sectionName' => 'taken_quizzes']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return redirect back
     */
    public function store(Request $request)
    {
        $quizTake = new QuizTake();
        $user_id = Auth::id();
        if($request->question != null){
            foreach($request->question as $answer){
                if(count(QuizTake::where('user_id', $user_id)->where('answer_id', $answer)->get()) == 0){
                    $quizTake-> create([
                        'user_id' => $user_id,
                        'answer_id' => $answer,
                    ]);
                }
            }
        }
        elseif($request->question_multi_answers == null){
            return redirect()->back()->with('status', 'No answers has been selected');
        }

        if($request->question_multi_answers != null){
            foreach($request->question_multi_answers as $answer){
                if(count(QuizTake::where('user_id', $user_id)->where('answer_id', $answer)->get()) == 0){
                    $quizTake-> create([
                        'user_id' => $user_id,
                        'answer_id' => $answer,
                    ]);
                }
            }
        }

        $score = $this->calculate_score($user_id, $request->input(['quiz_id'])+0);
        CandidateQuizScore::create([
            'quiz_id' => $request->input(['quiz_id']),
            'user_id' => $user_id,
            'quiz_grade' => $score['score'],
            'score_percentage' => $score['score_percentage']
        ]);

        QuizAssignedTo::where('user_id', $user_id)->where('quiz_id', $request->input(['quiz_id']))->update(['is_pending' => 0]); 
        return redirect()->route('quizzes.taken');
    }

    /**
     * Display the specified resource.
     *
     * @param  quiz_id
     * @return quiz_take.load view
     */
    public function show($quiz_id)
    {
        $quiz_questions = QuizQuestion::where('quiz_id', $quiz_id)->with('question_answers')->get();
        $total_points = $quiz_questions->where('is_optional', 0)->sum('question_weight');
        return view('candidate.quiz_take.load', [
            'questions' => $quiz_questions,
            'quiz_id' => $quiz_id,
            'quiz_name' => Quiz::find($quiz_id)->quiz_name,
            'total_points' => $total_points,
        ]);
    }
}
