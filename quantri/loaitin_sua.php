<style>
    .form-group .form-line {border-bottom:none}
    .form-group .form-control {padding:3px; border:1px solid #999}
    .form-group .form-line.abc {padding-top:5px;}


</style>
<?php
$row=null;
$idLT = $_GET['idLT']; settype($idLT,"int");
$kq = $qt->LoaiTin_ChiTiet($idLT);
if ($kq) $row = $kq->fetch_assoc();

if (isset($_POST['Ten'])){
    $Ten = $_POST['Ten'];
    $Ten_KD = $_POST['Ten_KhongDau'];
    $ThuTu = $_POST['ThuTu'];
    $AnHien = $_POST['AnHien'];
    $idTL = $_POST['idTL'];
    $lang = $_POST['lang'];
    $qt->LoaiTin_Sua($Ten, $Ten_KD, $ThuTu,$AnHien,$idTL, $idLT,$lang);
    echo "<script>document.location='index.php?p=loaitin_ds';</script>";
    exit();
}
?>


<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 center-block" style="float:none">
        <div class="card">
            <div class="header">
                <h2>
                    CHỈNH SỬA LOẠI TIN
                </h2>
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
                <form class="form-horizontal" method="post" action="">
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="Ten">Tên</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Ten" name="Ten" class="form-control" placeholder="Nhập tên loại tin" maxlength="20" minlength="3" required  value="<?=$row['Ten']?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="TenTL_KhongDau">TênTL không dấu</label> thành <label for="Ten_KhongDau">Tên không dấu</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="Ten_KhongDau" name="Ten_KhongDau" class="form-control" placeholder="Tên loại tin không dấu"   value="<?=$row['Ten_KhongDau']?>" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label for="ThuTu">Thứ tự</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="ThuTu" name="ThuTu" class="form-control" placeholder="Nhập thứ tự" required min="1" max="1000"  value="<?=$row['ThuTu']?>" >
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label>Ẩn hiện</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line abc">
                                    <input type="radio" id="AH1" name="AnHien" <?=($row['AnHien']==1)?"checked":""?> value="1" >
                                    <label for="AH1">Hiện</label>
                                    <input type="radio" id="AH0" name="AnHien" value="0" <?=($row['AnHien']==0)?"checked":""?> >
                                    <label for="AH0">Ẩn</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label>Ngôn ngữ</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line abc">
                                    <input type="radio" id="vi" name="lang" <?=($row['lang']=='vi')?"checked":""?> value="vi" >
                                    <label for="vi">Tiếng Việt</label>
                                    <input type="radio" id="en" name="lang" value="en" <?=($row['lang']=='en')?"checked":""?> >
                                    <label for="en">English</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-3 form-control-label">
                            <label>Thể loại</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <div class="form-line">
                                    <?php $listTL= $qt->ListTheLoai();?>
                                    <select class="form-control show-tick" name="idTL" id="idTL">
                                        <option value="0">-- Chọn Thể loại --</option>
                                        <?php while ($r = $listTL->fetch_assoc()) { ?>
                                            <?php if($r['idTL']==$row['idTL']) { ?>
                                                <option value="<?=$r['idTL']?>" selected><?=$r['TenTL']?></option>
                                            <?php } else { ?>
                                                <option value="<?=$r['idTL']?>"><?=$r['TenTL']?></option>
                                            <?php } //if?>

                                        <?php } ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">CẬP NHẬT LOẠI TIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>