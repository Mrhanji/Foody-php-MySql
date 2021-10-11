<?php 

session_start();
$currency="₹";
$host="localhost";
$domain="https://foody.partibha.ml/";
$site_name="Foody By Partibha";
$db_user="u260543foody_partibha";
$db_name="u2605_foody_partibha";
$db_pass="^6yOJbKH@";



//Email config
$smtp_username="foody@partibha.ml";
$smtp_port="587";
$smtp_server="smtp.hostinger.in";
$smtp_type="tls";
$smtp_password="^OJ@ouZ";


date_default_timezone_set("Asia/Kolkata");

$conn=mysqli_connect($host,$db_user,$db_pass,$db_name) or die("Connection Failed: ".mysqli_error());




?>