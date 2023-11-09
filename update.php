<?php
if (isset($_POST["update"])) {
//     $id =1;
//     $nama = $_POST["nama"];
//     $alamat = $_POST["alamat"];
//     $telepon = $_POST["telp"];
//     $email = $_POST["email"];
//     $website = $_POST["website"];
//     $pendidikan = $_POST["pendidikan"];
//     $p_kerja = $_POST["pengalaman_kerja"];
//     $keterampilan = $_POST["keterampilan"];

//   //gunakan file config.php
//   include_once("config.php");

//   //update data menggunakan query
//   $result = mysqli_query($conn, "UPDATE cv_data SET nama='$nama',alamat='$alamat',telepon='$telepon', email='$email', web='$website',pendidikan='$pendidikan', pengalaman_kerja='$p_kerja',keterampilan='$keterampilan'  WHERE id=$id");

//   //redirect ke halaman index
//   header("Location: index.php");

//ini baru aman
$id = 1; 
$nama = $_POST["nama"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telp"];
$email = $_POST["email"];
$website = $_POST["website"];
$pendidikan = $_POST["pendidikan"];
$p_kerja = $_POST["pengalaman_kerja"];
$keterampilan = $_POST["keterampilan"];
$foto_path = $_POST["foto"];


include_once("config.php");


$stmt = mysqli_prepare($conn, "UPDATE cv_data SET nama=?, alamat=?,telepon=?, email=?, web=?, pendidikan=?, pengalaman_kerja=?, keterampilan=?, foto_path=? WHERE id=?");


mysqli_stmt_bind_param($stmt, "sssssssssi", $nama, $alamat, $telepon, $email, $website, $pendidikan, $p_kerja, $keterampilan, $foto_path, $id);


if (mysqli_stmt_execute($stmt)) {
    // Update was successful
    header("Location: index.php");
    exit();
} else {
    // Update failed
    echo "Update failed: " . mysqli_error($conn);
}


mysqli_stmt_close($stmt);
mysqli_close($conn);


}
?>

<?php
//gunakan file config.php
include_once("config.php");

//ambil data dan simpan kedalam variabel result
$result = mysqli_query($conn, "SELECT * FROM cv_data");

//masukan result ke variabel masing-masing
$data = mysqli_fetch_array($result);
$id = $data['id'];
$nama = $data['nama'];
$alamat = $data['alamat'];
$telepon = $data['telepon'];
$email = $data['email'];
$website = $data['web'];
$pendidikan = $data['pendidikan'];
$p_kerja = $data['pengalaman_kerja'];
$keterampilan = $data['keterampilan'];
$foto_path = $data['foto_path'];

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
    <a class="btn btn-success order-1" href="index.php">Back to CV</a>
    <div class="mx-auto order-2">
        <a class="navbar-brand">Updating my CV</a>
    </div>
  </div>
</nav>


<div class="container-table p-5">
    <form action="update.php" method="post">
        <table class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="nama" class="form-control" placeholder= " <?php echo $nama?>" required></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><input type="text" name="alamat" class="form-control" placeholder="<?php echo $alamat?>" required></td>
                </tr>
                <tr>
                    <th>Telepon</th>
                    <td><input type="text" name="telp" class="form-control" placeholder= "<?php echo $telepon?>" required></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email" class="form-control" placeholder= "<?php echo $email?>" required></td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td><input type="text" name="website" class="form-control" placeholder= "<?php echo $website?>" required></td>
                </tr>
                <tr>
                    <th>Pendidikan</th>
                    <td><input type="text" name="pendidikan" class="form-control" placeholder= "<?php echo $pendidikan?>" required></td>
                </tr>
                <tr>
                    <th>Pengalaman Kerja</th>
                    <td><input type="text" name="pengalaman_kerja" class="form-control" placeholder= "<?php echo $p_kerja?>" required></td>
                    <!-- <td><textarea name="pengalaman_kerja" id="pengalaman_kerja" cols="50" rows="2" placeholder= "<?php echo $p_kerja?>" required></textarea></td> -->
                </tr>
                <tr>
                    <th>Keterampilan</th>
                    <td><input type="text" name="keterampilan" class="form-control" placeholder= "<?php echo $keterampilan?>" required></td>
                    
                    
                </tr>
                <tr>
                    <th>Foto Path</th>
                    <td><input type="text" name="foto" class="form-control" placeholder= "<?php echo $foto_path?>" required></td>
                </tr>
            </tbody>
        </table>
        <td><button class="btn btn-success" type="submit" name="update">Simpan Update</button></td>
    </form>
</div>

</body>
</html>