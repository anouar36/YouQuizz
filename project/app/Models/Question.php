<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'quizz_id',
        'Difficulty',
        'type_id',
    ];

    

public function reponses()
{
    return $this->hasMany(Reponse::class);
}

public function type()
{
    return $this->belongsTo(QuestionType::class);
}

public function quizz()
{
    return $this->hasMany(quizz::class);
}

public function herstory()
{
    return $this->hasMany(Solutions::class);
}  


}
