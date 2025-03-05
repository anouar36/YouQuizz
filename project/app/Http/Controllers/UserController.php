<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Models\Question;

class UserController extends Controller
{
    public function index(Request $request)
    {

         $Quizzs = Quizz::with(['questions' => function ($query) use ($n) {
            $query->skip($n-1)->take(1); 
        }, 'questions.reponses' => function ($query) {
            $query->take(4); 
        }])->where('isActive', true)
          ->first();
            return view('user.dashboard',compact("Quizzs"));        
    }
}
//osidf