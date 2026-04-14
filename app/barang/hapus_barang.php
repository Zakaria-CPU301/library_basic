<?php
include '../../koneksi/koneksi.php';

$barangId = $_GET['id'];

$queryDeletebarang = $koneksi->query("DELETE FROM barang WHERE id = $barangId");
if ($queryDeletebarang) {
    header("location: tampil_barang.php");
    exit;
}
