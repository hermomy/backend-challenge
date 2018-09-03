<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 4.8.0
 */

/**
 * Database `hermomy`
 */

/* `hermomy`.`analysts` */
$analysts = array(
);

/* `hermomy`.`customer` */
$customer = array(
  array('C_Id' => '1','C_Name' => 'hjhj','C_City' => 'hjhj','C_Email' => 'jjhhj','C_Address' => 'jhhjjh'),
  array('C_Id' => '2','C_Name' => 'fsf','C_City' => 'kjkj','C_Email' => 'kjkjkj','C_Address' => 'kjkjkj'),
  array('C_Id' => '3','C_Name' => 'kljkl','C_City' => 'kklkl','C_Email' => 'kljkjlkl','C_Address' => 'klkljklj'),
  array('C_Id' => '4','C_Name' => 'kjkj','C_City' => 'kjkjkjl','C_Email' => 'kjlkjlkjlklj','C_Address' => 'klyuffyu'),
  array('C_Id' => '5','C_Name' => 'hjhj','C_City' => 'fcggfhj','C_Email' => 'hkkkj','C_Address' => 'ffcgg')
);

/* `hermomy`.`fulfillment_team` */
$fulfillment_team = array(
  array('F_Id' => '1','F_Name' => 'kjkjlkjl','F_Address' => 'jkjlklj','F_Idendity' => 'kjjkllk','I_Id' => '1'),
  array('F_Id' => '3','F_Name' => 'kjjkkj','F_Address' => 'jkjhj','F_Idendity' => 'kjkjkj','I_Id' => '3'),
  array('F_Id' => '5','F_Name' => 'klklkl','F_Address' => 'klkjlkjl','F_Idendity' => 'kjlkljjl','I_Id' => '5')
);

/* `hermomy`.`inventory` */
$inventory = array(
  array('P_Category' => 'small','P_total' => '100','P_Left' => '100','I_id' => '1','P_Id' => '1','P_Barcode' => 'product_one','P_location' => 'johor','P_sku' => 'sku001'),
  array('P_Category' => 'medium','P_total' => '100','P_Left' => '100','I_id' => '3','P_Id' => '3','P_Barcode' => 'product_one','P_location' => 'melaka','P_sku' => 'sku002'),
  array('P_Category' => 'large','P_total' => '100','P_Left' => '100','I_id' => '5','P_Id' => '5','P_Barcode' => 'product_three','P_location' => 'selangor','P_sku' => 'sku003')
);

/* `hermomy`.`payment` */
$payment = array(
  array('Payment_Id' => '2','O_Id' => '8','P_Method' => 'cash','Ammount' => '50','Card_Name' => 'ipin','Card_No' => '54546654','Expiration' => '65456','CCV_Code' => '654654','P_Status' => 'Paid'),
  array('Payment_Id' => '3','O_Id' => '9','P_Method' => 'dfs','Ammount' => '45','Card_Name' => 'lkjl','Card_No' => '654654','Expiration' => '65665','CCV_Code' => '6565','P_Status' => 'Paid'),
  array('Payment_Id' => '4','O_Id' => '10','P_Method' => 'hjkkj','Ammount' => '89','Card_Name' => 'jhhj','Card_No' => '3554','Expiration' => 'mnjmj','CCV_Code' => '26','P_Status' => 'Paid'),
  array('Payment_Id' => '5','O_Id' => '11','P_Method' => 'jkkj','Ammount' => '89','Card_Name' => 'jbjn','Card_No' => '206','Expiration' => 'bkjjh','CCV_Code' => '5','P_Status' => 'UnPaid'),
  array('Payment_Id' => '6','O_Id' => '12','P_Method' => 'kjkj','Ammount' => '564','Card_Name' => 'hjjhj','Card_No' => '553','Expiration' => 'kjjkjk','CCV_Code' => '5','P_Status' => 'UnPaid'),
  array('Payment_Id' => '7','O_Id' => '13','P_Method' => 'kjhhj','Ammount' => '65654','Card_Name' => 'kjhj','Card_No' => '55','Expiration' => 'bkjkjg','CCV_Code' => '6','P_Status' => 'UnPaid')
);

/* `hermomy`.`procurement_team` */
$procurement_team = array(
  array('Pr_Id' => '1','Pr_Name' => 'kjkjkjl','Pr_Address' => 'kjlkjlkjl','P_Id' => '1'),
  array('Pr_Id' => '2','Pr_Name' => 'kjkjlkjl','Pr_Address' => 'kljkjlkjlkjl','P_Id' => '2'),
  array('Pr_Id' => '3','Pr_Name' => 'jklkjl','Pr_Address' => 'klkljkjl','P_Id' => '3'),
  array('Pr_Id' => '4','Pr_Name' => 'klkjlkjl','Pr_Address' => 'kjjkkh','P_Id' => '4')
);

/* `hermomy`.`product` */
$product = array(
  array('P_Barcode' => '5454','Image' => '4545','Cost' => '20','Price' => '30','P_Onsale' => 'yes','P_id' => '1'),
  array('P_Barcode' => '4554','Image' => 'jhjhkhj','Cost' => '30','Price' => '40','P_Onsale' => 'yes','P_id' => '2'),
  array('P_Barcode' => '554','Image' => 'ghgh','Cost' => '40','Price' => '50','P_Onsale' => 'yes','P_id' => '3'),
  array('P_Barcode' => '4887','Image' => 'jhj','Cost' => '54','Price' => '60','P_Onsale' => 'yes','P_id' => '4'),
  array('P_Barcode' => '8756','Image' => 'ghhg','Cost' => '45','Price' => '70','P_Onsale' => 'yes','P_id' => '5')
);

/* `hermomy`.`sales_order` */
$sales_order = array(
  array('O_Id' => '8','Order_Date' => '2018-09-02','C_Id' => '1','P_Id' => '1'),
  array('O_Id' => '9','Order_Date' => '2018-09-02','C_Id' => '1','P_Id' => '2'),
  array('O_Id' => '10','Order_Date' => '2018-09-10','C_Id' => '2','P_Id' => '1'),
  array('O_Id' => '11','Order_Date' => '2018-09-11','C_Id' => '2','P_Id' => '3'),
  array('O_Id' => '12','Order_Date' => '2018-09-12','C_Id' => '2','P_Id' => '4'),
  array('O_Id' => '13','Order_Date' => '2018-10-05','C_Id' => '4','P_Id' => '5')
);

/* `hermomy`.`voucher_code` */
$voucher_code = array(
  array('v_id' => '1','Payment_Id' => '2','Code_Name' => '20FORME','Discount_Percentage' => '20','Expiry_Date' => '2018-10-01')
);
