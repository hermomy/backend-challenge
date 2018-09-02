CREATE TABLE `orders_addresses` (
  `address_id` int,
  `order_id` int,
  `billing_first_name` text(65535),
  `billing_last_name` text(65535),
  `billing_country` text(65535),
  `billing_address_1` text(65535),
  `billing_address_2` text(65535),
  `billing_state` text(65535),
  `billing_city` text(65535),
  `billing_postcode` text(65535),
  `shipping_first_name` text(65535),
  `shipping_last_name` text(65535),
  `shipping_country` text(65535),
  `shipping_address_1` text(65535),
  `shipping_address_2` text(65535),
  `shipping_state` text(65535),
  `shipping_city` text(65535),
  `shipping_postcode` int,
  PRIMARY KEY (`address_id`),
  KEY `FK` (`order_id`)
);

CREATE TABLE `customers_addresses` (
  `address_id` int,
  `customer_id` int,
  `billing_first_name` text(65535),
  `billing_last_name` text(65535),
  `billing_country` text(65535),
  `billing_address_1` text(65535),
  `billing_address_2` text(65535),
  `billing_state` text(65535),
  `billing_city` text(65535),
  `billing_postcode` text(65535),
  `shipping_first_name` text(65535),
  `shipping_last_name` text(65535),
  `shipping_country` text(65535),
  `shipping_address_1` text(65535),
  `shipping_address_2` text(65535),
  `shipping_state` text(65535),
  `shipping_city` text(65535),
  `shipping_postcode` text(65535),
  PRIMARY KEY (`address_id`),
  KEY `FK` (`customer_id`)
);

CREATE TABLE `payments` (
  `payment_id` int,
  `invoice_no` int,
  `amount` decimal,
  `payment_mode` text(65535),
  `ref_no` int,
  `payment_date` text(65535),
  PRIMARY KEY (`payment_id`)
);

CREATE TABLE `products` (
  `product_id` int,
  `p_cat_id` int,
  `date` timestamp,
  `product_title` text(65535),
  `product_img1` text(65535),
  `product_img2` text(65535),
  `product_img3` text(65535),
  `product_price` int,
  `product_label` text(65535),
  `status` varchar(255),
  PRIMARY KEY (`product_id`),
  KEY `FK` (`p_cat_id`)
);

CREATE TABLE `product_categories` (
  `p_cat_id` int,
  `p_loc_id` int,
  `p_cat_title` text(65535),
  PRIMARY KEY (`p_cat_id`),
  KEY `FK` (`p_loc_id`)
);

CREATE TABLE `coupons` (
  `coupon_id` int,
  `payment_id` int,
  `coupon_title` varchar(255),
  `coupon_price` varchar(255),
  `coupon_code` varchar(255),
  `coupon_limit` int,
  PRIMARY KEY (`coupon_id`)
);

CREATE TABLE `orders_items` (
  `item_id` int,
  `order_id` int,
  `product_id` int,
  `price` decimal,
  `qty` int,
  `size` text(65535),
  PRIMARY KEY (`item_id`),
  KEY `FK` (`order_id`, `product_id`)
);

CREATE TABLE `product_location` (
  `p_loc_id` Type,
  `p_state` Type,
  `p_poscode` Type,
  PRIMARY KEY (`p_loc_id`)
);

CREATE TABLE `shipping` (
  `shipping_id` int,
  `shipping_type` int,
  `shipping_zone` int,
  `shipping_country` int,
  `shipping_weight` decimal,
  `shipping_cost` decimal,
  PRIMARY KEY (`shipping_id`)
);

CREATE TABLE `orders` (
  `order_id` int,
  `customer_id` int,
  `invoice_no` int,
  `shipping_type` text(65535),
  `shipping_cost` decimal,
  `payment_method` text(65535),
  `order_date` text(65535),
  `order_total` decimal,
  `order_status` text(65535),
  PRIMARY KEY (`order_id`),
  KEY `FK` (`customer_id`)
);

CREATE TABLE `customers` (
  `customer_id` int,
  `customer_name` varchar(255),
  `customer_email` varchar(255),
  `customer_pass` varchar(255),
  `customer_country` text(65535),
  `customer_city` text(65535),
  `customer_contact` varchar(255),
  `customer_address` text(65535),
  `customer_image` text(65535),
  `customer_ip` varchar(255),
  `customer_confirm_code` text(65535),
  PRIMARY KEY (`customer_id`)
);.

