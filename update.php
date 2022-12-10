<?php
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

    //3. membaca data dari table mysql
    $query = "SELECT * FROM mahasiswa WHERE id=$id" ;

    //4. menampilkan data dengan sql query
    $result = mysqli_query($con,$query);
    //buat mahasiswa kosong biar bisa ditampilin nanti di htmlnya
    $mahasiswa = [];
    if ($result) {
        //menampilkan data satu persatu
        while($row=mysqli_fetch_assoc($result)){
            //harus menambahkan ini biar bisa kebaca data mysql mahasiswanya
            $mahasiswa = $row;
        }
        mysqli_free_result($result);
    }

    //5.tutup koneksi mysql
    mysqli_close($con);
}

// tangkap data dari form yang udah disubmit
if (isset($_POST["submit"])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $id_jurusan = $_POST['id_jurusan'];
    $gender = $_POST['gender'];
    $tpt_lahir = $_POST['tpt_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    echo $nama;

    //1. buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","fakultas");

    //2. cek koneksi dengan MySQL
    if (mysqli_connect_errno()) {
        echo "koneksi gagal:" . mysqli_connect_error();
        exit();
    } else{
        echo 'koneksi berhasil';
    }

    // membuat sql query untuk update ke database dan jalankan
    $sql = "UPDATE mahasiswa SET nim='$nim', nama='$nama', id_jurusan='$id_jurusan', jenis_kelamin='$gender', 
            tempat_lahir='$tpt_lahir', tanggal_lahir='$tgl_lahir', alamat='$alamat' WHERE id=$id ";

    if (mysqli_query($con,$sql)) {
        echo "data berhasil diubah";
    } else{
        echo "terdapat error ". mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Mahasiswa</title>
</head>
<body>
    <h1>Update Data Mahasiswa</h1>
    <!-- <?php var_dump($mahasiswa); ?> make ini buat bisa kebaca di htmlnya tapi bentukannya kurang rapih- -->
    <form action="" method="post">
        NIM: <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>"><br>
        Nama: <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>"><br>
        ID Jurusan: <input type="number" name="id_jurusan" value="<?php echo $mahasiswa['id_jurusan']; ?>"><br>
        Jenis Kelamin: <input type="text" name="gender" value="<?php echo $mahasiswa['jenis_kelamin']; ?>"><br>
        Tempat Lahir: <input type="text" name="tpt_lahir" value="<?php echo $mahasiswa['tempat_lahir']; ?>"><br>
        Tanggal Lahir (yyyy-mm-dd): <input type="text" name="tgl_lahir" value="<?php echo $mahasiswa['tanggal_lahir']; ?>"><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $mahasiswa['alamat']; ?>"><br>
        <input type="text" name="id" value="<?php echo $mahasiswa['id']; ?>" hidden>
        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>