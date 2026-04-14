<?php
include '../../koneksi/koneksi.php';

$bukuId = $_GET['id'];

$queryDeleteBuku = $koneksi->query("DELETE FROM buku WHERE id = $bukuId");
if ($queryDeleteBuku) {
    header("location: tampil_buku.php");
    exit;
}
