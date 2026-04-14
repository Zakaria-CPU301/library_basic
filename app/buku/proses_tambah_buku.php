<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$cover = $_FILES['cover'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$status = $_POST['status'];
$qty = $_POST['qty'];
$kategori = $_POST['kategori'];
$sinopsis = $_POST['sinopsis'];

$ext = pathinfo($cover['name'], PATHINFO_EXTENSION);
$imageHashName = md5($cover['name']) . '.' . $ext;
move_uploaded_file($cover['tmp_name'], '../images/' . $imageHashName);

$query = $koneksi->query("INSERT INTO buku VALUES ('', '$judul', '$imageHashName','$pengarang', '$status', $qty,  '$sinopsis', $kategori)");

if ($query) {
    header("location: tampil_buku.php");
    exit;
}