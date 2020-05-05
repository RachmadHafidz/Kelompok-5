<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    include 'koneksi.php';
    $koneksi = mysqli_connect($HostName,$HostUser,$HostPass,$DatabseName);

    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cek = "SELECT * from user where email='$email'";
    $prosescek = mysqli_fetch_array(mysqli_query($koneksi,$cek));

    if (isset($prosescek)) {
        echo 'Email telah digunakan';
    } else {
        $query = "INSERT into user values (null,'$nama','$telp','$alamat','$email','$password')";
        if (mysqli_query($koneksi,$query)) {
            echo 'Berhasil mendaftar';
        } else {
            echo 'Gagal mendaftar';
        } 
    }
    
}
mysqli_close($koneksi);
?>