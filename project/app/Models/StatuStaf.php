<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatuStaf extends Model
{
    use HasFactory;

    protected $table =  'statu_stafs' ;
    protected $fillable = ['staf_id','disponibilite','event_date_debut','event_date_fin','jour'];

    public function user(){
        return belongsTo(User::class);
    }

}
