<?php

namespace App\Http\Controllers;

use App\Models\QuestionType;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Reponse;



class QuestionController extends Controller
{
    public function index(){

        $questions = Question::with('reponses')->get();
    
        $types = QuestionType::all();

        return view("admin.question",compact("questions","types","questions"));
    }


    public function store( Request $request){
    
        $request_qestion=request()->validate([
            "questionText"=> "required",
            "questionType" => "required" ,
            "difficulty" => "required",
            "answers" => "required",
            "correctAnswer"=> "required"
        ]);   
        $question = Question::create([
            "question"   => $request_qestion["questionText"],
            "Difficulty" => $request_qestion["difficulty"],
            "type_id"    => $request_qestion["questionType"],
            "quizz_id"   => 13,
        ]);
        $options = [];
        foreach( $request_qestion["answers"] as $key => $answer){
            $isCorrect = false;
            if($key == (int) $request_qestion["correctAnswer"]){
                $isCorrect = true;    
            }
            $options[] = $question->reponses()->create([
                'reponse' => $answer,
                'isCorrect' => $isCorrect,
            ]);
        }
        return redirect("/question/index")->with('success', 'Add question is successful');
    }


   
    
}
