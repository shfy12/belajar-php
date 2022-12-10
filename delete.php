<?php

// tangkap data dari form yang udah disubmit
if (isset($_GET['id'])) {
    $id = $_GET ['id'];

    //1. buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","todolist");

    //2. cek koneksi dengan MySQL
    if (mysqli_connect_errno()) {
        echo "koneksi gagal:" . mysqli_connect_error();
        exit();
    } else{
        echo 'koneksi berhasil';
    }

    // membuat sql query untuk delete dan jalankan
    $sql = "DELETE from todo WHERE id=$id";

    if (mysqli_query($con,$sql)) {
        echo "data berhasil dihapus";
        header("Refresh:0; url=index.php");
    } else{
        echo "error ". mysqli_error($con);
    }

    mysqli_close($con);
}

?>