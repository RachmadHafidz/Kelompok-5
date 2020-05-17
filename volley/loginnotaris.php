<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 include 'koneksi.php';
 
 $koneksi = mysqli_connect($HostName,$HostUser,$HostPass,$DatabseName);
 
 $email = $_POST['emailnot'];
 $password = $_POST['passwordnot'];
 
 $Sql_Query = "select * from tb_notaris where emailnot = '$email' and passwordnot = '$password' ";
 
 $prosescek = mysqli_fetch_array(mysqli_query($koneksi,$Sql_Query));
 
 if(isset($prosescek)){
 
 echo "Data Matched";
 }
 else{
 echo "Invalid Username or Password Please Try Again !";
 }
 
 }else{
 echo "Check Again";
 }


?>