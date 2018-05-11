<?php 
    if(isset($paginator['totalPage']) && $paginator['totalPage'] && $paginator['totalPage'] >= $paginator['page']){
      $actionPage = $paginator['action'].Yii::$app->params['suffix'].'?page=';

      $queryString = "";
      if(isset($paginator['queryString']) && $paginator['queryString']){
           $pattern = "/page=(\w+)&/";
           $queryString = preg_replace($pattern, "&", $paginator['queryString']);
      }
 ?>
  <?php 
    $disabledPrev = '';
    $disabledNext = '';
    $numberPagePrev= false;
    $numberPageNext= false;
    if($paginator['page'] == 1){
      $disabledPrev = 'disabled';
    }else{
      if($paginator['page'] > 1){
        $numberPagePrev = $paginator['page'] - 1;
      }else{
        $disabledPrev = 'disabled'; 
      }
    }
    if($paginator['page'] == $paginator['totalPage']){
      $disabledNext = 'disabled';
      
    }else{
        if(($paginator['totalPage'] >=5)&& ($paginator['totalPage'] > $paginator['page']) && (($paginator['totalPage'] - $paginator['page']) >=1)){
          $numberPageNext = $paginator['page'] + 1;
        }
    }
 ?>
  <?php 
      $linkPrev = '#';
      $linkFirst = '#';
      $titlePrev = '';
      if($numberPagePrev){
        $linkFirst = $actionPage.'1'.$queryString;
        $linkPrev = $actionPage.$numberPagePrev.$queryString;
        $titlePrev = 'Trang '.$numberPagePrev;
      }
   ?>
    <span class="toilui" data-href="<?= $linkFirst  ?>" ><a href="<?= $linkFirst  ?>">&laquo;</a></span>

    <?php 

        if($paginator['totalPage'] > 5){
            $forLine = 7;
        }else{
            $forLine = ($paginator['totalPage'] + 2);
        }
          for ($i=0; $i < $forLine ; $i++) { 
              $active ='';
              if($paginator['page'] >= 3){
                  $pageLine = 5;
              }else if($paginator['page'] == 2){
                  if($paginator['totalPage'] >=5){
                    $pageLine = 6;
                  }else{
                    $pageLine = 5;
                  }
              }else{
                  $pageLine = 7;

              }
              if($i<$pageLine){

                  switch ($i) {
                    case '0':
                      $numberPage = 0;
                      if($paginator['page'] >=3){
                        $numberPage = $paginator['page'] - 2;
                      }
                      break;
                    case '1':
                      $numberPage = 0;
                      if($paginator['page'] >=2){
                        $numberPage = $paginator['page'] - 1;
                      }
                      break;
                    case '2':
                      $numberPage = $paginator['page'];
                      $active ='nen-do trang';
                      break;
                    case '3':
                      $numberPage = 0;
                      if($paginator['page'] < $paginator['totalPage']){
                        $numberPage = $paginator['page'] + 1;
                      }
                      break;
                    case '4':
                      $numberPage = 0;
                      if($paginator['page'] < $paginator['totalPage'] && ($paginator['totalPage'] - $paginator['page']) >=2){
                        $numberPage = $paginator['page'] + 2;
                      }
                      break;
                    //TH page < 3
                    case '5':
                      if($paginator['page'] < 5){
                        $numberPage = $paginator['page'] + 3;
                      }
                      break;
                     case '6':
                      if($paginator['page'] < 5){
                        $numberPage = $paginator['page'] + 4;
                      }
                      break;
                    case '7':
                      if($paginator['page'] < 5){
                        $numberPage = $paginator['page'] + 5;
                      }
                      break;
                    
                    default:
                      $numberPage = 0;
                      break;
                  }
                  $titlePage = '';
                  if($numberPage > 0){
                    $linkPage = $actionPage.$numberPage.$queryString;
                    $titlePage = 'Trang '.$numberPage;
                    if($numberPage == $paginator['page']){
                       echo '<span class=" '.$active.'">'.$numberPage.'</span>';       
                    }else{
                       echo '<span class=" '.$active.'" data-href="'.$linkPage.'"><a href="'.$linkPage.'">'.$numberPage.'</a></span>';       
                    }
                  }
              }
          }
        ?>
     <?php 
          $linkNext = '#';
          $linkLast = '#';
          $titleNext = '';
          if($numberPageNext){
            $linkLast = $actionPage.$paginator['totalPage'].$queryString;
            $linkNext = $actionPage.$numberPageNext.$queryString;
            $titleNext = 'Trang '.$numberPageNext;
          }
       ?>
    <span class="toilui" data-href="<?= $linkLast  ?>"><a href="<?= $linkLast  ?>">&raquo;</a></span>
<?php } ?>