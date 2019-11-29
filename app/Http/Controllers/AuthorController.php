<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Str;
use Exception;
use DB;
use Storage;

class AuthorController extends Controller {

	private $author;

	public function __construct(Author $author){
		$this->author = $author;
	}

    public function index(){
    	$pageTitle = "Autores";

    	$authors = $this->author->get();

    	return View('author.index', compact('pageTitle', 'authors'));
    }

    public function create(Request $request){

    	$pageTitle = "Inserir Novo Autor";

        if($request->all()){

            DB::beginTransaction();

            try{

                $urlFile     = ""; 
                $urlFileResp = ""; 
                $name = Str::kebab($request->name);

                if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
                    $path = "author/{$name}/profile/" . date('Y/m/');
                    $extension = $request->avatar->extension();
                    $nameFile  = $name . "_" . time() . ".{$extension}";
                    $request->avatar->storeAs($path, $nameFile);
                    $urlFile = $path . $nameFile;
                }

                $author = [
                    'name' => $request->name,
                    'profile_description' => $request->profile_description,
                    'image_path' => $urlFile
                ];
    		
    			if(!$this->author->create($author)){
    				throw new Exception('Não foi possível inserir o autor');
    			}

                $response = [
                    'message' => 'Autor incluído com sucesso',
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

    	return View('author.create', compact('pageTitle', 'response'));
    }

    public function update($id, Request $request){
    	$pageTitle = "Editar Autor";

    	$author = $this->author->find($id);

    	if($request->all()){

	    	DB::beginTransaction();

    		$urlFile     = ""; 
    		$urlFileResp = ""; 
    		$name = Str::kebab($request->name);

            if(!is_null($request->avatar)){
        		if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
        			$path = "author/{$name}/profile/" . date('Y/m/');
        			$extension = $request->avatar->extension();
        			$nameFile  = $name . "_" . time() . ".{$extension}";
       			    $request->avatar->storeAs($path, $nameFile);
                    $urlFile = $path . $nameFile;
        		}
            }else{
                $urlFile = $author->image_path;
            }

    		$authorUp = [
    			'name' => $request->name,
                'profile_description' => $request->profile_description,
    			'image_path' => $urlFile
    		];

    		try{
    			if(!$author->update($authorUp)){
    				throw new Exception('Não foi possível editar o autor');
    			}

                $response = [
                    'message' => 'Autor alterado com sucesso',
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

    	return View('author.update', compact('pageTitle', 'author', 'response'));
    }

    public function show($id){
        $pageTitle = "Perfil do Autor";

        $author = $this->author->find($id);

        return View('author.show', compact('pageTitle', 'author')); 
    }
}
