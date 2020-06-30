<?php
require_once('koneksi.php');
$id = $_POST['id_notaris'];
$nama = $_POST['nama'];

if(!$id || !$nama ){
  echo json_encode(array('message'=>'required field is empty.'));
}else{
$query = mysqli_query($CON, "UPDATE notaris SET nama='$nama' WHERE id_notaris = '$id'");
if($query){
    echo json_encode(array('message'=>'data successfully updated.'));
  }else{
    echo json_encode(array('message'=>'data failed to update.'));
  }
}
?>