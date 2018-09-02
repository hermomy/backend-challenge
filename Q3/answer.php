<?php

include("../includes/db.php");

/*
    Query to show Paid vs Unpaid Orders In Current Month
    Query will select status(paid or unpaid) from payment table and date from sales_order table and then will match the date to current date
    Query will count total id's of orders whose status is paid or unpaid respectively and will display total paid and unpaid orders
*/

$current_month= date('m'); 
$current_day= date('d'); 

$approve="SELECT payment.P_Status,COUNT(payment.O_Id),sales_order.Order_Date FROM payment JOIN  sales_order ON payment.O_Id=sales_order.O_Id  
WHERE MONTH(sales_order.Order_Date) = $current_month GROUP BY P_Status" ;

$orders= mysqli_query($con,$approve);
 
while ($row = mysqli_fetch_array($orders)) {

    echo $id = $row[0]."  " ."Orders   =  ";
    echo $id = $row[1]."  ";
    echo "<br>";

}


?>