<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultaController extends Controller
{
    public function index (Request $request)
    {
        $user = Auth::user();
        $userId = $user->id; 
        dd($request->all(),$userId ) ;

        $id = $request->input('id');

        if($id!=null){
            $n = $id + 1;
        }else{
            $n = $id === null ? 1  : $id;
        }

        if($n>3){
            return view('user.ruseltat',);
        }

        return  view('user.Ruseltat',compact("Quizzs","n"));
    }
}
