<?php
sesstion_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt-> checkLogin();

$idTL = $_GET['idTL']; settype($idTL,"int");
$kq = $qt->TheLoai_Xoa($idTL);
header("location:index.php?p=theloai_ds");
