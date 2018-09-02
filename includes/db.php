<?php

$con = mysqli_connect("localhost","root","","hermomy");
$db = mysqli_select_db($con,"hermomy")or die("not select");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>