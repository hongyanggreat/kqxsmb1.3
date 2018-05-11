<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$module = Yii::$app->controller->module->id;
?>
<!-- Phần danh mục nav -->
<div id="nav-menu" class="chu-vua">
    <ul>
        <li><a href="<?= $baseUrl ?>"><i style="width: 30px;text-align: center" class="fa fa-home"></i></a> </li>
        <li id="nyc-kqxs-open"><a>KQXS</a></li>
        <li id="nyc-choiso-open"><a>Chơi Online</a></li>
        <li id="nyc-thongkesoi-open"><a>PT & TK</a></li>
        <li  id="nyc-tienich-open"><a>Tiện ích</a></li>
    </ul>
</div>
<div class="nav-menu2 chu-vua">
    <marquee  align="center" direction="left" scrollamount="2" width="90%">
        Chào mừng bạn đến với SoicauXS.com!
    </marquee>
</div>
<div class="hieuung cantrai chu-nho">
    <!-- Phần kqxs -->
    <div style="display: none;" id="nyc-kqxs" class="ds-menu chu-nho cangiua">
        <p class="trang dam">
            <a href="<?= $baseUrl . 'ket-qua-xo-so-truc-tiep' . $suffix ?>">
                <?php
                $timeNow = time();
                $timeStart = strtotime(date("Y-m-d 18:15:00"));
                $timeEnd = strtotime(date("Y-m-d 18:45:00"));
                $checkTime = true;
                if ($timeNow >= $timeStart && $timeNow <= $timeEnd) {
                    echo 'ĐANG TRỰC TIẾP KQXS MIỀN BẮC';
                } else {
                    echo 'Thời gian tường thuật kết quả xổ số miền bắc đã kết thúc';
                }
                ?>
            </a>
        </p>
        <a href="<?= $baseUrl . 'ket-qua-xo-so-mien-bac' . $suffix ?>">Kết quả xổ số miền bắc</a>
    </div>

    <!-- Phần chơi online -->
    <div style="display: none;" id="nyc-choiso" class="ds-menu chu-nho">
        <p class="chu-nho trang dam">CHƠI LOTO ONLINE</p>
        <hr style="clear: both; width: 600px;margin: auto;border-color: white;clear: both;" class="w3-opacity">
        <div style="width: 95%; margin-left: 7px">
            <a href="<?= $baseUrl . 'choi-online' . $suffix ?>">Chơi online | </a>
            <a href="<?= $baseUrl . 'quay-thu-dien-toan' . $suffix ?>">Quay thử điện toán | </a>
            <a href="<?= $baseUrl . 'bang-chot-so-cao-thu' . $suffix ?>">Bảng chốt số cao thủ | </a>
            <a href="<?= $baseUrl . 'top-cao-thu-choi-cau' . $suffix ?>">Top cao thủ chơi cầu</a>
        </div>
    </div>
    <!-- Phần thống kê -->
    <div style="display: none;" id="nyc-thongkesoi" class="ds-menu chu-nho">
        <p class="chu-nho trang dam">TÍNH NĂNG PHÂN TÍCH VÀ THÔNG KÊ CẦU VIP</p>
        <hr style="clear: both; width: 600px;margin: auto;border-color: white;clear: both;" class="w3-opacity">
        <div style="width: 95%; margin-left: 7px">
            <a href="<?= $baseUrl . 'chu-ky' . $suffix ?>">Thống kê chu kỳ lô xuất hiện</a><br>
            <a href="<?= $baseUrl . 'chu-ky-dac-biet' . $suffix ?>">Thống kê đầu đuôi đặc biệt</a><br>
            <a href="<?= $baseUrl . 'loto-gan' . $suffix ?>">Thống kê lô gan</a><br>
            <!-- <a href="">Thống kê chu kỳ</a>
            <a href="">Thống kê tần số nhịp loto</a>
            <a href="">Thống kê tần xuất loto</a>
            <a href="">Thống kê tần xuất cặp loto</a>
            <a href="">Thống kê loto gan</a>
            <a href="">Thống kê đầu đuôi loto</a>
            <a href="">Thống kê chu kỳ đặc biệt</a>
            <a href="">Thống kê chu kỳ dàn đặc biệt</a>
            <a href="">Thống kê chu kỳ dàn loto</a>
            <a href="">Thống kê chu kỳ max dàn cùng về</a>
            <a href="">Bảng đặc biệt tuần</a>
            <a href="">Bảng đặc biệt tháng</a>
            <a href="">Bảng đặc biệt năm</a>
            <a href="">Thống kê dãi đặc biệt ngày mai</a>
            <a href="">Tạo phôi xổ số</a> -->
        </div>
    </div>

    <!-- Phần tiện ích -->
    <div style="display: none;" id="nyc-tienich" class="ds-menu chu-nho">
        <p class="chu-nho trang dam">CÁC TIỆN ÍCH VÀ BÀI VIẾT</p>
        <hr style="clear: both; width: 600px;margin: auto;border-color: white;clear: both;" class="w3-opacity">
        <div style="width: 95%; margin-left: 7px">
            <a href="<?= $baseUrl . 'so-mo' . $suffix ?>">Số mơ | </a>
            <a href="<?= $baseUrl . 'tin-tuc' . $suffix ?>">Tin tức xổ số | </a>
            <a href="<?= $baseUrl . 'kinh-nghiem' . $suffix ?>">Kinh nghiệm | </a>
        </div>
    </div>
</div>

<?php
if (Yii::$app->user->isGuest) {
    ?>
    <!-- Phần đăng nhập đăng ký -->
    <span class="btn-dndk chu-xnho">
        <a href="<?= $baseUrl . 'dang-nhap' . $suffix ?>">Đăng nhập</a> | <a href="<?= $baseUrl . 'dang-ky' . $suffix ?>">Đăng Ký</a>
    </span>
    <br><br>
    <p style="clear: both"><b class="do chu-vua">Vui lòng đăng nhập để tham gia khu chốt số admin!</b></p>
    <br>
    <?php
} else {
    $user = "";
    $user = Yii::$app->user->identity->USERNAME;
    ?>

    <div class="menu-dn chu-nho canphai">
        <a class="napvip" href="<?= $baseUrl . 'nap-vip' . $suffix ?>">Nạp vip</a>
        Thành viên: <a href="<?= $baseUrl . 'thong-tin-ca-nhan' . $suffix ?>"><?= $user ?></a> | 
        <a href="<?= $baseUrl . 'hop-thu' . $suffix ?>">Hộp thư <span class="hopthu" id="numberMessage"></span></a> | 
        <?=
        Html::a('Đăng xuất', null, [
            'data' => [
                'confirm' => 'Bạn có chắc muốn thoát?',
                'method' => 'post',
            ],
            'href' => "javascript:void(0);",
            'class' => "",
            'onclick' => 'logout()',
        ])
        ?>
        <br><br>
        <p class="chu-vua cangiua dam link-chotso"><a href="<?= $baseUrl . 'khu-chot-so' . $suffix ?>">Để tham gia khu chốt số admin xin mời bạn vào đây!</a></p>
        <br>
    </div>
    <?php
    ActiveForm::begin(['id' => 'formLogout', 'action' => $baseUrl . 'site/logout' . Yii::$app->params['suffix']]);
    ActiveForm::end();
    ?>
<?php } ?>
<script>

    function logout() {
        var result = confirm("Bạn có chắc muốn thoát?");
        if (result) {
            document.getElementById('formLogout').submit();
        }
    }
    
</script>
<?php 
    if(!Yii::$app->user->isGuest){

 ?>
<script>
    $(document).ready(function () {
        // var url = "https://drive.google.com/file/d/1H5-0osmW13bAdH2ULW68jaHLUi7S7QE5/view";
        // console.log(url);
       setInterval(function () {
        var url = "<?php echo $baseUrl . 'hopthu/numbermess' . $suffix; ?>";
        $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            data: {show: true},
            beforeSend: function () {

            },
            success: function (response) {
                if(response.numberMess == 0){
                    $('#numberMessage').hide();
                }else{
                    $('#numberMessage').show().html(response.numberMess);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }, 5000);
    });
</script>

<?php } ?>