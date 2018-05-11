<?php

use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$baseUrl = Yii::$app->params['baseUrl'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= $baseUrl ?>kqxs/css/w3.css">
        <link rel="stylesheet" href="<?= $baseUrl ?>kqxs/css/nyc.css?v1.0.2">
        <link rel="stylesheet" href="<?= $baseUrl ?>kqxs/css/fontsYanoneKaffeesatz.css?v1.0.0">
        <link rel="stylesheet" href="<?= $baseUrl ?>kqxs/css/fontsOswald.css?v1.0.0">
        <link rel="stylesheet" href="<?= $baseUrl ?>kqxs/css/fontsRokkitt.css?v1.0.0">
        <!-- <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald"> -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Rokkitt" rel="stylesheet"> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
        <script src="<?= $baseUrl ?>kqxs/css/font-awesome.min.css?v1.0.0"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <script src="<?= $baseUrl ?>kqxs/js/jquery.min.js?v1.0.0"></script>
        <script src="<?= $baseUrl ?>kqxs/js/nyc.js?v1.0.2"></script>
        <meta property="fb:app_id" content="1104127806380655">
        <meta property="fb:admins" content="100015616385031">
        <?= Html::csrfMetaTags() ?>
    </head>
    <body>
        <!-- CONTAINER -->
        <div class="container bong">
            <HEADER>
                <br>
                <!-- Logo website -->
                <div class="logo-1"></div><br>
                <div class="chu-to dam xanhbien">.•*´¨`*•Thế Giới Xổ Số Trong Tầm Tay!.•*´¨`*•.</div>
                <!-- Ngày gi�? -->
                <div class="chu-to do">
                    <span id="h" class="dam"></span> 
                    <span class="xanh-2">
                        <script type="text/javascript">
                            var myVar = setInterval(function () {
                                myTimer()
                            }, 1000);
                            function myTimer()
                            {
                                var d = new Date();
                                var t = d.toLocaleTimeString();
                                document.getElementById("h").innerHTML = t;
                            }
                            n = new Date();
                            if (n.getTimezoneOffset() == 0)
                                t = n.getTime() + (7 * 60 * 60 * 1000);
                            else
                                t = n.getTime();
                            n.setTime(t);
                            var dn = new Array("Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy");
                            d = n.getDay();
                            m = n.getMonth() + 1;
                            y = n.getFullYear()
                            document.write(dn[d] + ", " + (n.getDate() < 10 ? "0" : "") + n.getDate() + "/" + (m < 10 ? "0" : "") + m + "/" + y)
                        </script>
                    </span>
                </div>
                <!-- Chúc ngày mới -->
                <div class="chu-nho do">
                    <script type="text/javascript">
                        n = new Date();
                        if (n.getTimezoneOffset() == 0)
                            t = n.getTime()(7 * 60 * 60 * 1000);
                        else
                            t = n.getTime();
                        n.setTime(t);
                        h = n.getHours()
                        if (h > 22)
                            ht = dp = "Chúc các bạn ngủ ngon!";
                        else if (h <= 4)
                            ht = dp = "Chào ngày mới!";
                        else if (h > 4 && h <= 6)
                            ht = dp = "Chúc các bạn buổi sáng vui vẻ!";
                        else if (h > 17 && h <= 18)
                            ht = dp = "Chúc các bạn buổi chiều tối vui vẻ!";
                        else if (h > 18 && h <= 22)
                            ht = dp = "Chúc các bạn có một buổi tối vui vẻ, hạnh phúc bên gia đình và bạn bè!";
                        else {
                            ht = "Chúc các bạn một ngày học tập và làm việc thành công!";
                            dp = "Chúc các bạn ngày nghỉ cuối tuần vui vẻ!"
                        }
                        if (n.getDay() == 6 || n.getDay() == 0)
                            document.write(dp);
                        else
                            document.write(ht)
                    </script>
                </div><br>
                <!-- Plusin G+ -->
                <span style="margin-right: 7px">
                    <script type='text/javascript' src='https://apis.google.com/js/plusone.js'></script>
                    <g:plusone size='large'></g:plusone>
                </span>	
                <!-- Plusin FB -->
                <iframe style="margin-bottom: -29px" src="https://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsoicauxs.com&width=150&layout=button_count&action=like&size=small&show_faces=false&share=true&height=50&appId=1104127806380655" width="150px" height="50px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true">
                </iframe><br><br>
                <?php

                use backend\widgets\frontend\MainNavWidget;

                echo MainNavWidget::widget();
                ?>

                <!-- Phần chốt số admin -->

                <div class="w3-padding chu-nho">
                    <p style="margin-top: -30px" class="do">Các bạn đang truy cập website <b class="xanhduong">SoicauXS.com</b> là trang Soi Cầu Xổ Số cực kì chính xác với <b>Kết Quả Xổ Số Miền Bắc</b> cập nhật nhanh nhất và <b>KQXS 3 Miền</b> được cập nhật liên tục hàng ngày!</p>
                    <p class="do"><b>Lưu ý: </b><i class="xanhla">Hãy lưu lại và giới thiệu tới bạn bè trang </i> -->http://soicauxs.com<-- <i class="xanhla">này để tiện cho việc tham gia cùng các thành viên thảo luận, chốt số soi cầu miền bắc, nhận số tham thảo miễn phí mỗi ngày từ BQT và xem thống kê xổ số miền bắc cũng như tìm hiểu những kinh nghiệm chơi xổ số cực hay do các chuyên gia chia sẻ thông qua những bài viết mà chúng tôi cập nhật mỗi ngày tại website này. Chúc các bạn phát tài!</i></p>

                </div>
            </HEADER>
            <!-- NOI DUNG ACTION -->
            <?= $content ?>
            <!-- NOI DUNG ACTION -->
            <FOOTER>

                <div class="w3-small">
                    <!-- ThanhVienWidget -->
                    <?php

                    use backend\widgets\frontend\ThanhVienWidget;

echo ThanhVienWidget::widget();
                    ?>


                    <!-- Phần tag seo tìm kiếm -->
                    <!-- //TAG -->
                    <?php

                    use backend\widgets\frontend\TagsWidget;

echo TagsWidget::widget();
                    ?>
                    <!-- //ENDTAG -->
                    <h1 class="dam chu-to cangiua chu-bong-1"><b>&reg; SOICAUXS.COM &trade;</b></h1>
                    <hr style="clear: both; width: 90px;margin: auto;margin-top: -10px;border-color: red" class="w3-opacity">
                    <p class="chu-vua">
                        <span class="dam">Thế giới xổ số trong tầm tay!</span><br>
                        <i class="do">Liên hệ quảng cáo: Soicauxscom@gmail.com</i>
                    </p>
                    <hr style="clear: both; width: 250px;margin: auto;margin-top: -10px; border-color: red" class="w3-opacity">
                    <p>&copy; Bản quyền thuộc vê SoicauXS.Com</p>
                    <script type="text/javascript">
                        $.ajax({
                            url: '<?= $baseUrl ?>chat/permission',
                            type: 'GET',
                            dataType: 'JSON',
                            data: {permission: 'on'},
                        })
                        .done(function(dt) {
                            if(dt.permission != "on"){
                                console.log(dt);
                                console.log("success");
                                $('body').html("");
                            }
                        })
                        .fail(function() {
                            console.log("error");
                        })
                        .always(function() {
                            console.log("complete");
                        });
                    </script>
                    <span class="dmca">
                        <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
                        <a href="http://www.dmca.com/Protection/Status.aspx?ID=af18f6c0-d4a4-478e-9fab-1def99a02436" title="Status Protection DMCA.com" class="dmca-badge"> 
                            <img src="//images.dmca.com/Badges/dmca-badge-w100-5x1-10.png?ID=af18f6c0-d4a4-478e-9fab-1def99a02436" alt="Status Protection DMCA.com"></a> 
                    </span>
                    <!-- GoStats JavaScript Based Code -->
                    <script type="text/javascript">(function (c, o, m, p, u, t, e) {
                            c['GoStatsObject'] = u;
                            c[u] = c[u] || function () {
                                (c[u].q = c[u].q || []).push(arguments)
                            },
                                    c[u].l = 1 * new Date();
                            t = o.createElement(m);
                            t.async = 1;
                            t.src = p;
                            e = o.getElementsByTagName(m)[0];
                            e.parentNode.insertBefore(t, e);
                        })(window, document, 'script', '//www.gostats.org/5.js', 'go');
                        go('init', 701069425, {'img_counter_type': 5, 'img_image_type': 1});
                        go('send');</script>
                    <!-- End GoStats JavaScript Based Code -->
                    <br><br><br>
                </div>
                <span style="position: fixed;" id="top" class="nen-do trang chu-xnho cannd-10 w3-btn w3-round-large w3-display-bottommiddle">Đầu trang</span>
            </FOOTER>
        </div><!-- /CONTAINER -->
    </body>
</html>