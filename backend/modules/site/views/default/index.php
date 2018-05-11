 <?php 
    // Lien ket nhom Quản lý Tài khoản
    $baseUrl = Yii::$app->params['baseUrl'];
    $linkMenu  = ''; 
    $linkMenu .= '<li><a href="'.$baseUrl.'articles'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Bài viết</a></li>'; 
    $linkMenu .= '<li><a href="'.$baseUrl.'khuChotSoAd'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Khu chốt số</a></li>'; 
    if($permissions && in_array('accounts', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'accounts'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Tài khoản</a></li>'; 
    }

    if($permissions && in_array('userPermission', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'userPermission'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Phân quyền tài khoản</a></li>';     
    }

    if($permissions && in_array('userPermissionAdvanced', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'userPermissionAdvanced'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Phân quyền tài khoản dạng list</a></li>';       
    }
    
    // Lien ket nhom Quản lý group
    $numberLinkManagerGroup  = 0; 
    if($permissions && in_array('groupAccount', $permissions)){
        $linkMenu .= '<li> <a href="'.$baseUrl.'groupAccount'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i> Nhóm tài khoản</a></li>';     
    }
    if($permissions && in_array('groupAccountDetail', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'groupAccountDetail'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Nhóm tài khoản chi tiết</a></li>';      
    }
    if($permissions && in_array('groupPermission', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'groupPermission'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Phân quyền nhóm tài khoản</a></li>';       
    }
    if($permissions && in_array('groupPermissionAdvanced', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'groupPermissionAdvanced'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Phân quyền nhóm tài khoản Dạng list</a></li>';     
    }
    // Lien ket Quản lý Module

    if($permissions && in_array('moduleManager', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'moduleManager'.Yii::$app->params["suffix"].'"><i class="icon-dashboard"></i>Quản lý Module</a></li>';       
    }
    // Lien ket Quản lý Dịch vụ

    if($permissions && in_array('providers', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'providers'.Yii::$app->params["suffix"].'">Nhà cung cấp dịch vụ</a></li>';       
    }
    if($permissions && in_array('service', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'service">Dịch vụ</a></li>';      
    }
    if($permissions && in_array('userService', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'userService'.Yii::$app->params["suffix"].'">Dịch vụ đăng ký</a></li>';      
    }
    if($permissions && in_array('userServiceRegister', $permissions)){
        $linkMenu .= '<li><a href="'.$baseUrl.'userServiceRegister'.Yii::$app->params["suffix"].'">Người dùng đăng ký dịch vụ</a></li>';       
    }
 ?>
<div class="container-fluid">
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <?php 
                if(isset($linkMenu) && $linkMenu){
                    echo $linkMenu;
                }
             ?>
        </ul>
   </div>
   
</div>