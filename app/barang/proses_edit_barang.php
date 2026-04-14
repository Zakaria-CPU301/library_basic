<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$barangId = $_GET['id'];

$pathImage = $_FILES['alamat_gambar'];
$ext = pathinfo($pathImage['name'], PATHINFO_EXTENSION);
$imageHashName = md5($pathImage['name']) . '.' . $ext;
move_uploaded_file($pathImage['tmp_name'], '../gambar/' . $imageHashName);

$nama_barang = $_POST['nama_barang'];
$pengarang = $_POST['pengarang'];
$qty = $_POST['qty'];
$status = $_POST['status'];
$kategori = $_POST['kategori'];

$queryUpdatebarang = $koneksi->query("UPDATE barang SET nama_barang = '$nama_barang', status = '$status', pengarang = '$pengarang', qty = $qty, id_kategori = $kategori, alamat_gambar = '$imageHashName' WHERE id = $barangId");
if ($queryUpdatebarang) {
    header("location: tampil_barang.php");
    exit;
}
