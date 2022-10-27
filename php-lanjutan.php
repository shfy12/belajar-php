<?php
/*
$nama = "Putu";

//PENGULANGAN
/* pengulangan manual
echo $nama;
echo "<br/>";
echo $nama;
echo "<br/>";
echo $nama;
echo "<br/>";
echo $nama;
echo "<br/>";
echo $nama;
echo "<br/>";
*/

/* for
$no = 10;

for ($i=0; $i<$no; $i++) {
    $n = $i + 1;
    echo $n." ".$nama."<br/>";
}
*/

/* while
$no = 10;
$i = 0;

while ($i < $no) {
    $n = $i + 1;
    echo $n." ".$nama."<br/>";
    $i++;
}
*/

/* do while
$no = 10;
$i = 0;

do {
    $n = $i + 1;
    echo $n." ".$nama."<br/>";
    $i++;
} while ($i < $no)
*/

/*
$data = array('Orange', 'Pink', 'Blue', 'Brown', 'Green', 'Black');
/*
foreach ($data as $value) {
    echo $value."<br>";
} 
/* menggunakan for
for ($i=0; $i<count($data); $i++) {
    echo $data[$i]."<br>";
}
/* menggunakan while
$i = 0;
while ($i < count($data)) {
    echo $data[$i]."<br>";
    $i++;
}
*/
// syntax untuk hanya menampilkan 1 data (hitungan dari 0)
// echo $data[2];

//PERCABANGAN
/* penggunaan jika
if ($nama == "Putu") {
    echo $nama." adalah orang Bali";
} else if ($nama == "Budi") {
    echo $nama." bukan orang Bali";
} else {
    echo $nama." darimana ya?";
}
*/
/* penggunaan beralih
switch ($nama) {
    case "Putu":
        $pesan = $nama." adalah orang Bali";
    break;
    case "Budi":
        $pesan = $nama." bukan orang Bali";
    break;
    default:
        $pesan = $nama." darimana ya?";
}
echo $pesan
*/

?>

<!-- caranya tinggal tulis html: 5 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Input Nama dan Diulang</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label>Nama</label>
        <input type="text" name="nama">
        <label>Jumlah</label>
        <input type="text" name="no">
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
        if(!empty($_POST['submit'])) {

            switch ($_POST['nama']) {
                case "Putu":
                    $pesan = $_POST['nama']." adalah orang Bali";
                break;
                case "Budi":
                    $pesan = $_POST['nama']." bukan orang Bali";
                break;
                default:
                    $pesan = $_POST['nama']." darimana ya?";
            }
            for ($i=0;$i<$_POST['no'];$i++) {
                echo $pesan."<br>";
            }
        } else {
            echo "Anda belum input nama dan jumlah";
        }
    ?>
</body>
</html>