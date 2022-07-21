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
    <!-- icont -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Home | Alam</a>
        </div>
    </nav>
    <div class="container">
        <h3 class="text-center mb-5 mt-2">Data Mahasiswa</h3>
        <a href="tambah.php" class="btn btn-primary mb-2"><i class="bi bi-person-plus"></i> Tambah data</a>
        <a href="cetak.php?print=1" class="btn btn-secondary mb-2"><i class="bi bi-printer"></i> Cetak Data</a>
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
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $query = $koneksi->query("SELECT * FROM mahasiswa");
                    while ($mhs = $query->fetch_assoc()) :
                    ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $mhs['nim'] ?></td>
                        <td><?= $mhs['jenis_kelamin'] ?></td>
                        <td><?= $mhs['nama'] ?></td>
                        <td><?= $mhs['program_studi'] ?></td>
                        <td>
                            <a href="hapus.php?id=<?= $mhs['nim'] ?>"
                                onclick="return confirm('Yakin ingin menghapus ?')" class="btn btn-danger"><i
                                    class="bi bi-trash3"></i> Hapus</a>
                            <a href="edit.php?id=<?= $mhs['nim'] ?>" class="btn btn-warning"><i
                                    class="bi bi-pencil-square "></i> Edit</a>
                        </td>
                    </tr>
                </tbody>
                <?php endwhile ?>
            </table>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>