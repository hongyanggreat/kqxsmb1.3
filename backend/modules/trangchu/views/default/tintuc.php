<!-- Kinh nghiệm soi cầu shows 10 dòng -->
<?php
if (isset($tinTucs) & $tinTucs) {
    ?>
    <div class="chu-vua danhmuc">Tin tức</div>
    <div class="chu-nho noidung-2">
        <?php
        $aliasCateTinTuc = $cateTinTuc['ALIAS'];
        foreach ($tinTucs as $key => $tinTuc) {
            $title = $tinTuc['TITLE'];
            $link = $baseUrl . 'bai-viet/' . $aliasCateTinTuc . '/' . $tinTuc['ALIAS'] . $suffix;
            ?>
            <p class="w3-hover-opacity">
            <div class="ic-hot2"></div>&nbsp;<a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
        </p>
    <?php } ?>
    </div><br>
<?php } ?>