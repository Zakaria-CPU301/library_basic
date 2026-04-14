<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$photo_profile = $_FILES['photo_profile'];
$nama_lengkap = $_POST['nama_lengkap'];
$username = $_POST['username'];
$email = $_POST['email'];
$role = $_POST['role'];
$password = $_POST['password'];

$ext = pathinfo($photo_profile['name'], PATHINFO_EXTENSION);
$imageHashName = md5($photo_profile['name']) . '.' . $ext;
move_uploaded_file($photo_profile['tmp_name'], '../images/' . $imageHashName);

$query = $koneksi->query("INSERT INTO user VALUES ('', '$nama_lengkap', '$username','$imageHashName', '$email', '$password',  '$role', 'active')");

if ($query) {
    header("location: kelola_user.php");
    exit;
}