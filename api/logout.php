<?php
include '../config/route.php';
if(isset($_SESSION['access_token'])) {
    header('Location: '.$absoluteUrl);
}
session_destroy();
header('Location: '.$absoluteUrl.'login.php');
?>