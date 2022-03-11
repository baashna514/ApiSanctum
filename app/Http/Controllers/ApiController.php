<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    function getCustomers(){
        return Customer::all();
    }

    function addCustomer(Request $request){
        $cust = new Customer();
        $cust->name = $request->name;
        $cust->phone = $request->phone;
        $result = $cust->save();
        if($result){
            return ['result' => 'Data has been saved.'];
        }
        else{
            return ['result' => 'Operation failed.'];
        }
    }

    function checkLoginCredentials(Request $request){
        $user= User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
}
