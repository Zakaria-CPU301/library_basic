<?php
if ($_SESSION['user'][0]['role'] != 'admin') {
    header('location: /perpus/app/dashboard.php');
}