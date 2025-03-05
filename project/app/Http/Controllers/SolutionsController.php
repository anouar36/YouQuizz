<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolutionsController extends Controller
{
    public function store( Request $request){

        $data = $request->all(); 

        dd($data);  
    }
}