<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Resulta;



use Illuminate\Http\Request;

class ResultaController extends Controller
{
    public function index (Request $request)
    {
        $user=Auth::user();
        $userId=$user->id;


       
        $quizzId=DB::table('quizzs')
        ->where('isActive', '=',true )
        ->get();
      
       


        $reponces=DB::table('herstoryes')
        ->where('user_id', '=', $userId)
        ->distinct('reponses_id')
        ->get();
        
        $Score=0;
        
        foreach($reponces as $reponce){
            $reponceDB=DB::table('reponses')->where('id','=',$reponce->reponses_id)->first();

            if($reponceDB->isCorrect===true){
                $Score++;
            }
        }

        $resulta=Resulta::create([
            'user_id' =>$userId,
            'quizz_id'=>$quizzId[0]->id,
            'score'   =>$Score,

        ]);

       
        
        
    

        return  view('user.Ruseltat',compact("Score"));
    }
}
