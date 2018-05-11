<?php 
	 	$baseUrl = Yii::$app->params['baseUrl'];
	 	$suffix = Yii::$app->params['suffix'];
        $permissions = Yii::$app->acl->getPermissionMenu();

        // $permissions = [
        // 	'users',
        // 	'userPermission',
        // 	'userPermissionAdvanced',

        // 	'groupAccount',
        // 	'groupAccountDetail',
        // 	'groupPermission',
        // 	'groupPermissionAdvanced',

        // 	'moduleManager',

        // 	'providers',
        // 	'service',
        // 	'userService',
        // 	'userServiceRegister',
        // ];

 ?>
 <?php 
 	// Lien ket nhom Quản lý Tài khoản
 	$managerUserGroup  = ''; 
 	$numberLinkManagerUserGroup  = 0; 
	if($permissions && in_array('users', $permissions)){
		$managerUserGroup .= '<li><a href="'.$baseUrl.'users'.$suffix.'">Tài khoản</a></li>';	
		$numberLinkManagerUserGroup += 1;	
	}
	
	if($permissions && in_array('userPermissionAdvanced', $permissions)){
		$managerUserGroup .= '<li><a href="'.$baseUrl.'userPermissionAdvanced'.$suffix.'">Phân quyền tài khoản dạng list</a></li>';		
		$numberLinkManagerUserGroup += 1;	
	}
	
 	// Lien ket nhom Quản lý group
 	$managerGroup  = ''; 
 	$numberLinkManagerGroup  = 0; 
 	if($permissions && in_array('groupAccount', $permissions)){
		$managerGroup .= '<li><a href="'.$baseUrl.'groupAccount'.$suffix.'">Nhóm tài khoản</a></li>';		
		$numberLinkManagerGroup += 1;	
	}
	if($permissions && in_array('groupAccountDetail', $permissions)){
		$managerGroup .= '<li><a href="'.$baseUrl.'groupAccountDetail'.$suffix.'">Nhóm tài khoản chi tiết</a></li>';		
		$numberLinkManagerGroup += 1;	
	}
	/*if($permissions && in_array('groupPermission', $permissions)){
		$managerGroup .= '<li><a href="'.$baseUrl.'groupPermission">Phân quyền nhóm tài khoản</a></li>';		
		$numberLinkManagerGroup += 1;	
	}*/
	if($permissions && in_array('groupPermissionAdvanced', $permissions)){
		$managerGroup .= '<li><a href="'.$baseUrl.'groupPermissionAdvanced'.$suffix.'">Phân quyền nhóm tài khoản Dạng list</a></li>';		
		$numberLinkManagerGroup += 1;	
	}
 	// Lien ket Quản lý Module
 	$moduleManager = '';
	$numberLinkModuleManager = 0;	

 	if($permissions && in_array('moduleManager', $permissions)){
		$moduleManager .= '<li><a href="'.$baseUrl.'moduleManager'.$suffix.'"><i class="icon icon-th-list"></i> <span>Quản lý Module</span> </a></li>';		
		$numberLinkModuleManager += 1;	
	}
	// Lien ket Quản lý Customize WEb
 	$customizeWeb = '';
	$numberLinkCustomizeWeb = 0;	

 	if($permissions && in_array('customizeWeb', $permissions)){
		$customizeWeb .= '<li><a href="'.$baseUrl.'customizeWeb'.$suffix.'"><i class="icon icon-th-list"></i> <span>Quản lý customizeWeb</span> </a></li>';		
		$numberLinkCustomizeWeb += 1;	
	}
	
	// Lien ket Quản lý Tin tức
 	$managerNews = '';
	$numberLinkNews = 0;	

 	if($permissions && in_array('categories', $permissions)){
		$managerNews .= '<li><a href="'.$baseUrl.'categories'.$suffix.'"><i class="icon icon-th-list"></i> <span>Danh mục</span> </a></li>';
		$numberLinkNews += 1;	
	}
	if($permissions && in_array('articles', $permissions)){
		$managerNews .= '<li><a href="'.$baseUrl.'articles'.$suffix.'"><i class="icon icon-th-list"></i> <span>Bài viết</span> </a></li>';
		$numberLinkNews += 1;	
	}
	// Lien ket Quản lý Tin tức
 	$managerKqxs= '';
	$numberLinkKqxs = 0;	

 	if($permissions && in_array('ketQuaMienBac', $permissions)){
		$managerKqxs .= '<li><a href="'.$baseUrl.'ketQuaMienBac'.$suffix.'"><i class="icon icon-th-list"></i> <span>Kết quả miền bắc</span> </a></li>';
		$numberLinkKqxs += 1;	
	}
	if($permissions && in_array('ads', $permissions)){
		$managerKqxs .= '<li><a href="'.$baseUrl.'ads'.$suffix.'"><i class="icon icon-th-list"></i> <span>Quảng cáo</span> </a></li>';
		$numberLinkKqxs += 1;	
	}
	if($permissions && in_array('money', $permissions)){
		$managerKqxs .= '<li><a href="'.$baseUrl.'money'.$suffix.'"><i class="icon icon-th-list"></i> <span>Số tiền của tài khoản</span> </a></li>';
		$numberLinkKqxs += 1;	
	}
	// Lien ket Quản lý Chot si
 	$managerChotSo= '';
	if($permissions && in_array('khuChotSoAd', $permissions)){
		$managerChotSo .= '<li><a href="'.$baseUrl.'khuChotSoAd'.$suffix.'"><i class="icon icon-th-list"></i> <span>Chốt số</span> </a></li>';
	}
	
	
 ?>



<div id="sidebar"><a href="#" class="visible-phone">Danh mục</a>
	<ul>
	    <li class="active"><a href="<?= $baseUrl ?>"><i class="icon icon-home"></i> <span>SoiCauXS.Com</span></a> </li>
	    <?php 
	    	if($managerUserGroup){

	     ?>
	    <li class="submenu"> 
			<a href="#"><i class="icon icon-th-list"></i> <span>Quản lý Tài khoản</span> <span class="label label-important"><?= $numberLinkManagerUserGroup ?></span></a>
		    <ul>
		        <?= $managerUserGroup ?>
		    </ul>
	    </li>
	    <?php } ?>

	    <?php 
	    	if($managerGroup){

	     ?>
	    <li class="submenu"> 
			<a href="#"><i class="icon icon-th-list"></i> <span>Quản lý group</span> <span class="label label-important"><?= $numberLinkManagerGroup ?></span></a>
		    <ul>
		    	<?= $managerGroup ?>
		    </ul>
	    </li>
	    <?php } ?>

	    <?php 
	    	if($moduleManager){
	    		echo $moduleManager;
	    	}

	     ?>
		<?php 
	    	if($managerChotSo){
	    		echo $managerChotSo;
	    	}

	    ?>

	    <?php 
	    	if($managerNews){

	     ?>
	    <li class="submenu"> 
			<a href="#"><i class="icon icon-th-list"></i> <span>Quản lý tin tức</span> <span class="label label-important"><?= $numberLinkNews ?></span></a>
		    <ul>
		    	<?= $managerNews ?>
		    </ul>
	    </li>
	    <?php } ?>

		<!-- KET QUA XS  -->

	    <?php 
	    	if($managerKqxs){

	     ?>
	    <li class="submenu"> 
			<a href="#"><i class="icon icon-th-list"></i> <span>Quản lý Kqxs</span> <span class="label label-important"><?= $numberLinkKqxs ?></span></a>
		    <ul>
		    	<?= $managerKqxs ?>
		    </ul>
	    </li>
	    <?php } ?>
	   
	    <?php 
	    	if($customizeWeb){
	    		echo $customizeWeb;
	    	}

	     ?>
  </ul>
</div>