<?php 
     use backend\widgets\frontend\AdsWidget;
     use backend\widgets\frontend\DienDanWidget;
     use backend\widgets\frontend\PaginationWidget;
     $flag = false;
     $baseUrl = Yii::$app->params['baseUrl'];
     $suffix  = Yii::$app->params['suffix'];
     $action  =  Yii::$app->controller->action->id;
     $module  = Yii::$app->controller->module->id;
 ?>
<!-- //================ PHAN QUANG CAO -->
<?php 
    if($flag){
 ?>
<?php 
    $dataAds = [];
 ?>
 <?= AdsWidget::widget(['dataAds'=>$dataAds]); ?>
<!-- //================ END PHAN QUANG CAO -->

<!-- //================ PHAN DIEN DAN-->
<?php 
    $dataDienDan = [];
 ?>
 <?= DienDanWidget::widget(['dataDienDan'=>$dataDienDan]); ?>
<!-- //================ END PHAN DIEN DAN -->

<?php } ?>
<!-- Kinh nghiệm soi cầu shows 10 dòng -->
<?php 
    if(isset($dataProviders) & $dataProviders){
 ?>

<div class="w3-padding chu-nho den cantrai" id="showArticleTag">
    <?php 
        foreach ($dataProviders as $key => $dataProvider) {
            $title     = $dataProvider['TITLE'];
            $aliasCate = $dataProvider['parent']->ALIAS;
            $link      = $baseUrl.'bai-viet/'.$aliasCate.'/'.$dataProvider['ALIAS'].$suffix;
     ?>
        <p class="w3-hover-opacity">
            <a href="<?= $link ?>" title="<?= $title ?>"><?= $title ?></a>
        </p>
    <?php } ?>
</div><br>
<?php } ?>

<!-- //SU DUNG GOI AJAX -->
<div >
<!-- // HIEN THI NUT  -->
    <?php 
        $currentpage = 1;
        if(isset($_GET['page'])){
            $currentpage = $_GET['page'];
        }
        $totalPage = 0;
        if(isset($myPagination['totalPage'])){
            $totalPage = $myPagination['totalPage'];
        }
        if($totalPage > 1 ){
     ?>
        
        <button class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium w3-left pageView hide" id="pageViewPrev" page="<?= $currentpage-1 ?>"  >Trang trước</button>
     <?php } ?>

     <?php 
        if(isset($totalPage) && $totalPage >2   && $totalPage> $currentpage){

     ?>
        <button class="nen-xanh trang re-do chu-xnho dam w3-btn w3-round-medium w3-right pageView" id="pageViewNext" page="<?= $currentpage+1 ?>" >Trang tiếp</button>
     <?php } ?>
</div>
<hr>
<!-- //SU DUNG PHAN TRANG -->
<?php 
  if(isset($myPagination) && $myPagination['totalPage'] > 1){
?>
    <div class="w3-bar w3-center">
           <?= PaginationWidget::widget(['paginator'=>$myPagination]); ?>
    </div>
<?php } ?>  
<br>

<script>
    $(document).ready(function() {
        var checkPage = "<?php  if(isset($_GET['page'])){ echo $_GET['page']; }else{  echo 0; } ?>";
        if(checkPage <= 1){ $('#pageViewPrev').hide(); }
        $('body').on('click', '.pageView', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var totalPage = parseInt("<?php echo $totalPage ?>");
            var aliasName = "<?php echo $aliasName ?>";
            var page = 0;
                page = parseInt ($(this).attr('page'));
            var url = "<?php echo $baseUrl.$module.'/refresh_page'.$suffix ;?>";
            var linkSoMo = "<?php echo $baseUrl.$module.'/'.$alias.$suffix.'?page=' ;?>"+page ;

            if(page > 0){
                $.ajax({
                    url: url,
                    type: "get",
                    data: {page:page,aliasName:aliasName} ,
                    beforeSend: function() {
                        $('#pageViewPrev').hide();
                        $('#pageViewNext').hide();
                    },
                    success: function (response) {
                        window.history.pushState('', '', linkSoMo);    
                        $('#showArticleTag').html(response);
                            var pageViewPrev = page-1;
                            $('#pageViewPrev').attr('page',pageViewPrev);
                            if(pageViewPrev>0){
                                $('#pageViewPrev').show();
                            }else{
                                $('#pageViewPrev').hide();
                            }
                            var pageViewNext = page+1;
                            $('#pageViewNext').attr('page',pageViewNext);
                            if(pageViewNext > totalPage){
                                $('#pageViewNext').hide();
                            }else{
                                $('#pageViewNext').show();
                            }
                        $('html, body').animate({
                            scrollTop: $("#showArticleTag").offset().top
                        }, 1000);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                       console.log(textStatus, errorThrown);
                    }
                });
            }
        });
    });

</script>
