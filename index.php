<?php
//1. buat koneksi dengan MySQL
$con = mysqli_connect("localhost","root","","seal_fakultas")

//2. cek koneksi dengan MySQL
if (mysqli_connect_errno()) {
    echo "koneksi gagal:" . mysqli_connect_error();
    exit();
} else{
    echo 'koneksi berhasil';
}

//3. membaca data dari table mysql
$query = "SELECT * FROM mahasiswa";

//4. menampilkan data dengan sql query
$result = mysqli_query($con,$query)
if($result){
    //menampilkan data satu per satu
    /*
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
    echo $row ["nama"]
    */
    while($row=mysqli_fetch_assoc($result)){
        echo "<br>". $row["nama"]."alamat : ".$row["alamat"];
    }
    mysqli_free_result($result);
}

//5.tutup koneksi mysql
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1" style="width:100%;">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
        </tr>
        <tr>
            <td>21112022</td>
            <td>Melati</td>
        </tr>
    </table>
</body>
</html>