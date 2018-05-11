<?php
use backend\modules\trangchu\models\Ads;
const LIMIT = 15;
$dataAds = Ads::find()->limit(LIMIT)->all();
?>
<div class="qc chu-to">
    <blink>
        <p><b class="do chu-to">
                <script type="text/javascript">
                    text = "Liên hệ gmail để được quảng cáo top 1!";
                    string2array(text);
                    divserzeugen();
                </script>
            </b>
        </p>
    </blink>
    <?php
    if (isset($dataAds) && $dataAds) {
        ?>
    <ul style="padding-left: 0">
            <?php
            foreach ($dataAds as $key => $dataAd) {
                ?>
                <li class="">
                    <b class="chu-bong-2"><?= $dataAd->NAME ?></b>
                    <p class="chu-vua nghieng den re-do">
                        <a href="<?= $dataAd->LINK ?>" target="_blank"><?= $dataAd->DESCRIPTION ?></a>
                    </p>

                </li>
        <?php } ?>
        </ul>
<?php } ?>
</div><br>