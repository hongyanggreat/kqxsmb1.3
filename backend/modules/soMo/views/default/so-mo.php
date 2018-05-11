
<!-- Kinh nghiệm soi cầu shows 10 dòng -->
<?php

use backend\widgets\frontend\PaginationWidget;
?>
<?php
if (isset($dataProviders) & $dataProviders) {
    ?>
    <div class="chu-vua danhmuc">Sách số mơ</div>
    <div class="chu-nho noidung">
        <p class="nghiengdam do cangiua">
            Cuốn sách đầy đủ chính xác về giấc mơ của bạn, dành cho mộng đề!
        </p>
        <br>
        <table cellspacing="0" cellpadding="9" class="somo">
            <thead>
                <tr>
                    <th style="width:15%;">STT</th>
                    <th>Giấc mơ</th>
                    <th style="width:30%">Cầu</th>
                </tr>
            </thead>
            <tbody id="showSoMo">
                <?php
                foreach ($dataProviders as $key => $dataProvider) {
                    $giac_mo = $dataProvider['giac_mo'];
                    $boi_so = $dataProvider['boi_so'];
                    ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $giac_mo ?></td>
                        <td><?= $boi_so ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
        <br>
        <!-- //SU DUNG PHAN TRANG -->
        <?php
        if (isset($myPagination) && $myPagination['totalPage'] > 1) {
            ?> 
            <div class="w3-center">
                <div class="w3-bar w3-border chu-nho">
                    <?= PaginationWidget::widget(['paginator' => $myPagination]); ?>
                </div>
            </div>
        <?php } ?> 

        <br>
    <?php } ?>
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
                        $('#showSoMo').html(response);
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
