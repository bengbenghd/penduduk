<?php
$server = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "penduduk";

$con = mysqli_connect($server,$username,$password) or die ("Gagal");
mysqli_select_db($con, $database) or die ("Database tidak ditemukan");


?>