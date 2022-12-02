<?php
//1. buat koneksi dengan MySQL
$con = mysqli_connect("localhost","root","","fakultas");

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
$result = mysqli_query($con,$query);
// membuat persiapan data mahasiswa dengan variabel kosong ([]) karena diisi oleh variabel while
$mahasiswa = [];
if ($result) {
    //menampilkan data satu per satu
    /*
    $row = mysqli_fetch_assoc($result);
    var_dump($row);
    //menampilkan nama aja (bisa diganti juga selain nama seperti alamat, dll)
    echo $row ["nama"]
    */
    while($row=mysqli_fetch_assoc($result)){
        //echo "<br>".$row["nama"].
        //" alamat : ".$row["alamat"]; (nambahin selain nama aja)
        $mahasiswa[] = $row;
    }
    mysqli_free_result($result);
}

//5.tutup koneksi mysql
mysqli_close($con);

/* kalau foreeach diphp kayak begini
foreach($mahasiswa as $value){
    echo $value["nama"];
}
*/
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
        <!-- foreeach biasanya diakhir ditambahkan {} diakhir tetapi bisa juga hanya : -->
        <?php foreach($mahasiswa as $value): ?>
        <tr>
            <!-- menampilkan data yang ada di mySQL -->
            <td><?php echo $value["nim"]; ?></td>
            <td><?php echo $value["nama"]; ?></td>
        </tr>
        <!-- penambahan endforeach juga harus dilakukan untuk mengakhiri -->
        <?php endforeach; ?>
    </table>
</body>
</html>