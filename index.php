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
		    	<h3>What will your approach be in designing the database?</h3>
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
		    	<p><label>Order</label> - <div>After user checkout for payment, record subtotal and total(after charges/discount)<br/>
		    	Status updated by stages (Pending Payment/Processing/Shipping/Received/Reviewed/Refunded...etc)</div></p>
		    	<p><label>Order Item</label> - What item consist in certain order, item price on this order(for cases like promotion price)</p>
		    	<p><label>Order Charges</label> - What other charges/discount for certain order (voucher/tax/shipping fee...etc)</p>
		    	<p><label>Voucher</label> - Set setting for each voucher code.</p>
		    	<hr/>
		    	<h3>Write a function to process the vouchers based on the given conditions.</h3>
		    </div>
		    <div class="col-md-1"></div>
		</div>
	</body>

</html>
