<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Exception;
use DB;
use Storage;


class CategoryController extends Controller{
	
	private $category;

	public function __construct(Category $category){
		$this->category = $category;
	}

    public function index(){
    	$pageTitle = "Categorias";

    	$categories = $this->category->get();

    	return View('category.index', compact('pageTitle', 'categories'));
    }

    public function create(Request $request){

    	$pageTitle = "Cadastrar Categoria";

    	if($request->all()){
	    	DB::beginTransaction();

	    	try{
	    		if(!$this->category->create($request->all())){
	    			throw new Exception('Não foi possível salvar a categoria');
	    		}

	    		$response = [
	    			'message' => 'Categoria incluída com sucesso',
	    			'error' => false
	    		];

	    		DB::commit();

			}catch(Exception $e){
				DB::rollBack();

				$response = [
	    			'message' => $e->getMessage(),
	    			'error' => true
	    		];
			}
		}

    	return View('category.create', compact('pageTitle', 'response'));
    }

    public function update($id, Request $request){
    	$pageTitle = "Editar Categoria";

    	$category = $this->category->find($id);

    	if($request->all()){
	    	DB::beginTransaction();

	    	try{
	    		if(!$category->update($request->all())){
	    			throw new Exception('Não foi possível salvar a categoria');
	    		}

	    		$response = [
	    			'message' => 'Categoria alterada com sucesso',
	    			'error' => false
	    		];

	    		DB::commit();

			}catch(Exception $e){
				DB::rollBack();

				$response = [
	    			'message' => $e->getMessage(),
	    			'error' => true
	    		];
			}
		}

    	return View('category.update', compact('pageTitle', 'response', 'category'));
    }
}
