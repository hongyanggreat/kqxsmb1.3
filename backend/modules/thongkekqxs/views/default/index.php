<!-- phan show bang kqxs chon so ngay -->
<div>
    <form>
        <label>Ngày bắt đầu</label>
        <input type="fullDay" name=""><br>
        <label>Ngày kết thúc</label>
        <input type="fullDay" name="">
    </form>
</div>
<!-- Bảng kqxs -->
<div id="bangkqxs">
<b class="chu-to dam do w3-padding">
    Tường thuật trực tiếp kết quả xổ số miền Bắc
</b>
<table cellspacing="2" cellpadding="9" class="kqxs cannd">
    <thead>
        <tr>
            <th colspan="13" class="nen-do trang chu-nho dam">Mở thưởng ngày <?= $fullDay ?></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $arrLotoTrucTiep = [];
        ?>
        <tr>
            <td width="20%">ĐB</td><td colspan="12" class="kq_0">
                <?php 
                if(isset($ketqua['rs_0_0']) && $ketqua['rs_0_0']){
                    echo $ketqua['rs_0_0'];
                    $arrLotoTrucTiep['kqdb'] = substr($ketqua['rs_0_0'], 3);
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td >Nhất</td>
            <td colspan="12" class="kq_1">
                <?php 
                if(isset($ketqua['rs_1_0']) && $ketqua['rs_1_0']){
                    echo $ketqua['rs_1_0'];
                    $arrLotoTrucTiep[] = substr($ketqua['rs_1_0'], 3);
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td >Nhì</td>
            <td colspan="6" class="kq_2">
                <?php 
                if(isset($ketqua['rs_2_0']) && $ketqua['rs_2_0']){
                    echo $ketqua['rs_2_0'];
                    $arrLotoTrucTiep[] = substr($ketqua['rs_2_0'], 3);
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="6" class="kq_3">
                <?php 
                if(isset($ketqua['rs_2_1']) && $ketqua['rs_2_1']){
                    echo $ketqua['rs_2_1'];
                    $arrLotoTrucTiep[] = substr($ketqua['rs_2_1'], 3);
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td rowspan="2" >Ba</td>
            <td colspan="4" class="kq_4">
                <?php 
                if(isset($ketqua['rs_3_0']) && $ketqua['rs_3_0']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_3_0'], 3);
                    echo $ketqua['rs_3_0'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_5">
                <?php 
                if(isset($ketqua['rs_3_1']) && $ketqua['rs_3_1']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_3_1'], 3);
                    echo $ketqua['rs_3_1'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_6">
                <?php 
                if(isset($ketqua['rs_3_2']) && $ketqua['rs_3_2']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_3_2'], 3);
                    echo $ketqua['rs_3_2'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="kq_7">
                <?php 
                if(isset($ketqua['rs_3_3']) && $ketqua['rs_3_3']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_3_3'], 3);
                    echo $ketqua['rs_3_3'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_8">
                <?php 
                if(isset($ketqua['rs_3_4']) && $ketqua['rs_3_4']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_3_4'], 3);
                    echo $ketqua['rs_3_4'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_9">
                <?php 
                if(isset($ketqua['rs_3_5']) && $ketqua['rs_3_5']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_3_5'], 3);
                    echo $ketqua['rs_3_5'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td >Tư</td>
            <td colspan="3" class="kq_10">
                <?php 
                if(isset($ketqua['rs_4_0']) && $ketqua['rs_4_0']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_4_0'], 2);
                    echo $ketqua['rs_4_0'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="3" class="kq_11">
                <?php 
                if(isset($ketqua['rs_4_1']) && $ketqua['rs_4_1']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_4_1'], 2);
                    echo $ketqua['rs_4_1'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="3" class="kq_12">
                <?php 
                if(isset($ketqua['rs_4_2']) && $ketqua['rs_4_2']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_4_2'], 2);
                    echo $ketqua['rs_4_2'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="3" class="kq_13">
                <?php 
                if(isset($ketqua['rs_4_3']) && $ketqua['rs_4_3']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_4_3'], 2);
                    echo $ketqua['rs_4_3'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td rowspan="2" >Năm</td>
            <td colspan="4" class="kq_14">
                <?php 
                if(isset($ketqua['rs_5_0']) && $ketqua['rs_5_0']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_5_0'], 2);
                    echo $ketqua['rs_5_0'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_15">
                <?php 
                if(isset($ketqua['rs_5_1']) && $ketqua['rs_5_1']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_5_1'], 2);
                    echo $ketqua['rs_5_1'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_16">
                <?php 
                if(isset($ketqua['rs_5_2']) && $ketqua['rs_5_2']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_5_2'], 2);
                    echo $ketqua['rs_5_2'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4" class="kq_17">
                <?php 
                if(isset($ketqua['rs_5_3']) && $ketqua['rs_5_3']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_5_3'], 2);
                    echo $ketqua['rs_5_3'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_18">
                <?php 
                if(isset($ketqua['rs_5_4']) && $ketqua['rs_5_4']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_5_4'], 2);
                    echo $ketqua['rs_5_4'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_19">
                <?php 
                if(isset($ketqua['rs_5_5']) && $ketqua['rs_5_5']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_5_5'], 2);
                    echo $ketqua['rs_5_5'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr><tr><td >Sáu</td>
            <td colspan="4" class="kq_20">
                <?php 
                if(isset($ketqua['rs_6_0']) && $ketqua['rs_6_0']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_6_0'], 1);
                    echo $ketqua['rs_6_0'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_21">
                <?php 
                if(isset($ketqua['rs_6_1']) && $ketqua['rs_6_1']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_6_1'], 1);
                    echo $ketqua['rs_6_1'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="4" class="kq_22">
                <?php 
                if(isset($ketqua['rs_6_2']) && $ketqua['rs_6_2']){
                    $arrLotoTrucTiep[] = substr($ketqua['rs_6_2'], 1);
                    echo $ketqua['rs_6_2'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr><tr><td >Bảy</td>
            <td colspan="3" class="kq_23">
                <?php 
                if(isset($ketqua['rs_7_0']) && $ketqua['rs_7_0']){
                    $arrLotoTrucTiep[] = $ketqua['rs_7_0'];
                    echo $ketqua['rs_7_0'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="3" class="kq_24">
                <?php 
                if(isset($ketqua['rs_7_1']) && $ketqua['rs_7_1']){
                    $arrLotoTrucTiep[] = $ketqua['rs_7_1'];
                    echo $ketqua['rs_7_1'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="3" class="kq_25">
                <?php 
                if(isset($ketqua['rs_7_2']) && $ketqua['rs_7_2']){
                    $arrLotoTrucTiep[] = $ketqua['rs_7_2'];
                    echo $ketqua['rs_7_2'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
            <td colspan="3" class="kq_26">
                <?php 
                if(isset($ketqua['rs_7_3']) && $ketqua['rs_7_3']){
                    $arrLotoTrucTiep[] = $ketqua['rs_7_3'];
                    echo $ketqua['rs_7_3'];
                }else{
                    echo $loading;
                }
                ?>
            </td>
        </tr>
    </tbody>
</table>
<br>
<div class="cannd" style="width: 100%">

    <div style="width: 50%;float: left;">
        <!-- Phần đầu số -->
        <table class="dau" cellspacing="5" cellpadding="9">
            <tbody>
                <tr>
                    <th colspan="2" class="w3-teal chu-nho dam">Đầu</th>
                </tr>
                <?php 
                for ($row=0; $row <10 ; $row++) { 
                   ?>
                   <tr>
                    <td width="10%"><?= $row  ?></td>
                    <td class="dit_0">
                        <?php 
                                    // print_r($arrLotoTrucTiep);
                        for ($i=0; $i < 10 ; $i++) { 
                            if(in_array($row.$i,$arrLotoTrucTiep)){
                                echo $row.$i.'; ';
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
        <table class="duoi" cellspacing="5" cellpadding="9">
            <tbody>
                <tr>
                    <th width="10%" colspan="2" class="w3-green chu-nho dam">Đít</th>
                </tr>
                <?php 
                for ($row=0; $row <10 ; $row++) { 
                   ?>
                   <tr>
                    <td width="10%"><?= $row  ?></td>
                    <td class="dit_0">
                        <?php 
                                    // print_r($arrLotoTrucTiep);
                        for ($i=0; $i < 10 ; $i++) { 
                            if(in_array($i.$row,$arrLotoTrucTiep)){
                                echo $i.$row.'; ';
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
<p style="clear: both;"><br></p>
</div>