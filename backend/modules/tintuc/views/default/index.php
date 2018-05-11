<?php

use backend\widgets\frontend\AdsWidget;
use backend\widgets\frontend\DienDanWidget;
use backend\widgets\frontend\PaginationButtonWidget;

$flag = false;
$baseUrl = Yii::$app->params['baseUrl'];
$suffix = Yii::$app->params['suffix'];
$action = Yii::$app->controller->action->id;
$module = Yii::$app->controller->module->id;
?>
<!-- //================ PHAN QUANG CAO -->
<?php
if ($flag) {
    ?>
    <?php
    $dataAds = [];
    ?>
    <?= AdsWidget::widget(['dataAds' => $dataAds]); ?>
    <!-- //================ END PHAN QUANG CAO -->

    <!-- //================ PHAN DIEN DAN-->
    <?php
    $dataDienDan = [];
    ?>
    <?= DienDanWidget::widget(['dataDienDan' => $dataDienDan]); ?>
    <!-- //================ END PHAN DIEN DAN -->

<?php } ?>
<!-- Kinh nghiệm soi cầu shows 10 dòng -->
<?php
if (isset($dataProviders) & $dataProviders) {
    ?>
    <div class="chu-vua danhmuc">Tin tức xổ số</div>
    <div class="chu-nho noidung">
        <p class="nghiengdam do cangiua">
            Trang tin tức về xổ số, tin tức mới nhất!
        </p>
        <?php
        $aliasCate = $categories['ALIAS'];
        ?>
        <div class="w3-padding chu-nho den cantrai" id="showKinhNghiem">
            <?php
            foreach ($dataProviders as $key => $dataProvider) {
                $title = $dataProvider['TITLE'];
                $link = $baseUrl . 'bai-viet/' . $aliasCate . '/' . $dataProvider['ALIAS'] . $suffix;
                ?>
                <p class="w3-hover-opacity">
                    <a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
                </p>
            <?php } ?>
        </div>
    <?php } ?>

    <!-- //SU DUNG GOI AJAX -->
    <!-- <div >
    // HIEN THI NUT 
    <?php
    $currentpage = 1;
    if (isset($_GET['page'])) {
        $currentpage = $_GET['page'];
    }
    $totalPage = 0;
    if (isset($myPagination['totalPage'])) {
        $totalPage = $myPagination['totalPage'];
    }
    if ($totalPage && $currentpage > 1) {
        ?>
    <?php } ?>
            <button class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium w3-left pageView" id="pageViewPrev" page="<?= $currentpage - 1 ?>"  >Trang trước</button>
    
    <?php
    if (isset($totalPage) && $totalPage > 2 && $totalPage > $currentpage) {
        ?>
    <?php } ?>
            <button class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium w3-right pageView" id="pageViewNext" page="<?= $currentpage + 1 ?>" >Trang tiếp</button>
        </div> -->

    <!-- //SU DUNG PHAN TRANG -->
    <?php
    if (isset($myPagination) && $myPagination['totalPage'] > 1) {
        ?>
        <div class="w3-center">
            <div class="phantrang">
                <?= PaginationButtonWidget::widget(['paginator' => $myPagination]); ?>
            </div>
        </div>
    <?php } ?>  
    <br>
</div>
<script>
    $(document).ready(function () {
        $('body').on('click', '.pageView', function (event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var totalPage = parseInt("<?php echo $totalPage ?>");
            var page = 0;
            page = parseInt($(this).attr('page'));
            if (page > 0) {
                $.ajax({
                    url: "<?php echo $baseUrl . $module . '/refresh_page' . $suffix; ?>",
                    type: "get",
                    data: {page: page},
                    beforeSend: function () {
                        console.log('NOI DUNG LAM GI TRUOC KHI TRA VE KET QUA');
                        $('.pageView').val("xxxx");
                    },
                    success: function (response) {
                        var linkSoMo = "<?php echo $baseUrl . $module . $suffix . '?page='; ?>" + page;
                        window.history.pushState('', '', linkSoMo);
                        $('#showKinhNghiem').html(response);
                        var pageViewPrev = page - 1;
                        $('#pageViewPrev').attr('page', pageViewPrev);
                        if (pageViewPrev > 0) {
                            $('#pageViewPrev').show();
                        } else {
                            $('#pageViewPrev').hide();
                        }
                        var pageViewNext = page + 1;
                        $('#pageViewNext').attr('page', pageViewNext);
                        if (pageViewNext > totalPage) {
                            $('#pageViewNext').hide();
                        } else {
                            $('#pageViewNext').show();
                        }
                        // $('html, body').animate({
                        //        scrollTop: $("#showSoMo").offset().top
                        //    }, 1000);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });
            }
        });
    });

</script>
