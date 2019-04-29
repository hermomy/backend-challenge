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
use Session;

 use App\Models\Users;
 use App\Models\PurchaseOrder;
 use App\Models\Items;
 use App\Models\Inventory;
 use App\Models\Products;
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
    ->count();
    
   
    
    if($sqllogin > 0)
    {
         
        // return \View::make('master_template')
        // ->nest('content','mainpage');

      Session::put('name', $name);

      return Redirect::to(\URL::route('mainpage'));
    }

    else{
           return redirect()->route('login')
        ->with('error','Your username and Password are wrong or your account is not existed' );
    }
  	
  
  }

  public function mainpage(){


    $namesessions = Session::get('name');
   if (Session::has('name'))
   {  

      return \View::make('master_template')
      ->nest('content','mainpage',array('namesessions' => $namesessions));
   }
   else
   {
      return Redirect::to(\URL::route('login'));
   }
    
  }

  public function list_purchase_order(){

    $mytime = date("Y-m-d");
    $countPO = DB::table('purchaseorders')->count();
    $totalCountPO = 0;
    if($countPO == 0)
    {
      $totalCountPO = 1;
    }
    $mytimeremove = date("Ymd");
    $po_number = "PO".$mytimeremove.$totalCountPO;
    $countPO = DB::table('purchaseorders')->count();
    $namesessions = Session::get('name');
    $requestor = DB::table('requestor')->select('id', 'name')->get();
    $vendor = DB::table('vendor')->select('id', 'name')->get();$requestor = DB::table('requestor')->select('id', 'name')->get();
    $credictterms =  DB::table('terms')->select('id', 'name')->get();
    $listpurchaseorders = DB::table('purchaseorders')
    ->join('requestor', 'requestor.id', '=', 'purchaseorders.requestor_id')
    ->join('vendor', 'vendor.id', '=', 'purchaseorders.vendor_id')
    ->select('purchaseorders.*', 'requestor.name as requestorname', 'vendor.name as vendorname')
    ->get();
       return \View::make('master_template')
      ->nest('content','list_purchase_order',array('namesessions' => $namesessions,'datetoday' => $mytime , 'ponumber' => $po_number ,'requestor' => $requestor , 'vendor' => $vendor , 'terms' => $credictterms , 'listpurchaseorders' => $listpurchaseorders));
      
  }

  public function add_purchase_order (){

    $po         = new PurchaseOrder;
    $po->po_number = Input::get('po_number');
    $po->requestor_id = Input::get('requestor');
    $po->vendor_id = Input::get('vendor');
    $po->po_date = Input::get('po_date');
    $po->order_date = Input::get('order_date');
    $po->receive_date = Input::get('receive_date');
    $po->cost = Input::get('cost');
    $po->status_fufilment = "unpaid";
    $po->credict_terms = Input::get('terms');
    $po->po_description = Input::get('po_description');
    $po->comments = Input::get('comments');
    $po->status = "new";
    $po->save();


    return redirect()->route('list_purchase_order')
    ->with('success','Purchase Order Has Been Create Sucessfully');


  }

  
  public function edit_purchase_order($po_number){

     $namesessions = Session::get('name');
     $sqlPO = DB::table('purchaseorders')
    ->join('requestor', 'requestor.id', '=', 'purchaseorders.requestor_id')
    ->join('vendor', 'vendor.id', '=', 'purchaseorders.vendor_id')
    ->select('purchaseorders.*', 'requestor.name as requestorname', 'vendor.name as vendorname')
    ->where('purchaseorders.po_number' , $po_number)
    ->first();

    $sqlstockitems = DB::table('stock_items')
    ->select('id', 'name')
    ->get();

    $listItemsLine= DB::table('items')
    ->join('stock_items', 'stock_items.id', '=', 'items.stock_items_id')
    ->select('items.*', 'stock_items.id as stockitemsid' , 'stock_items.name' , 'stock_items.skus' , 'stock_items.price')
    ->get();






     return \View::make('master_template')
       ->nest('content','edit_purchase_order',array('namesessions' => $namesessions , 'PODetails' => $sqlPO , 'stockitems' => $sqlstockitems ,'listItemsLine' => $listItemsLine)); 
  }


  public function add_lineItems(){

    $po_id = Input::get('poid');
    $quantity = Input::get('quantity');
    $id = Input::get('items_id');
   
    $priceperunit = DB::table('stock_items')
    ->select('price')
    ->where('id',$id)
    ->first();

    $costitemsperunit = $priceperunit->price;
    $cost = $costitemsperunit * $quantity;
    $po_number= DB::table('purchaseorders')
    ->select('po_number')
    ->where('id', $po_id)
    ->first();

    $items         = new Items;
    $items->stock_items_id = Input::get('items_id');
    $items->quantity = Input::get('quantity');
    $items->cost = $cost;
    $items->purchaseorder_id = Input::get('poid');

    $items->save();

    $Sumcost = DB::table('items')
    ->where('purchaseorder_id', $po_id)
    ->sum('cost');

    $updatecost = DB::table('purchaseorders')
            ->where('id', $po_id)
            ->update(['cost' => $Sumcost]);


     return redirect()->route('edit_purchase_order',$po_number->po_number)
     ->with('success','Items Line Has Been Create Sucessfully');

  }


  public function update_purchase_order(){

    $statusfufilment = Input::get('status_fufilment');
    $receivedate = Input::get('receive_date');
    $po_id = Input::get('poidupdatepo');

     $po_number= DB::table('purchaseorders')
    ->select('po_number')
    ->where('id', $po_id)
    ->first();

     $updatecost = DB::table('purchaseorders')
            ->where('id', $po_id)
            ->update(['status_fufilment' => $statusfufilment , 'receive_Date' => $receivedate]);


     return redirect()->route('edit_purchase_order',$po_number->po_number)
     ->with('success','Purchase order Has Been Update Sucessfully');
  }

  public function update_quantity_items(){

    $po_id = Input::get('idpo');
    $iditem = Input::get('iditem');
    $itemname = Input::get('itemname');
    $quantity_received = Input::get('quantity_received');

    $po_number = DB::table('purchaseorders')
    ->select('po_number')
    ->where('id', $po_id)
    ->first();

     $updatecost = DB::table('items')
     ->where('id', $iditem)
     ->update(['quantity_received' => $quantity_received ]);

     return redirect()->route('edit_purchase_order',$po_number->po_number)
      ->with('success','Quantity Receive has been Update Sucessfully');

  }

  public function list_items(){

  $namesessions = Session::get('name');
   
      

    $sqlListItems = DB::table('items')
    ->join('stock_items', 'stock_items.id', '=', 'items.stock_items_id')
    ->join('purchaseorders','purchaseorders.id','=','items.purchaseorder_id')
    ->select('items.*', 'stock_items.name', 'stock_items.description','stock_items.category','stock_items.price','stock_items.skus','purchaseorders.po_number')
    ->get();
    
     return \View::make('master_template')
      ->nest('content','list_items',array('ListItems' => $sqlListItems , 'namesessions' => $namesessions));
  }

  public function add_register_locationtagging(){

    $iditem = Input::get('items_id');
    $statusinventory = "Register Inventory";
    $inventory         = new Inventory;
    $inventory->stock_items_id = Input::get('stock_items_id');
    $inventory->category = Input::get('category');
    $inventory->inventory_received = Input::get('inventory_received');
    $inventory->items_id = Input::get('items_id');
    $inventory->location_tagging = Input::get('location_tagging'); 
    $inventory->starting_inventory = 0;
    $inventory->save();

    $updateItemsStatus = DB::table('items')
     ->where('id', $iditem)
     ->update(['status_inventory' => $statusinventory ]);

    return redirect()->route('list_items')
    ->with('success','Your Item Already Register');
   

  }

  public function list_inventory(){


     $namesessions = Session::get('name');
     $status_inventory = "Register Inventory";
     $sqlinventory = DB::table('inventory')
    ->join('stock_items', 'stock_items.id', '=', 'inventory.stock_items_id')
    ->join('items','items.id','=','inventory.items_id')
    ->select('inventory.*', 'stock_items.name', 'stock_items.description' , 'stock_items.category','stock_items.price','stock_items.skus')
    ->where('items.status_inventory' , $status_inventory)
    ->get();

       return \View::make('master_template')
      ->nest('content','list_inventory',array('listinventory' => $sqlinventory,'namesessions' => $namesessions));
  }

  public function add_products(){


    $statusproduct = "Register Product";
    $inventory_id = Input::get('inventory_id');
    $products         = new Products;

    $image = Input::file('picture_one');
    $image1 = Input::file('picture_two');
    $name = str_slug(Input::get('name_on_website')).'_one.'.$image->getClientOriginalExtension();
    $name1 = str_slug(Input::get('name_on_website')).'_two.'.$image1->getClientOriginalExtension();
    $destinationPath = public_path('/uploads/products');
    $imagePath = $destinationPath. "/".  $name;
    $imagePath1 = $destinationPath. "/".  $name1;
    $image->move($destinationPath, $name);
    $image1->move($destinationPath, $name1);
    $products->picture_one = $name;
    $products->picture_two = $name1;
    $products->name_on_website = Input::get('name_on_website');
    $products->price = Input::get('price');
    $products->cost = Input::get('cost');
    $products->quantity = Input::get('quantity');
    $products->cost = Input::get('cost');
    $products->status = Input::get('status');
    $products->cost_description = Input::get('cost_description');
    $products->inventory_id = $inventory_id;

    $products->save();

     $updatestatusproduct = DB::table('inventory')
     ->where('id', $inventory_id)
     ->update(['status_product' => $statusproduct ]);

    return redirect()->route('list_inventory')
    ->with('success','Your Inventory has been register to Products,Please check in menu products');

  }

  public function list_products(){
    
  }

  public function logout_backend(){
      Session::flush();
      return redirect('/');
  }

  public function report_daily_sales(){

     $namesessions = Session::get('name');
     $status_inventory = "Register Inventory";

     

     $reportdailysales = DB::table('orders as w')
                ->select(array(DB::Raw('sum(w.grand_total) as totalgrandtotal'),DB::Raw('DATE(w.created_at) day')))
                ->groupBy('day')
                ->orderBy('w.created_at')
                ->get();


       return \View::make('master_template')
      ->nest('content','report_daily_sales',array('reportdailysales' => $reportdailysales,'namesessions' => $namesessions));
  }
  public function report_cost_incurred (){

     $namesessions = Session::get('name');
     $status_inventory = "Register Inventory";

     
    $reportcostincurred = DB::table('products as w')
                ->select(array(DB::Raw('sum(w.cost) as cost'),DB::Raw('WEEK(w.created_at) as week')))
                ->groupBy('week')
                ->orderBy('w.created_at')
                ->get();
    // $reportcostincurred = DB::select(DB::raw('SELECT created_at, SUM(cost) AS cost FROM products GROUP BY week(created_at)'));


       return \View::make('master_template')
      ->nest('content','report_cost_incurred',array('reportcostincurred' => $reportcostincurred,'namesessions' => $namesessions)); 
  }


  public function report_total_unpaid_paid_orders(){

     $namesessions = Session::get('name');
     $status_paid = "paid";
     $status_unpaid = "unpaid";

     
    $reportpaid = DB::table('purchaseorders as w')
                ->select(array(DB::Raw('sum(w.cost) as cost')))
                ->where('status_fufilment','=',$status_paid)
                ->get();



    $reportunpaid = DB::table('purchaseorders as w')
                ->select(array(DB::Raw('sum(w.cost) as cost')))
                ->where('status_fufilment','=',$status_unpaid)
                ->get();
    // $reportcostincurred = DB::select(DB::raw('SELECT created_at, SUM(cost) AS cost FROM products GROUP BY week(created_at)'));


       return \View::make('master_template')
      ->nest('content','report_total_unpaid_paid_orders',array('reportpaidunpaid' => $reportpaid,'reportunpaid'=>$reportunpaid,'namesessions' => $namesessions)); 

  }


  public function report_inventory_movement(){

     $namesessions = Session::get('name');
    

     
    $reportinventorymovement = DB::table('inventory as w')
                ->select(array(DB::Raw('sum(w.inventory_received) as inventory_received'),DB::Raw('sum(w.inventory_shipped) as inventory_shipped'),DB::Raw('sum(w.inventory_on_hand) as inventory_on_hand'),'stock_items.name'))
                ->join('stock_items','stock_items.id', '=', 'w.stock_items_id')
                ->groupBy('w.stock_items_id','stock_items.name')
                ->get();

       return \View::make('master_template')
      ->nest('content','report_inventory_movement',array('reportinventorymovement' => $reportinventorymovement,'namesessions' => $namesessions)); 
  }
}

