<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$auth = $_SESSION['user'][0];
$idu = $auth['id'];

$idb = $_GET['idb'];
date_default_timezone_set('Asia/Jakarta');
$start = new DateTime($_POST['start']);
$finish = new DateTime($_POST['finish']);

$waktu_pinjam = $start->format('Y-m-d H:i:s');
$waktu_kembali = $finish->format('Y-m-d H:i:s');
if ($finish < $start) {
    include $_SERVER['DOCUMENT_ROOT'] . '/perpus/middleware/auth.php';
    $_SESSION['error'] = 'Waktu pengembalian tidak valid';

    header('location: ../barang/detail-barang.php?idb=' . $idb);
} else {
    $queryPeminjaman = $koneksi->query("INSERT INTO peminjaman VALUES ('', '$waktu_pinjam', '$waktu_kembali', 'menunggu', $idu, $idb, 1)");

    header("location: ../peminjaman/history.php");
}
