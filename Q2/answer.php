

<?php 

include("../includes/db.php");


//Voucher Code Function

function voucher_code(){

    $user_entered_code="20FORME";
    $user_entered_discount="20";
    $user_entered_date="2018-09-15";
    $cur_date=date('Y-m-d');

    $code = "SELECT * FROM voucher_code JOIN payment ON voucher_code.Payment_Id=payment.Payment_Id WHERE Code_Name='$user_entered_code' && Discount_Percentage='$user_entered_discount' && payment.ammount>45 && ('$user_entered_date' BETWEEN '$cur_date' AND Expiry_Date)";
    $check_code= mysqli_query($con,$code);
    
    if(mysqli_num_rows($check_code)==1)
        return true;
    else
        return false;
}

voucher_code();
    

?>