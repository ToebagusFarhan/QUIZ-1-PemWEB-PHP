<?php
include_once("config.php");
$result = mysqli_query($conn, "SELECT * FROM cv_data ORDER BY id DESC");
$data = mysqli_fetch_array($result); // ambil data dari hasil eksekusi $result dan simpan ke variabel $data
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <div class="navtitle"><a class="navbar-brand">My Curriculum Vitae</a></div>
    <a class="btn btn-success" href="update.php">Update CV</a>
  </div>
</nav>

<div class="container p-3">
    <div class="image">
        <?php
            echo "<img src='".$data['foto_path']."'class='rounded mx-auto d-block' style='max-width:150px' alt=''>";
        ?>
    </div>
</div>

<div class="container-table p-5">
    <table class="table table-hover table-bordered">
        <tbody>
            <tr>
                <th>Nama</th>
                <td><?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $data['alamat']; ?></td>
            </tr>
            <tr>
                <th>Telepon</th>
                <td><?php echo $data['telepon']; ?></td>
            </tr>
            <tr>
                <th>Website</th>
                <td><?php echo $data['web']; ?></td>
            </tr>
            <tr>
                <th>Pendidikan</th>
                <td><?php echo $data['pendidikan']; ?></td>
            </tr>
            <tr>
                <th>Pengalaman Kerja</th>
                <td><?php echo $data['pengalaman_kerja']; ?></td>
            </tr>
            <tr>
                <th>Keterampilan</th>
                <td><?php echo $data['keterampilan']; ?></td>
            </tr>
        </tbody>
    </table>
</div>


</body>
</html>