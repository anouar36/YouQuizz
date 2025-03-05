<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = [
        'reponse',
        'question_id',
        'isCorrect',
    ];

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    public function solutions()
    {
        return $this->hasMany(Solutions::class);   
    }  

}
