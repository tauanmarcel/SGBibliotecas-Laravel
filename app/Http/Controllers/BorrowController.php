<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Client;
use App\Models\Book;
use Exception;
use DB;

class BorrowController extends Controller {

    private $borrow;
    private $relationships = [
        'book',
        'client'
    ];

    public function __construct(Borrow $borrow, Client $client, Book $book){
        $this->borrow = $borrow;
        $this->client = $client;
        $this->book = $book;
    } 

    public function index(){

        $pageTitle = "Empréstimos";

        $borrows = $this->borrow->with($this->relationships)->get();

    	return View('borrow.index', compact('pageTitle', 'borrows'));
    }

    public function create(Request $request){

        $pageTitle = "Novo Empréstimo";

        $clients = $this->client->get(); 
        $books = $this->book->get();

        if($request->all()){
            DB::beginTransaction();

            
            try{
                if(!$this->borrow->create($request->all())){
                    throw new Exception('Não foi possível salvar o novo empréstimo');
                }
                
                $response = [
                    'message' => 'Empréstimo realizado com sucesso!',
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

    	return View('borrow.create', compact('pageTitle', 'clients', 'books', 'response'));
    }

    public function  update($id, Request $request){
        $pageTitle = "Editar Empréstimo";

        $borrow = $this->borrow->with($this->relationships)->find($id);

        if($request->all()){
            DB::beginTransaction();
            
            try{
                if(!$borrow->status){
                    throw new Exception('O livro não pode ser reemprestado. Faça um novo empréstimo.');
                }

                if(!$borrow->update(['status' => $request->status])){
                    throw new Exception('Não foi possível salvar o novo empréstimo');
                }
                
                $response = [
                    'message' => 'Empréstimo alterado com sucesso!',
	    			'error' => false
                ];
                
                DB::commit();
                $borrow = $this->borrow->with($this->relationships)->find($id);
                
            }catch(Exception $e){
                DB::rollBack();
                
				$response = [
	    			'message' => $e->getMessage(),
	    			'error' => true
	    		];
            }
        }

    	return View('borrow.update', compact('pageTitle', 'response', 'borrow'));
    }
}
