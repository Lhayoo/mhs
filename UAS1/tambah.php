<?php
include_once 'config/koneksi.php';
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
        <h3 class="text-center mb-5 mt-2">Tambah Mahasiswa</h3>
        <?php if (isset($_SESSION['validate'])) : ?>
        <div class="alert alert-danger"><?= $_SESSION['validate'] ?></div>
        <?php unset($_SESSION['validate']) ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
        <?php unset($_SESSION['success']) ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['failed'])) : ?>
        <div class="alert alert-danger"><?= $_SESSION['failed'] ?></div>
        <?php unset($_SESSION['failed']) ?>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="nim" maxlength="13">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPassword" name="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input class="form-check-input" type="radio" id="flexRadioDefault1" name="jenis_kelamin"
                        value="laki-laki">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-laki
                    </label>
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1"
                        value="perempuan">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Perempuan
                    </label>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Juruasan</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="program_studi">
                        <option value="" selected>Pilih Jurusan</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">sistem informasi</option>
                        <option value="Komputerisasi Akutansi">Komputerisasi Akutansi</option>
                        <option value="Management Akutansi">Management Akuntansi</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $program_studi = $_POST['program_studi'];
    $query = $koneksi->query("INSERT INTO mahasiswa (nim, nama, jenis_kelamin, program_studi) VALUES ('$nim', '$nama', '$jenis_kelamin', '$program_studi')");
    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan');</script>";
        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
        echo "<script>location.href='prosestambah.php'</script>";
    }
}
?>