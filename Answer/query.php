<?php 



// The number of unpaid orders vs paid in a month

$queryPaid = " SELECT COUNT(id) FROM sales_orders where  MONTH(created_at) = MONTH(CURRENT_DATE())
AND YEAR(created_at) = YEAR(CURRENT_DATE()) and paid=1  ";

$queryUnpaid = ' SELECT COUNT(id) FROM sales_orders where  MONTH(created_at) = MONTH(CURRENT_DATE())
AND YEAR(created_at) = YEAR(CURRENT_DATE()) and paid=0  ';



// The cost incurred to generate weekly sales
$query_weekly_product_cost="SELECT YEARWEEK(s.created_at, 7) AS year_week, sum(p.cost_price*si.quantity)as weekly_product_cost
                             FROM sales_orders s
                             inner join sales_order_items si on s.id = si.sales_order_id
                             inner join products p on si.product_id=p.id
                            group by YEARWEEK(s.created_at, 7) ";


// Average daily sales
$queryAverageDailySales="SELECT avg(day_sales) from (
                                SELECT sum(total_amount)as day_sales 
                                FROM sales_orders
                                group by DATE_FORMAT(created_at, '%Y-%m-%d')
                        )daily_sales";


// The inventory movement based on Paid Orders and Unpaid Orders

 $queryPaidInventoryMovement="SELECT p.name, sum(si.quantity)as sales_inventory_movement FROM sales_orders s
                                inner join sales_order_items si on s.id = si.sales_order_id
                                inner join products p on si.product_id=p.id
                                where s.paid=1
                                group by si.product_id";

 
 $queryUnPaidInventoryMovement = 'SELECT p.name, sum(si.quantity)as sales_inventory_movement FROM sales_orders s
                                inner join sales_order_items si on s.id = si.sales_order_id
                                inner join products p on si.product_id=p.id
                                where s.paid=0
                                group by si.product_id';







?>