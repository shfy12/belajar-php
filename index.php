<?php

    //1. buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","todolist");

    //2. cek koneksi dengan MySQL
    if (mysqli_connect_errno()) {
        echo "koneksi gagal:" . mysqli_connect_error();
        exit();
    } else{
        //echo 'koneksi berhasil';
    }

    //3. membaca data dari table mysql
    $query = "SELECT * FROM todo";
    
    //4. baca data hasil query 
    $todo = [];
      if ($result = mysqli_query($con,$query)){
        //ambil data satu per satu
        while($row=mysqli_fetch_assoc($result)){
          $todo[] = $row;
        }
      mysqli_free_result($result);
    }
    
    // tangkap data dari form yang udah disubmit
      if (isset($_POST['task'])) {
        $task = $_POST['task'];

      // membuat sql query untuk insert ke database dan jalankan
      $query = "INSERT INTO todo (task) values ('$task')";

      if (mysqli_query($con,$query)) {
          echo "data berhasil ditambahkan";
          header("Refresh:0");
      } else{
          echo "error ". mysqli_error($con);
      }
    }
    //4.tutup koneksi mysql
    mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>To do List</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet">
</head>
<body>
  <section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card rounded-3">
          <div class="card-body p-4">

            <h1 class="text-center my-3 pb-3">To Do App</h1>

            <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" action="" method="post">
              <div class="col-12">
                <div class="form-outline">
                  <input type="text" id="form1" class="form-control" name="task" placeholder="Enter a task here"/>
                </div>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>

            </form>

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Status</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php foreach($todo as $key=>$value): ?>
                  <th scope="row"><?php echo $key+1; ?></th>
                  <td><?php echo $value["task"]; ?></td>
                  <td><?php echo ($value['status'] == 0) ? "in progress": "finished";  ?></td>
                  <td>
                    <a href="<?php echo 'delete.php?id=' .$value['id']; ?>" type="submit" class="btn btn-danger">Delete</button>
                    <a href="<?php echo 'update.php?id=' .$value['id']; ?>" type="submit" class="btn btn-success ms-1">Finished</button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"></script>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>