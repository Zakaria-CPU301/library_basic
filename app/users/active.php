<?php
include '../../koneksi/koneksi.php';

if (!isset($_GET['uid'])) {
    header('location: kelola_user.php');
}
$uid = $_GET['uid'];

$koneksi->query("UPDATE user SET status = 'active' WHERE id = $uid");

header('location: kelola_user.php');