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
		return $this->belongsTo('App\Models\Author', 'authors_id');
	}

	public function category(){
		return $this->belongsTo('App\Models\Category', 'categories_id');
	}
}
