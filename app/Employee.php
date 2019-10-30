<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    //
    public function getEmployee($id){

     	$user  = DB::table('employees')->where('employee_id', $id)->first();
     	return $user;
    }

    public function insertEmployee($data){

    	DB::table('employees')->insert([
									    ['employee_id' => $data['id'],
									     'date_of_birth' => $data['date_of_birth'],
									     'image' => $data['image'],
									     'email' => $data['email'],
									     'first_name' => $data['first_name'],
									     'last_name' => $data['last_name'],
										 'title' => $data['title'],
										 'address' => $data['address'],
										 'country' =>$data['country'], 
										 'bio' => $data['bio'],
										 'rating'=>$data['rating'] ]
									   
									  ]);
    }

    public function getemployees(){
    	
    	$employees = DB::table('employees')->get();
    	return  $employees;
    }
 
     

}
