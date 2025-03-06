<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Models\Question;

class UserController extends Controller
{
    public function index()
    {

        $Quizzs = Quizz::with(['questions' => function ($query) {
            $query->inRandomOrder()->take(1); 
        }, 'questions.reponses'])
        ->where('isActive', true)
        ->first();

        return view('user.dashboard',compact("Quizzs"));        
    }

  
}
