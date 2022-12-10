<?php

// tangkap data dari form yang udah disubmit
if (isset($_GET['id'])) {
    $id = $_GET ['id'];

    //1. buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","fakultas");

    //2. cek koneksi dengan MySQL
    if (mysqli_connect_errno()) {
        echo "koneksi gagal:" . mysqli_connect_error();
        exit();
    } else{
        echo 'koneksi berhasil';
    }

    // membuat sql query untuk delete dan jalankan
    $sql = "DELETE from mahasiswa WHERE id=$id";

    if (mysqli_query($con,$sql)) {
        echo "data berhasil dihapus";
    } else{
        echo "terdapat error ". mysqli_error($con);
    }

    mysqli_close($con);
}

?>