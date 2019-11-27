<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model{

	protected $fillable = [
		'title',
		'year_publication',
		'abstract',
		'authors_id',
		'categories_id',
		'cover'
	];

	public function author(){
		return $this->hasOne('App\Models\Author', 'id');
	}

	public function category(){
		return $this->hasOne('App\Models\Category', 'id');
	}
}
