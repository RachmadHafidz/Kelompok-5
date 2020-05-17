<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include 'koneksi.php';
    $koneksi = mysqli_connect($HostName,$HostUser,$HostPass,$DatabseName);

    $email = $_POST['emailnot'];
    $password = $_POST['passwordnot'];
    $nama = $_POST['namanot'];
    $sk = $_POST['no_sk'];
    $telp = $_POST['telp'];
    $cek = "SELECT * from tb_notaris where emailnot='$email'";
    $prosescek = mysqli_fetch_array(mysqli_query($koneksi,$cek));

    if (isset($prosescek)) {
        echo 'Email telah digunakan';
    } else {
        $query = "INSERT into tb_notaris values (null,'$email','$password','$nama','$sk','$telp')";
        if (mysqli_query($koneksi,$query)) {
            echo 'Berhasil mendaftar';
        } else {
            echo 'Gagal mendaftar';
        } 
    }
    
}
mysqli_close($koneksi);
?>