<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "rumah_makan";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$id        = "";
$nama   ="";
$jenis       = "";
$ukuran     = "";
$harga   = "";
$sukses ="";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $no         = $_GET['no'];
    $sql1       = "delete from menu_resto where no = '$no'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $no         = $_GET['no'];
    $sql1       = "select * from menu_resto where no = '$no'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $id        = $r1['id'];
    $nama       = $r1['nama'];
    $jenis     = $r1['jenis'];
    $ukuran   = $r1['ukuran'];
    $harga   = $r1['harga'];

    if ($id == '') {
        $error = "Data tidak ditemukan";
    }
}
if (isset($_POST['simpan'])) { //untuk create
    $id        = $_POST['id'];
    $nama       = $_POST['nama'];
    $jenis     = $_POST['jenis'];
    $ukuran     = $_POST['ukuran'];
    $harga   = $_POST['harga'];

    if ($id && $nama && $jenis && $ukuran && $harga) {
        if ($op == 'edit') { //untuk update
            $sql1       = "update menu_resto set id = '$id',
                                                    nama='$nama',
                                                    jenis = '$jenis',
                                                    ukuran='$ukuran',
                                                    harga='$harga' where no = '$no'";
            $q1         = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error  = "Data gagal diupdate";
            }
        } else { //untuk insert
            $sql1   = "insert into menu_resto(id,nama,jenis,ukuran,harga) values ('$id','$nama','$jenis','$ukuran','$harga')";
            $q1     = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses     = "Berhasil memasukkan data baru";
            } else {
                $error      = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silakan masukkan semua data";
    }
}
?>

<?php 
 
session_start();
 
if (!isset($_SESSION['nama'])) {
    header("Location: ../login/login.php");
}
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>

<body>
        
    <div class="mx-auto">
        <div class="card">
        <p>
        <br><button class="btn btn-info">
        <a href="simpan_data.php">    
        <font color="black"><b>Input data</b></font></a></button>

        <button class="btn btn-warning">
        <a href="profil.php">    
        <font color="black"><b>Profil</b></font></a></button>
        
        <button class="btn btn-success">
        <a href="logout.php">    
        <font color="white"><b>Logout</b></font></a></button>
        </p>
            <div class="card-header text-white bg-secondary">
                <h3>Menu Rumah Makan Triyumo</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr align="center">
                            <th scope="col">No</th>
                            <th scope="col">Id Menu</th>
                            <th scope="col">Nama Menu</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Ukuran</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from menu_resto order by no desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $no         = $r2['no'];
                            $id         = $r2['id'];
                            $nama       = $r2['nama'];
                            $jenis     = $r2['jenis'];
                            $ukuran   = $r2['ukuran'];
                            $harga   = $r2['harga'];

                        ?>
                            <tr align="center">
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $id ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $jenis ?></td>
                                <td scope="row"><?php echo $ukuran ?></td>
                                <td scope="row"><?php echo $harga ?></td>
                                <td scope="row">
                                    <a href="edit_data.php?op=edit&no=<?php echo $no?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="table_data.php?op=delete&no=<?php echo $no?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-primary">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</body>

</html>
