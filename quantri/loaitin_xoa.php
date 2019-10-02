<?php
session_start();
require_once "../class/quantritin.php";
$qt = new quantritin;
$qt-> checkLogin ();
$idLT = $_GET['idLT']; settype($idLT,"int");
$kq = $qt->LoaiTin_Xoa($idLT);
header("location:index.php?p=loaitin_ds");
