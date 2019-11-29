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

    public function create(){

        $pageTitle = "Novo Empréstimo";

        $clients = $this->client->get(); 
        $books = $this->book->get(); 

    	return View('borrow.create', compact('pageTitle', 'clients', 'books'));
    }
}
