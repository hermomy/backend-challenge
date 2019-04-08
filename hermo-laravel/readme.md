## Installation Steps

- Checkout
- Run Composer Install
- Update .env
- Dump /database/dump/data.sql


## Questions

### What will your approach be in designing the database?

For the given scenario, relation database will be used and mysql had been chosen as the RDBMS. 
The following assumption were made during the database design:-

* The Vouchers can be configured by either discount amount or values
* There can be only one rules per voucher
* The customer does not have more than one shipping address
* The customer Amy purchased item and eligible for 


### Write a function to process the vouchers based on the given conditions.

Run php artisan process:vouchers


### Write the query to answer Junaidah's questions.

#### The number of unpaid orders vs paid in a month

> SELECT payment_status, count(*) FROM orders 
  WHERE created_at 
  BETWEEN '2019-04-01 00:00:01' AND '2019-04-30 00:00:01'
  GROUP BY payment_status;

#### The cost incurred to generate weekly sales

> SELECT sum(cost_price) 
  FROM products
  INNER JOIN order_details
  ON products.prod_id = order_details.product_id
  WHERE order_details.created_at 
  BETWEEN '2019-04-01 00:00:01' AND '2019-04-30 00:00:01';

#### Average daily sales

> SELECT avg(sell_price) 
  FROM products
  INNER JOIN order_details
  ON products.prod_id = order_details.product_id
  WHERE order_details.created_at 
  BETWEEN '2019-04-01 00:00:01' AND '2019-04-30 23:59:59';


#### Inventory movement based on Paid Orders and Unpaid Orders

Quantity Sold for Orders
> select quantity as `Original Quantity`, count(order_details.product_id) as `Quantity Sold` from products
  INNER JOIN order_details
  ON products.prod_id = order_details.product_id
  INNER JOIN orders
  ON orders.id = order_details.order_id
  WHERE orders.payment_status = 'PAID'
  GROUP BY order_details.product_id
 
Quantity Un-Sold for Orders
>  select quantity as `Original Quantity`, count(order_details.product_id) as `Quantity UnPaid` from products
  INNER JOIN order_details
  ON products.prod_id = order_details.product_id
  INNER JOIN orders
  ON orders.id = order_details.order_id
  WHERE orders.payment_status = 'PENDING'
  GROUP BY order_details.product_id
