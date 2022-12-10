<?php

// tangkap data dari form yang udah disubmit
if (isset($_GET["id"])) {
    $id = $_GET['id'];

    //1. buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","todolist");

    //2. cek koneksi dengan MySQL
    if (mysqli_connect_errno()) {
        echo "koneksi gagal:" . mysqli_connect_error();
        exit();
    } else{
        echo 'koneksi berhasil';
    }

    // membuat sql query untuk update ke database dan jalankan
    $query = "UPDATE todo SET status=1 WHERE id='$id' ";

    $sql = mysqli_query($con,$query);
    mysqli_close($con);

    if ($sql) {
        echo "data berhasil diubah";
        header("Refresh:0; url=index.php");
    } else{
        echo "error ". mysqli_error($con);
    }
}
?>