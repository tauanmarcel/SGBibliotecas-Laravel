<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Str;
use App\Functions;
use Exception;
use DB;
use Storage;

class ClientController extends Controller {

	private $client;

	public function __construct(Client $client){
		$this->client = $client;
	}

    public function index(){
    	$pageTitle = "Cliente";

        $clients = $this->client->get();

    	return View('client.index', compact('pageTitle', 'clients'));
    }

    public function create(Request $request){
    	$pageTitle = "Novo Ciente";

    	if($request->all()){

            DB::beginTransaction();

            try{

                $urlFile     = ""; 
                $urlFileResp = ""; 
                $name = Str::kebab($request->name);

                if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
                    $path = "client/{$name}/profile/" . date('Y/m/');
                    $extension = $request->avatar->extension();
                    $nameFile  = $name . "_" . time() . ".{$extension}";
                    $request->avatar->storeAs($path, $nameFile);
                    $urlFile = $path . $nameFile;
                }

                $address  = $request->street . ", ";
				$address .= $request->number . ", ";
				$address .= $request->neighborhood . ", ";
				$address .= $request->city . ", ";
				$address .= $request->state;

                $date = Functions::formateDate($request->birth);

                $client = [
                    'name' => $request->name,
                	'email' => $request->email,
                	'birth' => $date,
                	'phone' => $request->phone,
                	'address' => $address,	
                    'image_path' => $urlFile
                ];

    			if(!$this->client->create($client)){
    				throw new Exception('Não foi possível inserir o cliente');
    			}

                $response = [
                    'message' => 'Cliente incluído com sucesso',
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

    	return View('client.create', compact('pageTitle', 'response'));
    }

    public function update($id, Request $request){
        $pageTitle = "Editar Ciente";

        $client = $this->client->find($id);
        $address =  explode(", ", $client->address);
        
        if($request->all()){

            DB::beginTransaction();

            try{

                $urlFile     = ""; 
                $urlFileResp = ""; 
                $name = Str::kebab($request->name);

                if(!is_null($request->avatar)){
                    if($request->hasFile('avatar') && $request->file('avatar')->isValid()){
                        $path = "client/{$name}/profile/" . date('Y/m/');
                        $extension = $request->avatar->extension();
                        $nameFile  = $name . "_" . time() . ".{$extension}";
                        $request->avatar->storeAs($path, $nameFile);
                        $urlFile = $path . $nameFile;
                    }
                }else{
                    $urlFile = $client->image_path;
                }

                $addAddress  = $request->street . ", ";
                $addAddress .= $request->number . ", ";
                $addAddress .= $request->neighborhood . ", ";
                $addAddress .= $request->city . ", ";
                $addAddress .= $request->state;

                $date = Functions::formateDate($request->birth);

                $aClient = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'birth' => $date,
                    'phone' => $request->phone,
                    'address' => $addAddress,  
                    'image_path' => $urlFile
                ];

                if(!$client->update($aClient)){
                    throw new Exception('Não foi possível atualizar o cliente');
                }

                $response = [
                    'message' => 'Cliente atualizado com sucesso',
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

        return View('client.update', compact('pageTitle', 'client', 'response', 'address'));
    }

    public function show($id){

        $pageTitle = "Perfil do Cliente";

        $client = $this->client->find($id);

        return View('client.show', compact('pageTitle' ,'client'));
    }
}
