<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Support\Str;
use Exception;
use DB;
use Storage;

class BookController extends Controller{

	private $book;

	public function __construct(Book $book, Author $author, Category $category){
		$this->book     = $book;
		$this->author   = $author;
		$this->category = $category;
	}

    public function index(){
    	$pageTitle = "Livros";

    	$books = $this->book->with(['author', 'category'])->get();

    	return View('book.index', compact('pageTitle', 'books'));
    }

    public function create(Request $request){

    	$pageTitle = "Inserir Novo Livro";

    	$authors = $this->author->get();
    	$categories = $this->category->get();

    	if($request->all()){

    		DB::beginTransaction();

            try{

        		$urlFile     = ""; 
        		$urlFileResp = ""; 
        		$title = Str::kebab($request->title);

        		if($request->hasFile('cover') && $request->file('cover')->isValid()){
        			$path = "book/{$title}/cover/" . date('Y/m/');
                    $path = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$path);
                    $extension = $request->cover->extension();
                    $nameFile  = $title . "_" . time() . ".{$extension}";
                    $nameFile = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$nameFile);
                    $request->cover->storeAs($path, $nameFile);
                    $urlFile = $path . $nameFile;
        		}

        		$aBook = [
                    'title' => $request->title,
                    'year_publication' => $request->year_publication,
                    'abstract' => $request->abstract,
                    'authors_id' => $request->authors_id,
                    'categories_id' => $request->categories_id,
                    'cover' => $urlFile
        		];
    		
    			if(!$this->book->create($aBook)){
    				throw new Exception('Não foi possível inserir o livro');
    			}

                $response = [
                    'message' => 'Livro incluído com sucesso',
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

    	return View('book.create', compact('pageTitle', 'response', 'authors', 'categories'));
    }

    public function update($id, Request $request){
        $pageTitle = "Editar Livro";

        $book = $this->book->find($id);

        $authors = $this->author->get();
        $categories = $this->category->get();

        if($request->all()){

            DB::beginTransaction();

            try{

                $urlFile     = ""; 
                $urlFileResp = ""; 
                $title = Str::kebab($request->title);

                if($book->cover != $request->cover){
                    if($request->hasFile('cover') && $request->file('cover')->isValid()){
                        $path = "book/{$title}/cover/" . date('Y/m/');
                        $path = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$path);
                        $extension = $request->cover->extension();
                        $nameFile  = $title . "_" . time() . ".{$extension}";
                        $nameFile = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$nameFile);
                        $request->cover->storeAs($path, $nameFile);
                        $urlFile = $path . $nameFile;
                    }
                }else{
                     $urlFile = $book->cover;
                }

                $aBook = [
                    'title' => $request->title,
                    'year_publication' => $request->year_publication,
                    'abstract' => $request->abstract,
                    'authors_id' => $request->authors_id,
                    'categories_id' => $request->categories_id,
                    'cover' => $urlFile
                ];
            
                if(!$book->update($aBook)){
                    throw new Exception('Não foi possível alterar o livro');
                }

                $response = [
                    'message' => 'Livro alterado com sucesso',
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

        return View('book.update', compact('pageTitle', 'book', 'response', 'authors', 'categories'));
    }

    public function show($id){

        $pageTitle = "Resumo do Livro";

        $book = $this->book->find($id);

        return View('book.show', compact('pageTitle', 'book')); 
    }
}
