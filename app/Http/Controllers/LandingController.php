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

use App\Models\Products;
use App\Models\Users;
use App\Models\Orders;

use Session;

class LandingController extends Controller
{
  public function index()
  {
    $namesessions = Session::get('name');

    $sql = Products::selectRaw('id,name_on_website,price,cost,cost_description,picture_one,picture_two,status,quantity')
    ->where('status','=','ON_SALE')
    ->get();
    return \View::make('landing_page.master_template')
        //->nest('content','landing_page.self_reg.index',array('sql'=>$sql,'reg'=>$reg));
    ->nest('content','landing_page.home',array('sql'=>$sql,'namesessions'=>$namesessions));
  }

  public function checkout()
  {

    $namesessions = Session::get('name');
    $idproduct = Input::get('id_product');
    
    $price = Input::get('price');
    $quantity = Input::get('quantity');
    $total_price = $quantity * $price;

  
    if($namesessions  == "") 
    {
      Session::put('idproduct', $idproduct);  
      Session::put('price', $price);
      Session::put('quantity', $quantity);  
      Session::put('total_price', $total_price);  

      return Redirect::to(\URL::route('login_frontend'));
    }

    else{
   
  


    $sql = DB::table('products')
    ->select('id','name_on_website','price','cost','cost_description','picture_one','picture_two','status','quantity')
    ->where('products.id','=',$idproduct)
    ->first();

    $address = DB::table('users')
    ->select('id','name','address')
    ->where('name','=', $namesessions)
    ->first();

    return \View::make('landing_page.master_template')
        //->nest('content','landing_page.self_reg.index',array('sql'=>$sql,'reg'=>$reg));
    ->nest('content','landing_page.checkout',array('sql'=>$sql,'quantity'=>$quantity,'total_price'=>$total_price,'addressuser' => $address));
  }
  }

  public function checkout_process(){
    $namesessions = Session::get('name');
    $promotion_code = Input::get('promotion_code');
    $idproduct = Input::get('idproduct');
    $totalprice = Input::get('totalprice');
    $quantity = Input::get('quantity');
    $totalpricequantity = $totalprice;

 

    $sqlproduct = DB::table('products')
    ->select('id','name_on_website','price','cost','cost_description','picture_one','picture_two','status','quantity')
    ->where('products.id','=',$idproduct)
    ->first();

    $sqltotal = Orders::selectRaw('count(id) as ttlorder')
    ->first();

    $ttlbooking = $sqltotal->ttlorder;
    $newttlorder = 'ORD-' . sprintf('%06d', intval($ttlbooking) + 1);
    $totalpricenow = 0;
    $discaunt = 0;
    if($promotion_code == "20FORME" && $totalprice > 100)
    {

      $sqlpromotion = DB::table('promotion')
      ->where('code','=',$promotion_code)
      ->first();
      $mytime = date("Y/m/d");
    
      if($sqlpromotion->end_period < $mytime )
      {
        $totalprice1 = $totalprice * 20 / 100;
        $discaunt = $totalprice1;
        $totalpricenow = $totalprice - $totalprice1;
      }

      else
      {
        $totalpricenow = $totalprice;
      }

      
    }

    $sqluser = DB::table('users')
    ->where('name','=',$namesessions)
    ->first();

    $idinventory = DB::table('products')
    ->where('id','=',$idproduct)
    ->first();

    $selectinv = DB::table('inventory')
    ->where('id','=',$idinventory->inventory_id)
    ->first();

    $inventoryonhand = $selectinv->inventory_received - $quantity;
  $grand_total = $totalpricenow;

  $add1        = new Orders;
  $add1->products_id  = $idproduct;
  $add1->users_id = $sqluser->id;
  $add1->order_number = $newttlorder;
  $add1->unit_price  = $sqlproduct->price;
  $add1->quantity = $quantity;
  $add1->total_price = $totalprice;
  $add1->vouchar_code = $promotion_code;
  $add1->discaunt = $discaunt;
  $add1->delivery_to = $sqluser->address;
  $add1->grand_total = $grand_total;
  $add1->status_payment  = "PAID";
  $add1->save();

 

      $updateInventory = DB::table('inventory')
            ->where('id', $idinventory->inventory_id)
            ->update(['inventory_shipped' => $quantity , 'inventory_on_hand' => $inventoryonhand]);

  

  return Redirect::to(\URL::route('summary_checkout',$add1->id));

}


public function summary_checkout($id)
{




    $sql = DB::table('orders')
    ->join('products', 'products.id', '=', 'orders.products_id')
    ->select('orders.*', 'products.name_on_website', 'products.picture_one')
    ->first();

  // $sqlproduct = Products::selectRaw('product.id,name,brand,selling_price,retail_price,quantity,available_quantity,image')
  // ->where('product_code',$sql->product_code)
  // ->first();


  return \View::make('landing_page.master_template')
        //->nest('content','landing_page.self_reg.index',array('sql'=>$sql,'reg'=>$reg));
  ->nest('content','landing_page.summary_checkout',array('sql'=>$sql));
}

public function login_frontend(){
    return \View::make('landing_page.master_template')
        //->nest('content','landing_page.self_reg.index',array('sql'=>$sql,'reg'=>$reg));
  ->nest('content','landing_page.login');
}

 public function login_process_frontend(){  
    $name = Input::get('name');
    $password = Input::get('password');
    
    $sqllogin = DB::table('users')
    ->where('name','=',$name)
    ->Where('password','=',$password)
    ->count();
    
   
    
    if($sqllogin > 0)
    {
         
      
      Session::put('name', $name);
      $quantity = Session::get('quantity');
      $idproduct = Session::get('idproduct');
      $total_price = Session::get('totalprice');


  $sql = DB::table('products')
    ->select('id','name_on_website','price','cost','cost_description','picture_one','picture_two','status','quantity')
    ->where('products.id','=',$idproduct)
    ->first();

    $address = DB::table('users')
    ->select('id','name','address')
    ->where('name','=', $name)
    ->first();


      return \View::make('landing_page.master_template')
        //->nest('content','landing_page.self_reg.index',array('sql'=>$sql,'reg'=>$reg));
      ->nest('content','landing_page.checkout',array('sql'=>$sql,'quantity'=>$quantity,'total_price'=>$total_price,'addressuser' => $address));
    }

    else{
           return redirect()->route('login')
        ->with('error','Your username and Password are wrong or your account is not existed' );
    }
    
  
  }

}

