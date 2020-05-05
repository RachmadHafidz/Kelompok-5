<!DOCTYPE html>   
  <html>   
  <head>   
   <meta charset="UTF-8">   
   <title>   
     Halaman Login | Tutorial Reset Password CodeIgniter @ http://recodeku.blogspot.com  
   </title>   
 </head>   
 <body>   
   <h2>Halaman Login</h2>   
   <?php   
   // Cetak session   
   if($this->session->flashdata('sukses')) {   
     echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';   
   }   
   ?>   
   <?php echo form_open('login');?>   
   <p>Username:</p>   
   <p>   
     <input type="text" name="username" value="<?php echo set_value('username'); ?>"/>   
   </p>   
   <p> <?php echo form_error('username'); ?> </p>   
   <p>Password:</p>   
   <p>   
     <input type="password" name="password" value="<?php echo set_value('password'); ?>"/>   
   </p>   
   <p> <?php echo form_error('password'); ?> </p>   
   <p>   
     <input type="submit" name="btnSubmit" value="Login" />   
   </p>   
   <p>   
     <?php echo anchor(site_url().'/beranda','Kembali');  
     echo ' | ';   
     echo anchor(site_url().'/register','Daftar');   
     echo ' | ';   
     echo anchor(site_url().'/lupa_password','Lupa Password');  
     ?>  
   </p>   
 </body>   
 </html>   