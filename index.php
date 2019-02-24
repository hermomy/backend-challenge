<html>
	<head>
		<!-- CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="main.css">
		<!-- script -->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	</head>

	<body>
		<div class="row">
		    <div class="col-md-1"></div>
		    <div class="col-md-10">
		    	<h1>Hermo Backend Challenges</h1>
		    	<hr/>
		    	<h3>Q1 => What will your approach be in designing the database?</h3>
		    	<p>Refer to this <span class="click">CLICK >></span> <a href="hermoDB.png" targer="_blank">Database Diagram</a> <span class="click"><< CLICK</span></p>
		    	<p>In Jin's Mind...</p>
		    	<p><label>Role</label> - Permission control for each user to each action</p>
		    	<p><label>User</label> - User detail and keys to track in every table</p>
		    	<p><label>Purchase Order</label> - Who/When make this PO, PO received? date and status updated here </p>
		    	<p><label>Purchase Order Item</label> - What item has been ordered in certain PO</p>
		    	<p><label>Inventory</label> - Fulfilment team receive PO then register/update in inventory, Procurement team set ON_SALE on flag when register into product table</p>
		    	<p><label>Inventory Log</label> - <div>Tracking for Inventory quantity where certain Inventory was updated.<br/>
		    	Example A : Purchase order received, inventory qty added<br/>
		    	Example B : Order shipped out, inventory qty minus<br/>
		    	Example C : Order returned, inventory qty added</div></p>
		    	<p><label>Product</label> - Procurement team create product details here</p>
		    	<p><label>Order</label> - <div>User checkout for payment, record subtotal and total(after charges/discount)<br/>
		    	Status updated by stages (Pending Payment/Processing/Shipping/Received/Reviewed/Refunded...etc)</div></p>
		    	<p><label>Order Item</label> - What item consist in certain order, item price on this order(for cases like promotion price)</p>
		    	<p><label>Order Charges</label> - What other charges/discount for certain order (voucher/tax/shipping fee...etc)</p>
		    	<p><label>Voucher</label> - Set setting for each voucher code.</p>
		    	<p>P.S.</p>
		    	<p>There are much other table has to be created (shipping/payment/refund/..etc) but since not used in the scenarios so I'll leaved that part</p>
		    	<hr/>
		    	<h3>Q2 => Write a function to process the vouchers based on the given conditions.</h3>
		    	<p><label>Steps to demo voucher function</label></p>
		    	<p><label>Database Setting</label> - you can change to your db connection in /check_voucher.php
		    		<div>
		    			Server : localhost<br/>
		    			Username : root<br/>
		    			Password : <br/>
		    		</div>
		    	</p>
		    	<p><label>Create Database Schema</label> - hermo</p>
		    	<p><label>Import Database</label> - Import /hermo.sql into created schema</p>
		    	<button class="btn btn-info"><a href="voucher" target="_blank">Try Voucher !</a></button>
		    	<hr/>
		    	<h3>Q3 => Write the query to answer Junaidah's questions.</h3>
		    	3.1 ) The number of unpaid orders vs paid in a month<br/>
		    	<p>Assumed status is always 'Paid' if order's paid. Including others like Shipping/Received/etc..</p>
		    		<div class="sql">
		    			SELECT<br/>
		    			<span class="sql-tab">YEAR(create_date), MONTH(create_date),<br/></span>
		    			<span class="sql-tab">SUM(CASE WHEN status = 'Paid' THEN 1 ELSE 0 END) AS Paid,<br/></span>
		    			<span class="sql-tab">SUM(CASE WHEN status <> 'Paid' THEN 1 ELSE 0 END) AS Unpaid<br/></span>
			    		FROM hermo.order<br/>
			    		GROUP BY YEAR(create_date), MONTH(create_date);<br/>
		    		</div>

		    	3.2 ) The cost incurred to generate weekly sales<br/>
		    		<div class="sql">
		    			SELECT<br/>
		    			<span class="sql-tab">CONCAT(YEAR(o.create_date), '/', WEEK(o.create_date)) AS 'Year/Week',<br/></span>
		    			<span class="sql-tab">SUM(p.cost) AS Cost,<br/></span>
		    			<span class="sql-tab">SUM(o.total) AS Sales<br/></span>
			    		FROM hermo.order o, hermo.order_item i, hermo.product p<br/>
			    		WHERE o.id = i.order_id<br/>
			    		AND i.product_id = p.id<br/>
			    		AND o.status = 'Paid'<br/>
			    		GROUP BY CONCAT(YEAR(o.create_date), '/', WEEK(o.create_date));<br/>
		    		</div>
		    	3.3 ) Average daily sales<br/>
		    		<div class="sql">
		    			SELECT<br/>
		    			<span class="sql-tab">AVG(CASE DAYOFWEEK(`create_date`) WHEN 1 THEN `total` ELSE NULL END) AS Sunday,<br/></span>
		    			<span class="sql-tab">AVG(CASE DAYOFWEEK(`create_date`) WHEN 2 THEN `total` ELSE NULL END) AS Monday,<br/></span>
		    			<span class="sql-tab">AVG(CASE DAYOFWEEK(`create_date`) WHEN 3 THEN `total` ELSE NULL END) AS Tuesday,<br/></span>
		    			<span class="sql-tab">AVG(CASE DAYOFWEEK(`create_date`) WHEN 4 THEN `total` ELSE NULL END) AS Wednesday,<br/></span>
		    			<span class="sql-tab">AVG(CASE DAYOFWEEK(`create_date`) WHEN 5 THEN `total` ELSE NULL END) AS Thursday,<br/></span>
		    			<span class="sql-tab">AVG(CASE DAYOFWEEK(`create_date`) WHEN 6 THEN `total` ELSE NULL END) AS Friday,<br/></span>
		    			<span class="sql-tab">AVG(CASE DAYOFWEEK(`create_date`) WHEN 7 THEN `total` ELSE NULL END) AS Saturday<br/></span>
			    		FROM hermo.order<br/>
			    		WHERE YEAR(create_date) = '2019'<br/>
			    		AND MONTH(create_date) = '2';<br/>
		    		</div>
		    	3.4 ) The inventory movement based on Paid Orders and Unpaid Orders<br/>
		    	<p>Assumed to check the inventory after payment of Order_id 3</p>
		    		<div class="sql">
		    			SELECT<br/>
		    			<span class="sql-tab">SUM(CASE WHEN i.order_type = 'Purchase' THEN i.qty_in ELSE 0 END) AS 'STOCK IN',<br/></span>
		    			<span class="sql-tab">SUM(CASE WHEN i.order_type = 'Order' THEN i.qty_out ELSE 0 END) AS 'STOCK OUT'<br/></span>
			    		FROM hermo.inventory_log i<br/>
			    		WHERE create_date <= <br/>
		    			<span class="sql-tab">( SELECT create_date FROM hermo.inventory_log WHERE order_type = 'order' AND order_id = 3)<br/></span>
			    		GROUP BY inventory_id;<br/>
		    		</div>

		    	<hr/>
		    </div>
		    <div class="col-md-1"></div>
		</div>
	</body>

</html>
