<?php

$idTL=-1;
if (isset($_GET['idTL'])==true) $idTL=$_GET['idTL'];
settype($idTL,"int");
$idLT=-1;
if (isset($_GET['idLT'])==true) $idLT=$_GET['idLT'];
settype($idLT,"int");

$kq = $qt->ListTin( $idTL  , $idLT );
?>

<div class="container-fluid">

    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        QUẢN TRỊ TIN
                    </h2>
                    
                    <form method="get" action="" class="bg-info p-t-10 p-b-10 p-l-10">
                        <input name="p" type="hidden" value="tin_ds">
                        <?php $listTL= $qt->ListTheLoai();?>
                        <select class="btn btn-success" id="idTL" name="idTL" onchange="this.form.idLT.value=-1; this.form.submit();">
                        <option value=-1>Chọn thể loại</option>
                        <?php while ($r= $listTL->fetch_assoc()){ ?>
                        <?php if ($r['idTL']==$_GET['idTL']) { ?>
                        <option value="<?=$r['idTL']?>" selected> <?=$r['TenTL']?> </option>
                        <?php } else {?>
                        <option value="<?=$r['idTL']?>"> <?=$r['TenTL']?> </option>
                        <?php } ?>
                        <?php } ?>
                        </select>

                        <?php $listLT= $qt->ListLoaiTin();?>
                        <select class="btn btn-primary" id="idLT" name="idLT" onchange="this.form.idTL.value=-1; this.form.submit();">
                        <option value=-1>Chọn loại tin</option>
                        <?php while ($r= $listLT->fetch_assoc()){ ?>
                            <?php if ($r['idLT']==$_GET['idLT']) { ?>
                            <option value="<?=$r['idLT']?>" selected> <?=$r['Ten']?> </option>
                            <?php } else {?>
                            <option value="<?=$r['idLT']?>">  <?=$r['Ten']?> </option>
                            <?php } //if ?>
                        <?php } //while ?>
                        </select>

                    </form>

                    

                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>idTin/Ngay</th>
                                <th>Tiêu đề/Tóm tắt</th>
                                <th>Cập nhật/Xóa</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php while ($rowTin = $kq->fetch_assoc() ) { ?>
                            <tr>
                                <td>
                                    <p>idTin: <?=str_pad($rowTin['idTin'], 3, '0', STR_PAD_LEFT)?> </p>
                                    <p><?=date('d/m/Y',strtotime($rowTin['Ngay']))?></p>
                                    <p>Xem <?=$rowTin['SoLanXem']?></p>

                                </td>
                                <td>
                                    <h4><?=$rowTin['TieuDe']?>  <span>( <?=$rowTin['TenTL']?> / <?=$rowTin['Ten']?>)</span></h4>
                                    <p><?=$rowTin['TomTat']?></p>

                                </td>
                                <td>
                                    <p>
                                        <a href="?p=tin_sua&idTin=<?=$rowTin['idTin']?>" class="btn bg-blue waves-effect">Chinh</a> &nbsp;
                                        <a href="tin_xoa.php?idTin=<?=$rowTin['idTin']?>" class="btn bg-red waves-effect" onClick="return confirm('Xóa hả')">Xóa</a>
                                    </p>
                                    <p> <?=($rowTin['AnHien']==1)?"Đang hiện":"Đang ẩn"?> </p>
                                    <p> <?=($rowTin['TinNoiBat']==1)?"Tin nổi bật":"Tin thường"?> </p>

                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
    <!-- Exportable Table -->
    <!-- #END# Exportable Table -->
</div>

<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- JQuery DataTable Css -->
<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
<!-- Jquery DataTable Plugin Js -->
<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Custom Js -->
<script src="js/pages/tables/jquery-datatable.js"></script>

