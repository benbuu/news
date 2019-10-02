<style>
    .form-group {margin-bottom:15px;}
    .form-group .form-line {border-bottom:none}
    .form-group .form-control {padding:3px; border:1px solid #999;}
    .form-group .form-line.abc {padding-top:5px;}
    .form-group .form-control{ background: #337ab7;
        border-radius: 6px; color:yellow; font-size:14px;letter-spacing:1px}
    .form-group .form-control::placeholder {color:white}
    #form_validation .col-md-4  {margin-bottom:0px;}

</style>
<?php

if (isset($_POST['TieuDe'])){
    $TD = $_POST['TieuDe'];
    $TD_KD = $_POST['TieuDe_KhongDau'];
    $TT = $_POST['TomTat'];
    $Ngay = $_POST['Ngay'];
    $AnHien = $_POST['AnHien'];
    $TNB = $_POST['TinNoiBat'];
    $idTL = $_POST['idTL'];
    $idLT = $_POST['idLT'];
    $urlHinh = $_POST['urlHinh'];
    $ND = $_POST['NoiDungTin'];
    $tags = $_POST['tags'];
    $lang = $_POST['lang'];
    $qt->Tin_Them($TD, $TD_KD, $TT,$Ngay, $AnHien, $TNB, $urlHinh, $ND, $idTL, $idLT, $tags, $lang);
    echo "<script>document.location='index.php?p=tin_ds';</script>";
    exit();
}


?>
<div class="row clearfix">
    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" style="margin:auto; float:none">
        <div class="card">
            <div class="header">
                <h2>THÊM TIN</h2>
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
                <form id="form_validation" method="POST">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="TieuDe" required maxlength="100" minlength="10"  placeholder="Tiêu đề tin">

                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="TieuDe_KhongDau" placeholder="Tiêu đề không dấu">
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="TomTat" cols="30" rows="5" class="form-control no-resize" placeholder="Tóm Tắt"></textarea>

                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" name="urlHinh" id="urlHinh" class="form-control" placeholder="Địa chỉ hình của tin">
                        </div>
                    </div>
                    <div class="row cleafix">
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="AnHien" id="AH0" value="0">
                                <label for="AH0">Ẩn</label>
                                <input type="radio" name="AnHien" id="AH1" value="1" checked>
                                <label for="AH1" class="m-l-20">Hiện</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="TinNoiBat" id="TNB0" value="0">
                                <label for="TNB0">Tin thường</label>
                                <input type="radio" name="TinNoiBat" id="TNB1" value="1" checked>
                                <label for="TNB1" class="m-l-20">Tin nổi bật</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-float">
                                <input type="radio" name="lang" id="vi" value="vi" checked>
                                <label for="vi">Tiếng Việt</label>
                                <input type="radio" name="lang" id="en" value="en" >
                                <label for="en" class="m-l-20">English</label>
                            </div>
                        </div>
                    </div>
                    <div class="row cleafix">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> <div class="form-line">
                                <?php $listTL= $qt->ListTheLoai();?>
                                <select class="form-control show-tick" name="idTL" id="idTL">
                                    <option value="0">-- Chọn Thể loại --</option>
                                    <?php while ($r = $listTL->fetch_assoc()) { ?>
                                    <option value="<?=$r['idTL']?>"><?=$r['TenTL']?></option>
                                    <?php } ?>
                                </select>
                            </div> </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"> <div class="form-line">
                                <select class="form-control show-tick" name="idLT" id="idLT">
                                    <option value="0">-- Chọn loại tin--</option>
                                    <option value="cc">dd</option>
                                </select>
                            </div> </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="NoiDungTin" cols="30" rows="10" class="form-control" required placeholder="Nội dung tin"></textarea>

                        </div>
                    </div>

                    <button class="btn btn-primary waves-effect" type="submit">THÊM TIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e) {
        $("#idTL").change(function(){
            var idTL=$(this).val();
            $("#idLT").load("news_layloaitin.php?idTL="+ idTL);
        });
    });
</script>
<script src="plugins/ckeditor/ckeditor.js"></script> <!--Có thể chèn trực tiếp từ net-->
<script>
    $(document).ready(function(e) {
        CKEDITOR.replace('NoiDungTin',{language:'vi', skin:'kama',
            filebrowserImageBrowseUrl:'plugins/ckfinder/ckfinder.html?Type=Images',
            filebrowserImageUploadUrl : 'plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        });

        CKEDITOR.config.height = 300;
    });
</script>
<script src=" plugins/ckfinder/ckfinder.js"></script>

