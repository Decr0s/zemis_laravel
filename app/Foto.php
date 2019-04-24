<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    
    protected $fillable = ['foto', 'legenda', 'id_user'];


    public function user(){
    	return $this->belongsTo(User::class, 'id_user');
    }
}
