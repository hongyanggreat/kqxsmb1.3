<!-- Bảng kết quả xổ sô -->
<?php 
    $loading = "loading...";
	$loading = '<strong class="imgloadig"></strong>';
 ?>

 <style>
         .imgloadig {
            background: url(<?php echo $baseUrl ?>kqxs/icons/loading-green.gif) no-repeat;
            width: 16px;
            height: 18px;
            margin: auto;
            display: block;
            zoom: 1;
            padding: 2px 0;
        }
 </style>
<div class="chu-vua danhmuc">
	Kết quả xổ số  : ngày <?php echo   substr($ketqua['rs_date'], 0,-9) ?>
	
</div>
<br>
<table cellspacing="5" cellpadding="5" class="kqxs-home chu-nho">
    <tr>
        <td style="width: 15%;" class="nen-xanh trang">Giải ĐB</td>
        <td colspan="12">
        	<?php 
        		if(isset($ketqua['rs_0_0']) && $ketqua['rs_0_0']){
        			echo $ketqua['rs_0_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
    <tr>
        <td>Giải nhất</td>
        <td colspan="12">
        	<?php 
        		if(isset($ketqua['rs_1_0']) && $ketqua['rs_1_0']){
        			echo $ketqua['rs_1_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
    <tr>
        <td>Giải nhì</td>
        <td colspan="6">
        	<?php 
        		if(isset($ketqua['rs_2_0']) && $ketqua['rs_2_0']){
        			echo $ketqua['rs_2_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="6">
        	<?php 
        		if(isset($ketqua['rs_2_1']) && $ketqua['rs_2_1']){
        			echo $ketqua['rs_2_1'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
    <!-- Giải ba -->
    <tr>
        <td rowspan="2">Giải ba</td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_3_0']) && $ketqua['rs_3_0']){
        			echo $ketqua['rs_3_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_3_1']) && $ketqua['rs_3_1']){
        			echo $ketqua['rs_3_1'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_3_2']) && $ketqua['rs_3_2']){
        			echo $ketqua['rs_3_2'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_3_3']) && $ketqua['rs_3_3']){
        			echo $ketqua['rs_3_3'];
        		}else{
        			echo $loading;
        		}
        	 ?>
       	</td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_3_4']) && $ketqua['rs_3_4']){
        			echo $ketqua['rs_3_4'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_3_5']) && $ketqua['rs_3_5']){
        			echo $ketqua['rs_3_5'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>

    <!-- //ket thuc giai ba -->
    <tr>
        <td>Giải tư</td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_4_0']) && $ketqua['rs_4_0']){
        			echo $ketqua['rs_4_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_4_1']) && $ketqua['rs_4_1']){
        			echo $ketqua['rs_4_1'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_4_2']) && $ketqua['rs_4_2']){
        			echo $ketqua['rs_4_2'];
        		}else{
        			echo $loading;
        		}
        	 ?>
       	</td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_4_3']) && $ketqua['rs_4_3']){
        			echo $ketqua['rs_4_3'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
    <tr>
        <td rowspan="2">Giải năm</td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_5_0']) && $ketqua['rs_5_0']){
        			echo $ketqua['rs_0_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_5_1']) && $ketqua['rs_5_1']){
        			echo $ketqua['rs_5_1'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_5_2']) && $ketqua['rs_5_2']){
        			echo $ketqua['rs_5_2'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
    <tr>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_5_3']) && $ketqua['rs_5_3']){
        			echo $ketqua['rs_5_3'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_5_4']) && $ketqua['rs_5_4']){
        			echo $ketqua['rs_5_4'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_5_5']) && $ketqua['rs_5_5']){
        			echo $ketqua['rs_5_5'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
       
    </tr>
    <tr>
        <td>Giải sáu</td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_6_0']) && $ketqua['rs_6_0']){
        			echo $ketqua['rs_6_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_6_1']) && $ketqua['rs_6_1']){
        			echo $ketqua['rs_6_1'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="4">
        	<?php 
        		if(isset($ketqua['rs_6_2']) && $ketqua['rs_6_2']){
        			echo $ketqua['rs_6_2'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
    <tr>
        <td>Giải bảy</td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_7_0']) && $ketqua['rs_7_0']){
        			echo $ketqua['rs_7_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_7_1']) && $ketqua['rs_7_1']){
        			echo $ketqua['rs_7_1'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_4_2']) && $ketqua['rs_0_0']){
        			echo $ketqua['rs_0_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
        <td colspan="3">
        	<?php 
        		if(isset($ketqua['rs_4_2']) && $ketqua['rs_0_0']){
        			echo $ketqua['rs_0_0'];
        		}else{
        			echo $loading;
        		}
        	 ?>
        </td>
    </tr>
</table>
<br>