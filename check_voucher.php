<?php
$input['vCode'] =  ( isset($_REQUEST['v_code']) ? strip_tags($_REQUEST['v_code']) : '');
$input['subtotal'] =  ( isset($_REQUEST['subtotal']) ? strip_tags($_REQUEST['subtotal']) : '0');

$conn = dbConnect();

$validateVoucher = 'SELECT * from voucher WHERE code = "'.$input['vCode'].'" ';
$result = $conn->query($validateVoucher);

if ($result && $result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		if($row['end_date'] <= date('Y-m-d')){
			$return['type'] = 'error';
		    $return['msg'] = '[ERR400] This voucher is expired';
		}else if($row['min_purchase'] > $input['subtotal']){
			$return['type'] = 'error';
		    $return['msg'] = '[101] Minimum purchase RM '.number_format($row['min_purchase'],2);
		}else{
			$return['type'] = 'success';
	        $return['value'] = 'DISCOUNT '.$row['percentage'].'%';
	        $return['amount'] = 'RM '.number_format( $input['subtotal'] * ($row['percentage'] / 100), 2);
	        $return['total'] = 'RM '.number_format( $input['subtotal'] + $return['amount'], 2);
		}		
	}	
} else {
	$return['type'] = 'error';
    $return['msg'] = '[100] Invalid Voucher Code.';
}

echo json_encode($return);

function dbConnect (){
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'hermo';
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die($conn->connect_error);
	} 
	return $conn;
}

?>