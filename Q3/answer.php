<?php

include("../includes/db.php");


echo "1) The number of unpaid orders vs paid in a month:";
echo "<br>"; echo "<br>";

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
 
while ($row = mysqli_fetch_array($orders)){
    echo $id = $row[0]."  " ."Orders   =  ";
    echo $id = $row[1]."  ";
    echo "<br>";
}

echo "<br>";echo "<br>";echo "<br>";
echo "2) The cost incurred to generate weekly sales:"; echo "<br>";


/*
    Query to cost incurred to generate weekly sales
    Query will select product id's from sales_orders tables and will find their price in product table and will group on weekly basis
    It will display in weekly basis the cost of products which are been sold.
*/

$cost="SELECT sales_order.P_Id,AVG(product.Cost),Order_Date,WEEK(Order_Date) FROM sales_order JOIN product ON sales_order.P_Id=product.P_Id GROUP BY WEEK(Order_Date)";
$weekly_cost= mysqli_query($con,$cost);

echo "<br>";

while ($row = mysqli_fetch_array($weekly_cost)){
    echo "<br>";
    echo $row[3]."th Week  =  ".$row[1]."  total costs";
}

echo "<br>"; echo "<br>"; echo "<br>";


echo "3) Average daily sales:";
echo "<br>";echo "<br>";

/*
    Query to display Average daily sales
    Query will select product id's from sales_orders tables and will find their price in product table and will group on daily basics
    It will show average sales on daily basics 
*/

$sales="SELECT sales_order.P_Id,AVG(product.Price),DAYNAME(`Order_Date`),Order_Date FROM sales_order JOIN product ON sales_order.P_Id=product.P_Id GROUP BY DAYOFWEEK(`Order_Date`)";
$daily_sales= mysqli_query($con,$sales);

while ($row = mysqli_fetch_array($daily_sales)){
    echo "<br>";
    echo $row[3]."  =  ";
    echo $row[1]." total sales";
}

echo "<br>";echo "<br>";echo "<br>";
echo "4) The inventory movement based on Paid Orders and Unpaid Orders: ";
echo "<br>";echo "<br>";

/*
    Query for inventory movement based on Paid Orders and Unpaid Orders
*/

$inventory="SELECT payment.P_Status,sales_order.P_Id,inventory.P_Barcode,P_total,P_Left,COUNT(inventory.P_Id) FROM payment
 JOIN sales_order ON payment.O_Id=sales_order.O_Id
 JOIN inventory ON sales_order.P_Id=inventory.P_Id
 GROUP BY payment.P_Status";
$inventory_movement= mysqli_query($con,$inventory);


while ($row = mysqli_fetch_array($inventory_movement)){
    echo "<br>";
    echo $row['P_Status']," Orders : <br>"; 

    //echo "Product Barcode  =  ".$row['P_Barcode'];
    echo "<br>";
    echo "Product's Sold  =  ".$row[5];
    echo "<br>";
    $total=$row[4];
    $sold=$row[5];
    $remaining=$total-$sold;
    echo "Inventory Left = "  .  $remaining;
    echo "<br>";
}


?>