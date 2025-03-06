<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Herstory;
use App\models\Quizz;

use Illuminate\Support\Facades\Auth;

class HerstoryController extends Controller
{
    public function create(Request $request){

        
        $user = Auth::user();  
        $userId = $user->id;
        

        $herstory = Herstory::create([
            "user_id"     => $userId ,
            "question_id" => $request->input('ques'),
            "reponses_id" => $request->input('rep'),
            
        ]);
       $respence =$this->getQuestionHerstory($userId);
       $Quizzs =$this->antherQuestion($respence);
       
       if($Quizzs === true){
        return redirect()->route('user.ruseltat');
       }
       return view('user.dashboard',compact("Quizzs"));
    }

    public function getQuestionHerstory($userId){

        $questionId  = Herstory::pluck('question_id'); 
        return  $questionId ;

    }

    public function antherQuestion($QestionEvete){
        
        $excludeQuestionIds = $QestionEvete->unique()->toArray();

        $Quizzs = Quizz::with(['questions' => function ($query) use ($excludeQuestionIds) {
            $query->whereNotIn('question_id', $excludeQuestionIds)
                  ->inRandomOrder()
                  ->take(1);  
        }, 'questions.reponses'])
        ->where('isActive', true)
        ->first();
       
        if(empty($Quizzs->questions->toArray())){

         return true;   
        }

        return $Quizzs;        

    
    


    }
    
}
