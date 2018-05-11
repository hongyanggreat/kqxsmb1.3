<?php
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];

$loading = "loading...";
$loading = '<strong class="imgloadig"></strong>';
?>

<style>
    .imgloadig {
        background: url(<?php echo $baseUrl ?>kqxs/icons/loading-green.gif) no-repeat;
        width: 16px;
        height: 18px;
        margin: auto;
        display: block;
        zoom: 1;
        padding: 2px 0;
    }
</style>
<!-- Bảng kqxs -->
<div id="bangkqxs" class="bangkqxs chu-nho">
    <div class="chu-vua danhmuc">
        Kết quả xổ số miền Bắc
    </div>
    <!-- phan show bang kqxs chon so ngay -->
    <form class="tuychonkqxs chu-xnho" onsubmit="return loadkq()">
        Ngày trong tuần:
        <select name="wday" id="wday" onchange="loadkq()" class="">
            <option value="0">Tất cả</option>
            <option value="2">Thứ 2</option>
            <option value="3">Thứ 3</option>
            <option value="4">Thứ 4</option>
            <option value="5">Thứ 5</option>
            <option value="6">Thứ 6</option>
            <option value="7">Thứ 7</option>
            <option value="1">Chủ nhật</option>
        </select> 
        &nbsp;Số ngày: <input type="text" class="loadkq" size="2" id="days" style="width:20px" value="3"> 
        &nbsp;Đến ngày: <input type="date" class="loadkq" id="ngaykq" size="8" value="<?= $date ?>" onchange="loadkq()">
        <label for="daudit">Tắt đầu đít:</label>&nbsp;<input type="checkbox"  name="kqxs_daudit" id="kqxs_daudit" >
        &nbsp;&nbsp;<input type="button" value=" Xem " class="button">
    </form>
   <div id="showKqxsmb">
        <?php 
            if($daudit){
                $divDaudit = "none";
            }else{
                $divDaudit = "block";
            }
            $lastDay = "";
            foreach ($ketquas as $key => $ketqua) {
                $lastDay = $ketqua['rs_date'];
                $time = strtotime($ketqua['rs_date']);
                $day =  date('l',$time);
                $fullDay =  Yii::$app->helper->nameDay($day).' '.date('d-m-Y',$time);
         ?>
        <table cellspacing="0" cellpadding="7" class="kqxs">
            <thead>
                <tr>
                    <th colspan="13">Mở thưởng ngày <?= $fullDay ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $arrLotoTrucTiep = [];
                ?>
                <tr>
                    <td width="20%">ĐB</td><td colspan="12" class="kq_0">
                        <?php
                        if (isset($ketqua['rs_0_0']) && $ketqua['rs_0_0']) {
                            echo $ketqua['rs_0_0'];
                            $arrLotoTrucTiep['kqdb'] = substr($ketqua['rs_0_0'], 3);
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td >Nhất</td>
                    <td colspan="12" class="kq_1">
                        <?php
                        if (isset($ketqua['rs_1_0']) && $ketqua['rs_1_0']) {
                            echo $ketqua['rs_1_0'];
                            $arrLotoTrucTiep[] = substr($ketqua['rs_1_0'], 3);
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td >Nhì</td>
                    <td colspan="6" class="kq_2">
                        <?php
                        if (isset($ketqua['rs_2_0']) && $ketqua['rs_2_0']) {
                            echo $ketqua['rs_2_0'];
                            $arrLotoTrucTiep[] = substr($ketqua['rs_2_0'], 3);
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="6" class="kq_3">
                        <?php
                        if (isset($ketqua['rs_2_1']) && $ketqua['rs_2_1']) {
                            echo $ketqua['rs_2_1'];
                            $arrLotoTrucTiep[] = substr($ketqua['rs_2_1'], 3);
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" >Ba</td>
                    <td colspan="4" class="kq_4">
                        <?php
                        if (isset($ketqua['rs_3_0']) && $ketqua['rs_3_0']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_3_0'], 3);
                            echo $ketqua['rs_3_0'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_5">
                        <?php
                        if (isset($ketqua['rs_3_1']) && $ketqua['rs_3_1']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_3_1'], 3);
                            echo $ketqua['rs_3_1'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_6">
                        <?php
                        if (isset($ketqua['rs_3_2']) && $ketqua['rs_3_2']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_3_2'], 3);
                            echo $ketqua['rs_3_2'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="kq_7">
                        <?php
                        if (isset($ketqua['rs_3_3']) && $ketqua['rs_3_3']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_3_3'], 3);
                            echo $ketqua['rs_3_3'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_8">
                        <?php
                        if (isset($ketqua['rs_3_4']) && $ketqua['rs_3_4']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_3_4'], 3);
                            echo $ketqua['rs_3_4'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_9">
                        <?php
                        if (isset($ketqua['rs_3_5']) && $ketqua['rs_3_5']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_3_5'], 3);
                            echo $ketqua['rs_3_5'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td >Tư</td>
                    <td colspan="3" class="kq_10">
                        <?php
                        if (isset($ketqua['rs_4_0']) && $ketqua['rs_4_0']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_4_0'], 2);
                            echo $ketqua['rs_4_0'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="3" class="kq_11">
                        <?php
                        if (isset($ketqua['rs_4_1']) && $ketqua['rs_4_1']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_4_1'], 2);
                            echo $ketqua['rs_4_1'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="3" class="kq_12">
                        <?php
                        if (isset($ketqua['rs_4_2']) && $ketqua['rs_4_2']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_4_2'], 2);
                            echo $ketqua['rs_4_2'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="3" class="kq_13">
                        <?php
                        if (isset($ketqua['rs_4_3']) && $ketqua['rs_4_3']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_4_3'], 2);
                            echo $ketqua['rs_4_3'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" >Năm</td>
                    <td colspan="4" class="kq_14">
                        <?php
                        if (isset($ketqua['rs_5_0']) && $ketqua['rs_5_0']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_5_0'], 2);
                            echo $ketqua['rs_5_0'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_15">
                        <?php
                        if (isset($ketqua['rs_5_1']) && $ketqua['rs_5_1']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_5_1'], 2);
                            echo $ketqua['rs_5_1'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_16">
                        <?php
                        if (isset($ketqua['rs_5_2']) && $ketqua['rs_5_2']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_5_2'], 2);
                            echo $ketqua['rs_5_2'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="kq_17">
                        <?php
                        if (isset($ketqua['rs_5_3']) && $ketqua['rs_5_3']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_5_3'], 2);
                            echo $ketqua['rs_5_3'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_18">
                        <?php
                        if (isset($ketqua['rs_5_4']) && $ketqua['rs_5_4']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_5_4'], 2);
                            echo $ketqua['rs_5_4'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_19">
                        <?php
                        if (isset($ketqua['rs_5_5']) && $ketqua['rs_5_5']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_5_5'], 2);
                            echo $ketqua['rs_5_5'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr><tr><td >Sáu</td>
                    <td colspan="4" class="kq_20">
                        <?php
                        if (isset($ketqua['rs_6_0']) && $ketqua['rs_6_0']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_6_0'], 1);
                            echo $ketqua['rs_6_0'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_21">
                        <?php
                        if (isset($ketqua['rs_6_1']) && $ketqua['rs_6_1']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_6_1'], 1);
                            echo $ketqua['rs_6_1'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="4" class="kq_22">
                        <?php
                        if (isset($ketqua['rs_6_2']) && $ketqua['rs_6_2']) {
                            $arrLotoTrucTiep[] = substr($ketqua['rs_6_2'], 1);
                            echo $ketqua['rs_6_2'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr><tr><td >Bảy</td>
                    <td colspan="3" class="kq_23">
                        <?php
                        if (isset($ketqua['rs_7_0']) && $ketqua['rs_7_0']) {
                            $arrLotoTrucTiep[] = $ketqua['rs_7_0'];
                            echo $ketqua['rs_7_0'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="3" class="kq_24">
                        <?php
                        if (isset($ketqua['rs_7_1']) && $ketqua['rs_7_1']) {
                            $arrLotoTrucTiep[] = $ketqua['rs_7_1'];
                            echo $ketqua['rs_7_1'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="3" class="kq_25">
                        <?php
                        if (isset($ketqua['rs_7_2']) && $ketqua['rs_7_2']) {
                            $arrLotoTrucTiep[] = $ketqua['rs_7_2'];
                            echo $ketqua['rs_7_2'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                    <td colspan="3" class="kq_26">
                        <?php
                        if (isset($ketqua['rs_7_3']) && $ketqua['rs_7_3']) {
                            $arrLotoTrucTiep[] = $ketqua['rs_7_3'];
                            echo $ketqua['rs_7_3'];
                        } else {
                            echo $loading;
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="bangdaudit chu-nho" id="bangdaudit" style="display: <?=$divDaudit?>">
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
                            <td class="dit_0">
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
                            <th width="10%" colspan="2">Đít</th>
                        </tr>
                    </thead>
                    <?php
                    for ($row = 0; $row < 10; $row++) {
                        ?>
                        <tr>
                            <td width="10%"><?= $row ?></td>
                            <td class="dit_0">
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
        <?php } ?>
    <span class="chu-nho btn-dndk re-mo showMoreKqxs" lastDay="<?= $lastDay ?>" showNumber="<?= $limit?>">Xem thêm <?= $limit?> kết quả</span>
   </div>
    <p style="clear: both;"></p><br>
    <span class="list-2"><a href="<?= $baseUrl . 'ket-qua-xo-so-mien-bac' . $suffix ?>">Kết quả xổ số miền bắc</a></span>
    <span class="list-2"><a href="<?= $baseUrl . 'ket-qua-xo-so-truc-tiep' . $suffix ?>">Kết quả xổ số miền bắc trực tiếp</a></span>
    <p style="clear: both;"></p><br>
</div>

<script>
        $(document).ready(function() {
            $('body').on('change', '.loadkq', function(event) {
                if($('form').hasClass('in')){
                    alert("Bạn thay đổi quá nhanh.");
                    return;
                }
                var inputDate =$('form').find('#ngaykq');
                event.preventDefault();
                var days = $('form').find('#days').val();
                var dateRs = inputDate.val();
                var daudit = 0;
                if ($('#kqxs_daudit').is(':checked')) {
                    daudit = 1;
                }
                var url = "<?php echo $baseUrl . 'kqxsmb/kqxsdate' . $suffix; ?>";
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "html",
                    data: {date: dateRs,limit:days,daudit:daudit},
                    beforeSend: function () {
                        $('form').addClass('in');
                        inputDate.attr('readonly', 'true');
                    },
                    success: function (response) {
                        // console.log(response);
                        if(response !=""){
                            $('#showKqxsmb').html(response);
                        }
                        $('form').removeClass('in');
                        inputDate.removeAttr('readonly');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("LOI XAY RA");
                        console.log(textStatus, errorThrown);
                    }
                });
            });
            $('body').on('click', '#kqxs_daudit', function(event) {
                if (!$('#kqxs_daudit').is(':checked')) {
                    $('.bangdaudit').slideDown();
                }else{
                    $('.bangdaudit').slideUp();
                }
                
            });
            $('body').on('click', '.showMoreKqxs', function(event) {
                $(this).remove();
                var lastDay = $(this).attr('lastDay');
                var showNumber = $(this).attr('showNumber');
                var daudit = 0;
                if ($('#kqxs_daudit').is(':checked')) {
                    daudit = 1;
                }
                var url = "<?php echo $baseUrl . 'kqxsmb/morekqxs' . $suffix; ?>";
               
                $.ajax({
                    url: url,
                    type: "get",
                    dataType: "html",
                    data: {date: lastDay,limit:showNumber,daudit:daudit},
                    beforeSend: function () {
                        //$(this).removeClass('showMoreKqxs');
                    },
                    success: function (response) {
                        // console.log(response);
                        if(response !=""){
                            $('#showKqxsmb').append(response);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("LOI XAY RA");
                        console.log(textStatus, errorThrown);
                    }
                });
            });
        });
        
</script>