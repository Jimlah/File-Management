<?php
session_start();
require('../public/config/config.php');

$data = new Database;

if (strlen($_SESSION['id']) == 0) {
    header('location:../index.php');
} else {

    echo $data->logOut();
   
} ?>