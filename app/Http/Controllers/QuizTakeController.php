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
        $score = DB::table('quiz_takes as qt')->where('user_id', $user_id)->where('quiz_id', $quiz_id)
                        ->join('quiz_question_answers as qqa', 'qt.answer_id', 'qqa.id')
                        ->select('qqa.id', 'qqa.answer_weight')
                        ->sum('qqa.answer_weight'); 
        
        $total_points = DB::table('quiz_questions as qq')->where('quiz_id', $quiz_id)
                            ->join('quiz_question_answers as qqa', 'qq.id', 'qqa.quiz_question_id')
                            ->select('qqa.answer_weight')
                            ->sum('qqa.answer_weight');
        return [
            "score" => $score,
            "score_percentage" => $score / $total_points * 100
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
                        'quiz_id' => $request->input(['quiz_id']),
                        'answer_id' => $answer
                    ]);
                }
            }
        }
        else{
            return redirect()->back()->with('status', 'No answers has been selected');
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
        return view('candidate.quiz_take.load', [
            'questions' => $quiz_questions,
            'quiz_id' => $quiz_id,
            'quiz_name' => Quiz::find($quiz_id)->quiz_name,
        ]);
    }
}
