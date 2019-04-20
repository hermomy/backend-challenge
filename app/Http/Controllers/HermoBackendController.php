<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Get;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

 use App\Models\Users;
// use App\Models\Brand;
// use App\Models\OrderDetails;

class HermoBackendController extends Controller
{
  public function index()
  {

   
    return \View::make('master_template')
    ->nest('content','login');
  }

  public function login_process(){  
  	$name = Input::get('name');
  	$password = Input::get('password');
  	


    $sqllogin = DB::table('users')
    ->where('name','=',$name)
    ->Where('password','=',$password)
    ->first();
    
    if(!empty($sqllogin->name))
    {

    }

    else{
           return redirect()->route('login')
        ->with('error','Your username and Password are wrong or your account is not existed');
    }
  	
  
  }


}

