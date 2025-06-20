<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
/*********************************************************************/
$servername = "localhost"; 
$username = "root";
$password = ""; 
$db = "ecom"; 
$conn = new mysqli($servername, $username, $password,$db);
/********************************************************************/
$mail_email="test@nextgenscminc.com"; // email address
$mail_pass="12@#ABcd12@#ABcd"; // password
$mail_host="smtp.hostinger.com"; //for google smpt.google.com
$mail_sender="test@nextgenscminc.com"; // Company Name
/*****************************************************************/
$order_mail_receiver="getorderemail@gmail.com";
/*******************************************************************/
$key_id = "rzp_test_OXruRqJ6qMIrKK";
$key_secret = "3xUG6cNN3JbWwiS7J6FbmX5p";
/*******************************************************************/
$_state_ = array("Andaman and Nicobar", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman & Diu", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Pondicherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Tripura", "Uttar Pradesh", "Uttaranchal", "West Bengal");




?>