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
    $sql1       = "delete from menu_resto where id = '$no'";
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
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                <b><font color="green"><h3>Edit Data</h3></font></b>
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=edit_data.php");//5 : detik
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=table_data.php");
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">Id Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jenis" class="col-sm-2 col-form-label">Jenis Menu</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenis" id="jenis">
                                <option value="">- Pilih Jenis -</option>
                                <option value="makanan" <?php if ($jenis == "makanan") echo "selected" ?>>Makanan</option>
                                <option value="minuman" <?php if ($jenis == "makanan") echo "selected" ?>>Minuman</option>
                                <option value="snack" <?php if ($jenis == "snack") echo "selected" ?>>Snack</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="ukuran" class="col-sm-2 col-form-label">Ukuran</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="ukuran" id="ukuran">
                                <option value="">- Pilih Jenis Ukuran -</option>
                                <option value="big" <?php if ($ukuran == "big") echo "selected" ?>>Big</option>
                                <option value="medium" <?php if ($ukuran == "medium") echo "selected" ?>>Medium</option>
                                <option value="small" <?php if ($ukuran == "small") echo "selected" ?>>Small</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Edit Data" class="btn btn-warning" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
