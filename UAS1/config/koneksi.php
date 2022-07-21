<?php
include 'config/constant.php';
$koneksi = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($koneksi->connect_errno) {
    echo "Koneksi Gagal : " . $koneksi->connect_error;
}