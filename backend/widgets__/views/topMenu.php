<?php 
  use yii\helpers\Html;
 ?>
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=" dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#">new message</a></li>
        <li><a class="sInbox" title="" href="#">inbox</a></li>
        <li><a class="sOutbox" title="" href="#">outbox</a></li>
        <li><a class="sTrash" title="" href="#">trash</a></li>
      </ul>
    </li>
    <?php 
        $userID = '';
        if (!Yii::$app->user->isGuest) {
            $userID     =  Yii::$app->user->identity->USERNAME;
        }
     ?>
    <li class=""><a title="" href="#"><i class="icon icon-user"></i> <span class="text"><?= $userID ?></span></a></li>
    <li class=""><?= Html::a('Logout', null, [
                              'data' => [
                                'confirm' => 'Bạn có chắc muốn thoát?',
                                'method' => 'post',
                              ],
                              'href'=>"javascript:void(0);",
                              'onclick'=>'logout()',
                           ]) 
    ?></li>
  </ul>
  <script>
    function logout() {
      var result = confirm("Bạn có chắc muốn thoát?");
      if (result) {
          document.getElementById('formLogout').submit();
      }
    }
  </script>
</div>