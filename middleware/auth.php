<?php
session_start();
if (empty($_SESSION['user'])) {
    header('location: /perpus/auth/login.php');
}