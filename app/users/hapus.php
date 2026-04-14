<?php
include '../../koneksi/koneksi.php';

if (!isset($_GET['uid'])) {
    header('location: kelola_user.php');
}
$uid = $_GET['uid'];

$koneksi->query("DELETE FROM user WHERE id = $uid");

header('location: kelola_user.php');