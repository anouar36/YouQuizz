<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "Difficulty",
        "isActive",
    ] ;

    public function question(){

        return $this->hasOne(Question::class);
    }
}
