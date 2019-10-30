<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Employee;


class EmployeesController extends Controller
{
    //
    public function index(){

	$client  = new Client();

    $url     = "http://technical_test.client.cosmicdevelopment.com/api/token/";

    $request = $client->post($url,  ['body'=> json_encode([
											                "grant_type"    => "password",
											                "client_id"     => "6779ef20e75817b79601",
											                "client_secret" => "3e0f85f44b9ffbc87e90acf40d482601",
											                "username"      => "hiring",
											                "password"      => "cosmicdev"
											            ])]);
 
  
    $contents     = $request->getBody()->getContents();

    $access_token = json_decode($contents)->data->access_token;

	$response     = $client->request(
									 'GET', 'http://technical_test.client.cosmicdevelopment.com/api/employee/list/',
									 [
									 	'headers' =>["Access-Token"=> $access_token] 
								     ]);
    $contents      = $response->getBody()->getContents();
    
    $employees = json_decode($contents)->data;
	
	$employee =  new Employee();
    
    
     foreach ($employees as $users) {
    	$test=$employee->getEmployee($users->id);
    	
    	if(is_null($test)){
	 	
	 		$employee->insertEmployee((array) $users);
    	
    	}
     }
 	
 	$data['users'] = $employee->getemployees();

	return view('home',$data);
    }
}
