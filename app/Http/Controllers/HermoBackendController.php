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

// use App\Models\Product;
// use App\Models\Brand;
// use App\Models\OrderDetails;

class HermoBackendController extends Controller
{
  public function index()
  {

    // $sql = Product::selectRaw('product.id,name,brand,selling_price,retail_price,quantity,available_quantity,image,brand.name_brand')
    // ->join('brand','brand.id','=','product.brand')
    // ->get();
    return \View::make('master_template')
    ->nest('content','login');
  }

//   public function checkout()
//   {

//     $idproduct = Input::get('id_product');
//     $sellingprice = Input::get('selling_price');
//     $quantity = Input::get('quantity');
//     $total_price = $quantity * $sellingprice;
//     $sql = Product::selectRaw('product.id,name,brand,selling_price,retail_price,quantity,available_quantity,image,brand.name_brand,product_code')
//     ->join('brand','brand.id','=','product.brand')
//     ->where('product.id',$idproduct)
//     ->first();


//     return \View::make('landing_page.master_template')
//         //->nest('content','landing_page.self_reg.index',array('sql'=>$sql,'reg'=>$reg));
//     ->nest('content','landing_page.checkout',array('sql'=>$sql,'quantity'=>$quantity,'total_price'=>$total_price));
//   }

//   public function checkout_process(){



//     $country = Input::get('country');
//     $promotion_code = Input::get('promotion_code');
//     $idproduct = Input::get('idproduct');
//     $totalprice = Input::get('totalprice');

//     $quantity = Input::get('quantity');

//     $totalpricequantity = $totalprice;

//     $product_code = Input::get('productcode');

//     $sqlproduct = Product::selectRaw('product.id,name,brand,selling_price,retail_price,quantity,available_quantity,image,brand.name_brand')
//     ->join('brand','brand.id','=','product.brand')
//     ->where('product.id',$idproduct)
//     ->first();


//     $sqltotal = OrderDetails::selectRaw('count(id) as ttlorder')
//     ->whereNull('deleted_at')
//     ->first();

//     $ttlbooking = $sqltotal->ttlorder;
//     $newttlorder = 'ORD-' . sprintf('%06d', intval($ttlbooking) + 1);

//     if($promotion_code == "OFF5PC" && $quantity > 1)
//     {
//       $totalprice1 = $totalprice * 5 / 100;
//       $discaunt = $totalprice1;
//       $totalpricenow = $totalprice - $totalprice1;
//     }

//     elseif($promotion_code == "GIVEME15" && $totalprice > 99){

//       $totalprice1 = $totalprice - 15;
//       $discaunt = 15;
//       $totalpricenow = $totalprice1;
//     }

//     else{
//       $discaunt = 0;
//      $totalprice1 = 0;
//      $totalpricenow = $totalprice - $totalprice1;
//    }


//    if($country == "Malaysia"){
//     if($totalprice > 150 || $quantity > 1)
//     {
//       $shiping_fee = 0;
//     }
//     else{
//       $shiping_fee = 10;
//     }
//   }


//   if($country == "Singapore")
//   {
//     if($totalprice > 300){
//       $shiping_fee = 0;
//     }
//     else{
//       $shiping_fee = 20;
//     }
//   }

//   if($country == "Brunei")
//   {
//     if($totalprice > 300){
//       $shiping_fee = 0;
//     }
//     else{
//       $shiping_fee = 25;
//     }
//   }

//   $grand_total = $totalpricenow + $shiping_fee;

//   $add1        = new OrderDetails;
//   $add1->name  = $sqlproduct->name;
//   $add1->order_number = $newttlorder;
//   $add1->unit_price  = $sqlproduct->selling_price;
//   $add1->quantity = $quantity;
//   $add1->total_price = $totalprice;
//   $add1->promotion_code = $promotion_code;
//   $add1->discaunt = $discaunt;
//   $add1->delivery_to = $country;
//   $add1->shiping_fee = $shiping_fee;
//   $add1->grand_total = $grand_total;
//   $add1->product_code = $product_code;
//   $add1->save();

  

//   return Redirect::to(\URL::route('summary_checkout',$add1->id));

// }


// public function summary_checkout($id)
// {

//   $sql = OrderDetails::where('id',$id)
//   ->first();

//   $sqlproduct = Product::selectRaw('product.id,name,brand,selling_price,retail_price,quantity,available_quantity,image')
//   ->where('product_code',$sql->product_code)
//   ->first();

//   $sqlbrand = Brand::where('id',$sqlproduct->brand)
//   ->first();

//   return \View::make('landing_page.master_template')
//         //->nest('content','landing_page.self_reg.index',array('sql'=>$sql,'reg'=>$reg));
//   ->nest('content','landing_page.summary_checkout',array('sql'=>$sql,'sqlbrand'=>$sqlbrand,'sqlproduct'=>$sqlproduct));
// }

}

