<?php
include '../../middleware/auth.php';
include '../../koneksi/koneksi.php';

$kid = $_GET['kid'];

$koneksi->query("DELETE FROM kategori WHERE id = $kid");

header("location: kelola_kategori.php");
