<?php

if (isset($_GET['p'])) {

    //caranya biar tampil (di php-form.html bagian form action tambahin "?p=tampil")
    if ($_GET['p'] == 'tampil') { //standar
        echo $_POST['nama'];
        echo "<br/>";
        echo $_POST['password'];

    //kalau mau dipake tinggal ganti (di php-form.html bagian form action "?p=pesan"
    } elseif ($_GET['p'] == 'pesan') { //ini ada pesan kalau udah ngisi form
        echo "Halo apa kabar".$_POST['nama'];
        echo "<br/>";
        echo "Password anda adalah".$_POST['password'];

    //kalau mau dipake tinggal ganti (di php-form.html bagian form action "?p=aman"
    } elseif ($_GET['p'] == 'aman') { //ini ada pesannya kalau kosong
        if (!empty ($_POST['nama'])) {
            echo $_POST['nama'];
        } else {
            echo "Nama belum dimasukan";
        }
    
        echo "</br>";

        if (!empty ($_POST['password'])) {
            echo $_POST['password'];
        } else {
            echo "Password masih kosong";
        } 

    //kalau mau dipake tinggal ganti (di php-form.html bagian form action "?p=gambar"
    } elseif ($_GET['p'] == 'gambar') { //ini buat bisa upload gambar
        $size = getimagesize($_FILES['berkas']['tmp_name']); //size  gambarnya
        $image = "data:".$size['mime'].";base64,".
                base64_encode(file_get_contents($_FILES['berkas']['tmp_name'])); //menampilkan gambar
        echo "<img src='".$image."' width='720'>";

    } else {
        echo "Anda tidak boleh mengakses halaman ini";
    }
}

?>