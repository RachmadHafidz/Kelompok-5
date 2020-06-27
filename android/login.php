<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 include 'koneksi.php';
 
 $koneksi = mysqli_connect($HostName,$HostUser,$HostPass,$DatabseName);
 
 $email = $_POST['email'];
 $password = md5($_POST['password']);
 
 $Sql_Query = "select * from client where email = '$email' and password = '$password' ";
 
 $prosescek = mysqli_fetch_array(mysqli_query($koneksi,$Sql_Query));
 
 if(isset($prosescek)){
 
 echo "Data Matched";
 }
 else{
 echo "Invalid Email or Password Please Try Again !";
 }
 
 }else{
 echo "Check Again";
 }


?>