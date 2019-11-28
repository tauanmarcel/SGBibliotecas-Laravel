<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Functions;

class Client extends Model{
    
    protected $fillable = [
    	'name',
    	'email',
    	'birth',
    	'phone',
    	'address',
    	'image_path'
    ];

    public function getAgeAttribute(){
    	return Functions::getAge($this->attributes['birth']);
    }

    public function getDateOfBirthBrAttribute(){
    	return date( 'd/m/Y' , strtotime($this->attributes['birth']));
    }
}
