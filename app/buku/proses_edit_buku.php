<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$bukuId = $_GET['id'];

$pathImage = $_FILES['cover'];
$ext = pathinfo($pathImage['name'], PATHINFO_EXTENSION);
$imageHashName = md5($pathImage['name']) . '.' . $ext;
move_uploaded_file($pathImage['tmp_name'], '../images/' . $imageHashName);

$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$qty = $_POST['qty'];
$status = $_POST['status'];
$kategori = $_POST['kategori'];

$queryUpdateBuku = $koneksi->query("UPDATE buku SET judul = '$judul', status = '$status', pengarang = '$pengarang', qty = $qty, id_kategori = $kategori, cover = '$imageHashName' WHERE id = $bukuId");
if ($queryUpdateBuku) {
    header("location: tampil_buku.php");
    exit;
}
