<?php
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];

$loading = "loading...";
$loading = '<strong class="imgloading"></strong>';
?>

<style>
    .imgloading {
        background: url(<?php echo $baseUrl ?>kqxs/icons/loading-green.gif) no-repeat;
        width: 16px;
        height: 18px;
        margin: auto;
        display: block;
        zoom: 1;
        padding: 2px 0;
    }
</style>
<div id="bangkqxs" class="bangkqxs chu-nho">
    <div class="chu-vua danhmuc">
        Quay thử kết quả Miền bắc
    </div><br>
    <button class="w3-btn w3-small w3-ripple w3-red" id="quaythu" check="true" type="submit">Quay thử</button><br><br>
    <div class="showKetQuaQuayThu">
        <!-- Bang ket qu xs -->
        <table cellspacing="0" cellpadding="7" class="kqxs">
            <thead>
                <tr>
                    <th colspan="13">Mở thưởng ngày <?= Yii::$app->helper->nameDay(date('l')) . ' ' . date('d-m-Y') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $arrLotoTrucTiep = [
                    'rs_0_0' => $loading,
                    'rs_1_0' => $loading,
                    'rs_2_0' => $loading,
                    'rs_2_1' => $loading,
                    'rs_3_0' => $loading,
                    'rs_3_1' => $loading,
                    'rs_3_2' => $loading,
                    'rs_3_3' => $loading,
                    'rs_3_4' => $loading,
                    'rs_3_5' => $loading,
                    'rs_4_0' => $loading,
                    'rs_4_1' => $loading,
                    'rs_4_2' => $loading,
                    'rs_4_3' => $loading,
                    'rs_5_0' => $loading,
                    'rs_5_1' => $loading,
                    'rs_5_2' => $loading,
                    'rs_5_3' => $loading,
                    'rs_5_4' => $loading,
                    'rs_5_5' => $loading,
                    'rs_6_0' => $loading,
                    'rs_6_1' => $loading,
                    'rs_6_2' => $loading,
                    'rs_7_0' => $loading,
                    'rs_7_1' => $loading,
                    'rs_7_2' => $loading,
                    'rs_7_3' => $loading,
                ];
                ?>
                <tr>
                    <td width="20%">ĐB</td><td colspan="12" class="kq_0" id="rs_0_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Nhất</td>
                    <td colspan="12" class="kq_1" id="rs_1_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Nhì</td>
                    <td colspan="6" class="kq_2" id="rs_2_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="6" class="kq_3" id="rs_2_1">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">Ba</td>
                    <td colspan="4" class="kq_4" id="rs_3_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_5" id="rs_3_1">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_6" id="rs_3_2">
                        <?php echo $loading; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="kq_7" id="rs_3_3">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_8" id="rs_3_4">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_9" id="rs_3_5">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Tư</td>
                    <td colspan="3" class="kq_10" id="rs_4_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="3" class="kq_11" id="rs_4_1">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="3" class="kq_12" id="rs_4_2">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="3" class="kq_13" id="rs_4_3">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">Năm</td>
                    <td colspan="4" class="kq_14" id="rs_5_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_15" id="rs_5_1">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_16" id="rs_5_2">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="kq_17" id="rs_5_3">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_18" id="rs_5_4">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_19" id="rs_5_5">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr><tr><td>Sáu</td>
                    <td colspan="4" class="kq_20" id="rs_6_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_21" id="rs_6_1">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="4" class="kq_22" id="rs_6_2">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr><tr><td>Bảy</td>
                    <td colspan="3" class="kq_23" id="rs_7_0">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="3" class="kq_24" id="rs_7_1">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="3" class="kq_25" id="rs_7_2">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                    <td colspan="3" class="kq_26" id="rs_7_3">
                        <?php
                        echo $loading;
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="bangdaudit chu-nho">
            <div style="width: 50%;float: left;">
                <!-- Phần đầu số -->
                <table class="dau" cellspacing="0" cellpadding="3">
                    <tbody>
                    <thead>
                        <tr>
                            <th colspan="2">Đầu</th>
                        </tr>
                    </thead>
                    <?php
                    for ($row = 0; $row < 10; $row++) {
                        ?>
                        <tr>
                            <td width="10%"><?= $row ?></td>
                            <td>
                                <strong class="imgloading duoiLoto<?= $row ?>"></strong>
                                <?php
                                // print_r($arrLotoTrucTiep);
                                for ($i = 0; $i < 10; $i++) {
                                    if (in_array($row . $i, $arrLotoTrucTiep)) {
                                        echo $row . $i . '; ';
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div style="width: 50%;float: left;">
                <!-- Phần đuôi số -->
                <table class="duoi" cellspacing="0" cellpadding="3">
                    <tbody>
                    <thead>
                        <tr>
                            <th colspan="2">Đuôi</th>
                        </tr>
                    </thead>
                    <?php
                    for ($row = 0; $row < 10; $row++) {
                        ?>
                        <tr>
                            <td width="10%"><?= $row ?></td>
                            <td>
                                <strong class="imgloading duoiLoto<?= $row ?>"></strong>
                                <?php
                                // print_r($arrLotoTrucTiep);
                                for ($i = 0; $i < 10; $i++) {
                                    if (in_array($i . $row, $arrLotoTrucTiep)) {
                                        echo $i . $row . '; ';
                                    }
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p style="clear: both;"></p>

        <table cellspacing="0" cellpadding="5" class="loto" id="loto_mb">
            <thead>
                <tr>
                    <th colspan="9">Lô tô</td>
                </tr>
            </thead>
            <tbody style="font-weight:bold;">

                <?php
                // $arrLotoTrucTiep = krsort($arrLotoTrucTiep);
                asort($arrLotoTrucTiep);

                $num_item = 9; //we set number of item in each col
                $current_col = 0;
                $v = '';
                foreach ($arrLotoTrucTiep as $key => $val) {

                    if ($current_col == 0) {
                        $v .= '<tr>';
                    }
                    //$image = preg_replace('/images/','_thumbs/Images',$p->image);
                    if ($key === "kqdb") {

                        $v .= ' <td class="active do">' . $val . '</td>';
                    } else {
                        $v .= ' <td>' . $val . '</td>';
                    }
                    if ($current_col == $num_item - 1) { // Close the row if $current_col equals to 2 in the example  ($num_cols -1)
                        $current_col = 0;
                        $v .= '</tr>';
                    } else {
                        $current_col++;
                    }
                }
                $v .= '</div>';
                echo $v;
                ?>

            </tbody>
        </table>
        <p style="clear: both;"></p>
        <span class="list-2"><a href="<?= $baseUrl . 'choi-online' . $suffix ?>">Chơi online</a></span>
        <span class="list-2"><a href="<?= $baseUrl . 'quay-thu-dien-toan' . $suffix ?>">Quay thử điện toán</a></span>
        <span class="list-2"><a href="<?= $baseUrl . 'bang-chot-so-cao-thu' . $suffix ?>">Bảng chốt số cao thủ</a></span>
        <span class="list-2"><a href="<?= $baseUrl . 'top-cao-thu-choi-cau' . $suffix ?>">Top cao thu chơi cầu</a></span>
        <p style="clear: both;"></p><br>
    </div>
</div>
<script>

    $(document).ready(function () {
        var dfd = $.Deferred();
        $('body').on('click', '#quaythu', function (event) {
            event.preventDefault();
            var url = "<?php echo $baseUrl . 'quaythu/process' . $suffix; ?>";
            var check = $(this).attr('check');
            if (check == "true") {
                $(this).attr('check', 'false');
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "html",
                    // data: {},
                    beforeSend: function () {

                    },
                    success: function (response) {
                        func1().then(func2);
                        $('.showKetQuaQuayThu').html(response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }

        });

        var func1 = function () {
            var deferred = $.Deferred();
            window.setTimeout(function () {
                var arrayRs = ["rs_0_0", "rs_1_0", "rs_2_0", "rs_2_1", "rs_3_0", "rs_3_1", "rs_3_2", "rs_3_3", "rs_3_4", "rs_3_5", "rs_4_0", "rs_4_1", "rs_4_2", "rs_4_3", "rs_5_0", "rs_5_1", "rs_5_2", "rs_5_3", "rs_5_4", "rs_5_5", "rs_6_0", "rs_6_1", "rs_6_2", "rs_7_0", "rs_7_1", "rs_7_2", "rs_7_3"];
                var time = 500;
                $.each(arrayRs, function (index, value) {
                    setTimeout(function () {
                        $('.imgloading.' + value).remove();
                        $('.' + value).fadeIn();
                    }, time)
                    time += 500;

                });
                deferred.resolve();
            }, 500);
            return deferred.promise();
        }

        var func2 = function () {
            var deferred = $.Deferred();
            var time = 500;
            window.setTimeout(function () {

                var time = 500;
                for (i = 0; i < 10; i++) {
                    (function (i) {
                        setTimeout(function () {
                            $('.imgloading.dauLoto' + i).remove();
                            $('.dauLoto' + i).fadeIn();
                            $('.imgloading.duoiLoto' + i).remove();
                            $('.duoiLoto' + i).fadeIn();
                            if (i == (10 - 1)) {
                                $('.imgloading.lotoTructiep').remove();
                                $('.lotoTructiep').fadeIn();
                                $('#quaythu').attr('check', 'true');
                            }
                        }, time);
                    }(i));
                    time += 500;
                }

                deferred.resolve();
            }, 13500);
            return deferred.promise();
        }
        // var func3 = function(){
        //   var deferred = $.Deferred();
        //   var time = 500;
        //   window.setTimeout(function(){

        //         $('.imgloading.lotoTructiep').remove();
        //         $('.lotoTructiep').fadeIn();

        //         deferred.resolve();
        //     }, 13500);
        //   return deferred.promise();
        // }


    });
</script>