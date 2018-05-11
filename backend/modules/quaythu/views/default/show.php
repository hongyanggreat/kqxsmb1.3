<!-- Bang ket qu xs -->
<?php
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];

$loading = "loading...";
$loading = '<strong class="imgloading"></strong>';
?>
<!-- Bang ket qu xs -->
<table cellspacing="0" cellpadding="7" class="kqxs">
    <thead>
        <tr>
            <th colspan="13">Mở thưởng ngày <?= Yii::$app->helper->nameDay(date('l')) . ' ' . date('d-m-Y') ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $arrLotoTrucTiep = [];
        ?>
        <tr>
            <td>ĐB</td><td colspan="12" class="kq_0" id="rs_0_0">
                <strong class="imgloading rs_0_0"></strong>
                <strong class="rs_0_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_0_0']) && $ketqua['rs_0_0']) {
                        echo $ketqua['rs_0_0'];
                        $arrLotoTrucTiep['kqdb'] = substr($ketqua['rs_0_0'], 3);
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td>Nhất</td>
            <td colspan="12" class="kq_1" id="rs_1_0">
                <strong class="imgloading rs_1_0"></strong>
                <strong class="rs_1_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_1_0']) && $ketqua['rs_1_0']) {
                        echo $ketqua['rs_1_0'];
                        $arrLotoTrucTiep['rs_1_0'] = substr($ketqua['rs_1_0'], 3);
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td>Nhì</td>
            <td colspan="6" class="kq_2" id="rs_2_0">
                <strong class="imgloading rs_2_0"></strong>
                <strong class="rs_2_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_2_0']) && $ketqua['rs_2_0']) {
                        echo $ketqua['rs_2_0'];
                        $arrLotoTrucTiep['rs_2_0'] = substr($ketqua['rs_2_0'], 3);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="6" class="kq_3" id="rs_2_1">
                <strong class="imgloading rs_2_1"></strong>
                <strong class="rs_2_1" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_2_1']) && $ketqua['rs_2_1']) {
                        echo $ketqua['rs_2_1'];
                        $arrLotoTrucTiep['rs_2_1'] = substr($ketqua['rs_2_1'], 3);
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td rowspan="2">Ba</td>
            <td colspan="4" class="kq_4" id="rs_3_0">
                <strong class="imgloading rs_3_0"></strong>
                <strong class="rs_3_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_3_0']) && $ketqua['rs_3_0']) {
                        echo $ketqua['rs_3_0'];
                        $arrLotoTrucTiep['rs_3_0'] = substr($ketqua['rs_3_0'], 3);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_5" id="rs_3_1">
                <strong class="imgloading rs_3_1"></strong>
                <strong class="rs_3_1" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_3_1']) && $ketqua['rs_3_1']) {
                        echo $ketqua['rs_3_1'];
                        $arrLotoTrucTiep['rs_3_1b'] = substr($ketqua['rs_3_1'], 3);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_6" id="rs_3_2">
                <strong class="imgloading rs_3_2"></strong>
                <strong class="rs_3_2" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_3_2']) && $ketqua['rs_3_2']) {
                        echo $ketqua['rs_3_2'];
                        $arrLotoTrucTiep['rs_3_2b'] = substr($ketqua['rs_3_2'], 3);
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="kq_7" id="rs_3_3">
                <strong class="imgloading rs_3_3"></strong>
                <strong class="rs_3_3" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_3_3']) && $ketqua['rs_3_3']) {
                        echo $ketqua['rs_3_3'];
                        $arrLotoTrucTiep['rs_3_3b'] = substr($ketqua['rs_3_3'], 3);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_8" id="rs_3_4">
                <strong class="imgloading rs_3_4"></strong>
                <strong class="rs_3_4" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_3_4']) && $ketqua['rs_3_4']) {
                        echo $ketqua['rs_3_4'];
                        $arrLotoTrucTiep['rs_3_4b'] = substr($ketqua['rs_3_4'], 3);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_9" id="rs_3_5">
                <strong class="imgloading rs_3_5"></strong>
                <strong class="rs_3_5" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_3_5']) && $ketqua['rs_3_5']) {
                        echo $ketqua['rs_3_5'];
                        $arrLotoTrucTiep['rs_3_5b'] = substr($ketqua['rs_3_5'], 3);
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td>Tư</td>
            <td colspan="3" class="kq_10" id="rs_4_0">
                <strong class="imgloading rs_4_0"></strong>
                <strong class="rs_4_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_4_0']) && $ketqua['rs_4_0']) {
                        echo $ketqua['rs_4_0'];
                        $arrLotoTrucTiep['rs_4_0'] = substr($ketqua['rs_4_0'], 2);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="3" class="kq_11" id="rs_4_1">
                <strong class="imgloading rs_4_1"></strong>
                <strong class="rs_4_1" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_4_1']) && $ketqua['rs_4_1']) {
                        echo $ketqua['rs_4_1'];
                        $arrLotoTrucTiep['rs_4_1'] = substr($ketqua['rs_4_1'], 2);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="3" class="kq_12" id="rs_4_2">
                <strong class="imgloading rs_4_2"></strong>
                <strong class="rs_4_2" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_4_2']) && $ketqua['rs_4_2']) {
                        echo $ketqua['rs_4_2'];
                        $arrLotoTrucTiep['rs_4_2'] = substr($ketqua['rs_4_2'], 2);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="3" class="kq_13" id="rs_4_3">
                <strong class="imgloading rs_4_3"></strong>
                <strong class="rs_4_3" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_4_3']) && $ketqua['rs_4_3']) {
                        echo $ketqua['rs_4_3'];
                        $arrLotoTrucTiep['rs_4_3'] = substr($ketqua['rs_4_3'], 2);
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td rowspan="2">Năm</td>
            <td colspan="4" class="kq_14" id="rs_5_0">
                <strong class="imgloading rs_5_0"></strong>
                <strong class="rs_5_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_5_0']) && $ketqua['rs_5_0']) {
                        echo $ketqua['rs_5_0'];
                        $arrLotoTrucTiep['rs_5_0'] = substr($ketqua['rs_5_0'], 2);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_15" id="rs_5_1">
                <strong class="imgloading rs_5_1"></strong>
                <strong class="rs_5_1" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_5_1']) && $ketqua['rs_5_1']) {
                        echo $ketqua['rs_5_1'];
                        $arrLotoTrucTiep['rs_5_1'] = substr($ketqua['rs_5_1'], 2);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_16" id="rs_5_2">
                <strong class="imgloading rs_5_2"></strong>
                <strong class="rs_5_2" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_5_2']) && $ketqua['rs_5_2']) {
                        echo $ketqua['rs_5_2'];
                        $arrLotoTrucTiep['rs_5_2'] = substr($ketqua['rs_5_2'], 2);
                    }
                    ?>
                </strong>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="kq_17" id="rs_5_3">
                <strong class="imgloading rs_5_3"></strong>
                <strong class="rs_5_3" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_5_3']) && $ketqua['rs_5_3']) {
                        echo $ketqua['rs_5_3'];
                        $arrLotoTrucTiep['rs_5_3'] = substr($ketqua['rs_5_3'], 2);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_18" id="rs_5_4">
                <strong class="imgloading rs_5_4"></strong>
                <strong class="rs_5_4" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_5_4']) && $ketqua['rs_5_4']) {
                        echo $ketqua['rs_5_4'];
                        $arrLotoTrucTiep['rs_5_4'] = substr($ketqua['rs_5_4'], 2);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_19" id="rs_5_5">
                <strong class="imgloading rs_5_5"></strong>
                <strong class="rs_5_5" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_5_5']) && $ketqua['rs_5_5']) {
                        echo $ketqua['rs_5_5'];
                        $arrLotoTrucTiep['rs_5_5'] = substr($ketqua['rs_5_5'], 2);
                    }
                    ?>
                </strong>
            </td>
        </tr><tr><td>Sáu</td>
            <td colspan="4" class="kq_20" id="rs_6_0">
                <strong class="imgloading rs_6_0"></strong>
                <strong class="rs_6_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_6_0']) && $ketqua['rs_6_0']) {
                        echo $ketqua['rs_6_0'];
                        $arrLotoTrucTiep['rs_6_0'] = substr($ketqua['rs_6_0'], 1);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_21" id="rs_6_1">
                <strong class="imgloading rs_6_1"></strong>
                <strong class="rs_6_1" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_6_1']) && $ketqua['rs_6_1']) {
                        echo $ketqua['rs_6_1'];
                        $arrLotoTrucTiep['rs_6_1'] = substr($ketqua['rs_6_1'], 1);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="4" class="kq_22" id="rs_6_2">
                <strong class="imgloading rs_6_2"></strong>
                <strong class="rs_6_2" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_6_2']) && $ketqua['rs_6_2']) {
                        echo $ketqua['rs_6_2'];
                        $arrLotoTrucTiep['rs_6_2'] = substr($ketqua['rs_6_2'], 1);
                    }
                    ?>
                </strong>
            </td>
        </tr><tr><td>Bảy</td>
            <td colspan="3" class="kq_23" id="rs_7_0">
                <strong class="imgloading rs_7_0"></strong>
                <strong class="rs_7_0" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_7_0']) && $ketqua['rs_7_0']) {
                        echo $ketqua['rs_7_0'];
                        $arrLotoTrucTiep['rs_7_0'] = substr($ketqua['rs_7_0'], 0);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="3" class="kq_24" id="rs_7_1">
                <strong class="imgloading rs_7_1"></strong>
                <strong class="rs_7_1" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_7_1']) && $ketqua['rs_7_1']) {
                        echo $ketqua['rs_7_1'];
                        $arrLotoTrucTiep['rs_7_1'] = substr($ketqua['rs_7_1'], 0);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="3" class="kq_25" id="rs_7_2">
                <strong class="imgloading rs_7_2"></strong>
                <strong class="rs_7_2" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_7_2']) && $ketqua['rs_7_2']) {
                        echo $ketqua['rs_7_2'];
                        $arrLotoTrucTiep['rs_7_2'] = substr($ketqua['rs_7_2'], 0);
                    }
                    ?>
                </strong>
            </td>
            <td colspan="3" class="kq_26" id="rs_7_3">
                <strong class="imgloading rs_7_3"></strong>
                <strong class="rs_7_3" style="display: none;">
                    <?php
                    if (isset($ketqua['rs_7_3']) && $ketqua['rs_7_3']) {
                        echo $ketqua['rs_7_3'];
                        $arrLotoTrucTiep['rs_7_3'] = substr($ketqua['rs_7_3'], 0);
                    }
                    ?>
                </strong>
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
                        <strong class="imgloading dauLoto<?= $row ?>"></strong>
                        <?php
                        // print_r($arrLotoTrucTiep);
                        for ($i = 0; $i < 10; $i++) {
                            if (in_array($row . $i, $arrLotoTrucTiep)) {
                                echo '<strong class="dauLoto' . $row . '" style="display: none;">';
                                echo $row . $i . ', ';
                                echo '</strong>';
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
                                echo '<strong class="duoiLoto' . $row . '" style="display: none;">';
                                echo $i . $row . ', ';
                                echo '</strong>';
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

<table class="loto" id="loto_mb">
    <thead>
        <tr>
            <th colspan="9">Lô tô</td>
        </tr>
    </thead>
    <tbody>

        <?php
        // $arrLotoTrucTiep = krsort($arrLotoTrucTiep);
        asort($arrLotoTrucTiep);

        $num_item = 9; //we set number of item in each col
        $current_col = 0;
        $v = '';
        $i = 0;
        foreach ($arrLotoTrucTiep as $key => $val) {
            $i++;
            if ($current_col == 0) {
                $v .= '<tr>';
            }
            //$image = preg_replace('/images/','_thumbs/Images',$p->image);
            if ($key === "kqdb") {

                $v .= ' <td class="active do"> <strong class="imgloading lotoTructiep"></strong><strong class="lotoTructiep" style="display: none;">' . $val . '</strong></td>';
            } else {
                $v .= ' <td><strong class="imgloading lotoTructiep"></strong><strong class="lotoTructiep" style="display: none;">' . $val . '</strong></td>';
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