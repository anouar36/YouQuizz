<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Quizz;
use App\Models\Question;



class QuizzController extends Controller
{
    public function index(){
        $Quizzs= Quizz::all();
        $questions = Question::all();

        return view("admin.quizz", compact("Quizzs","questions"));
    }

 

    public function store(Request $request) 
{
    $quizz=request()->validate([
        "quiz_name"=> "required",
        "selected_questions"=> "required",
    ]);
    
   
    $quiz = Quizz::create([
        'name' => $quizz['quiz_name'],
        'is_active' => false,
        'time' => '00:30:00',
        'Passing_Score' => '10',
    ]);

    $quiz->questions()->attach($quizz['selected_questions']);


    return redirect('admin/quizz');
}

    public function Quizz(){
        

        $questions = Question::all();

        return view("admin.quizz", compact("Quizzs","questions"));
    }

    
}
