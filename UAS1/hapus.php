<?php
include_once 'config/koneksi.php';
// delete data by id
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $koneksi->query("DELETE FROM mahasiswa WHERE nim = '$id'");
    if ($delete) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
        echo "<script>location='index.php';</script>";
    }
}