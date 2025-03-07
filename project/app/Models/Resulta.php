<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resulta extends Model
{
    use HasFactory;

    protected $table = 'resultas';


    protected $fillable = ['user_id',
                'quizz_id',
                'score'];




    public function user(){
        return belongsTo(User::class);
    }

    public function quizz(){
        return belongsTo(Quizz::class);
    }
}
