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
    <script type="text/javascript">
    <?php
        if (isset($_GET['print'])) {

        ?>
    window.print();

    <?php
        } ?>
    </script>
</head>

<body>
    <div class="container">
        <h3 class="text-center mb-5 mt-2">Data Mahasiswa</h3>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Program Studi</th>
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