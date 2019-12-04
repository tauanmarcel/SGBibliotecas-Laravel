<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model{
    
    protected $fillable = [
        'books_id',
        'clients_id',
        'status'
    ];

    public function getDateBorrowAttribute(){
    	return date( 'd/m/Y' , strtotime($this->attributes['created_at']));
    }

    public function getDateDevolutionAttribute(){
    	return date('d/m/Y' , strtotime($this->attributes['created_at'] . ' +7 day'));
    }

    public function client(){
        return $this->belongsTo('App\Models\Client', 'clients_id');
    }

    public function book(){
        return $this->belongsTo('App\Models\Book', 'books_id');
    }
}
