<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "is_active",
        "time",
        "Passing_Score",
    ];

    public function questions(){
        return $this->belongsToMany(Question::class);
    }
    public function Resulta()
    {
        return $this->hasMany(Resulta::class);
    } 
    


}
