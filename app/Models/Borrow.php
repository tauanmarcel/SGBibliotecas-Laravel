<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model{
    
    protected $fillable = [];

    public function getDateOfBirthBrAttribute(){
    	return date( 'd/m/Y' , strtotime($this->attributes['birth']));
    }

    public function cliente(){
        return $this->belongsTo('App\Models\Client', 'clients_id');
    }

    public function book(){
        return $this->belongsTo('App\Models\Book', 'books_id');
    }
}
