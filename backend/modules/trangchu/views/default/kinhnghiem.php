<!-- Kinh nghiệm soi cầu shows 10 dòng -->
<?php
if (isset($kinhNghiems) & $kinhNghiems) {
    ?>
    <div class="chu-vua danhmuc">Kinh nghiệm soi cầu</div>
    <div class="chu-nho noidung-2">
        <?php
        $aliasCateKinhNghiem = $cateKinhNghiem['ALIAS'];
        foreach ($kinhNghiems as $key => $kinhNghiem) {
            $title = $kinhNghiem['TITLE'];
            $link = $baseUrl . 'bai-viet/' . $aliasCateKinhNghiem . '/' . $kinhNghiem['ALIAS'] . $suffix;
            ?>
            <p class="w3-hover-opacity">
            <div class="ic-new1"></div>&nbsp;<a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
        </p>
    <?php } ?>
    </div><br>
<?php } ?>