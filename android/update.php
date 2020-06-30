<?php
 
include('koneksi.php');
 
$nama       = $_POST['nama'];
$id    = $_POST['id_notaris'];

 
if(!empty($nama) &amp;&amp; !empty($id)){
 
    $sql = "UPDATE notaris set nama='$nama'' WHERE noinduk='$id' ";
 
    $query = mysqli_query($conn,$sql);
 
    if(mysqli_affected_rows($conn) > 0){
        $data['status'] = true;
        $data['result'] = "Berhasil";
    }else{
        $data['status'] = false;
        $data['result'] = "Gagal";
    }
 
}else{
    $data['status'] = false;
    $data['result'] = "Gagal, Nomor Induk dan Nama tidak boleh kosong!";
}
 
 
print_r(json_encode($data));
 
 
 
 
?>