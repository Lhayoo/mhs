<?php
include_once 'config/koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $koneksi->query("SELECT * FROM mahasiswa WHERE nim = '$id'");
    while ($mhs = $query->fetch_assoc()) :
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home | Alam</a>
        </div>
    </nav>
    <div class="container">
        <h3 class="text-center mb-5 mt-2">Edit Mahasiswa</h3>
        <form method="post">
            <div class="mb-3 row">
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="nim" name="nim" maxlength="13"
                        value="<?= $mhs['nim'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input class="form-check-input" type="radio" id="laki-laki" name="jenis_kelamin"
                        value="<?= $mhs['jenis_kelamin'] ?>"
                        <?= $mhs['jenis_kelamin'] == "laki-laki" ? 'checked' : '' ?>>
                    <label class="form-check-label" for="laki-laki">
                        Laki-laki
                    </label>
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan"
                        value="<?= $mhs['jenis_kelamin'] ?>"
                        <?= $mhs['jenis_kelamin'] == "perempuan" ? 'checked' : '' ?>>
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Juruasan</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="jurusan" name="program_studi">
                        <option selected value="<?= $mhs['program_studi'] ?>"><?= $mhs['program_studi'] ?></option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">sistem informasi</option>
                        <option value="Komputerisasi Akutansi">Komputerisasi Akutansi</option>
                        <option value="Management Akutansi">Management Akuntansi</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Udate</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    </div>
    <?php endwhile; ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
    if (isset($_POST['update'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jk = $_POST['jenis_kelamin'];
        $jurusan = $_POST['program_studi'];
        $query = $koneksi->query("UPDATE mahasiswa SET nama = '$nama', jenis_kelamin = '$jk', program_studi = '$jurusan' WHERE nim = '$id'");
        if ($query) {
            echo "<script>alert('Data berhasil diubah');</script>";
            echo "<script>location.href='index.php'</script>";
        } else {
            echo "<script>alert('Data gagal ditambahkan');</script>";
            echo "<script>location.href='prosestambah.php'</script>";
        }
    }
}
    ?>