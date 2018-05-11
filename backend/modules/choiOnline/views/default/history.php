<?php 
	if(isset($dataLoto) && $dataLoto){

 ?>
<tr>
    <td>Ngày</td>
    <td>Lô ghi</td>
    <td>Điểm ghi</td>
    <td>Nháy</td>
    <td>Thắng/Thua</td>
</tr>
<?php 
	foreach ($dataLoto as $key => $value) {
		$date = date('d-m-Y',strtotime($value['CREATED_AT']));

		$lotoNumber = $value['LOTO_NUMBER'];
		$lotoPrice  = $value['LOTO_PRICE'];
		$isLoto     = $value['IS_LOTO'];
		$xienLoto   = $value['LO_XIEN'];
		if(is_null($xienLoto)){
	        $xienLoto = '<strong class="imgloadig"></strong>';
	    }
	    if(is_null($isLoto)){
	        $isLoto = '<strong class="imgloadig"></strong>';
	    }else{
	        if(isset($isLoto) && $isLoto){
	            $isLoto = "thắng";
	            $total = number_format($lotoPrice*$xienLoto*80*1000,'0',',','.');
	        }else{
	            $isLoto = "thua";
	        }
	    }
 ?>
<tr>
    <td><?= $date ?></td>
    <td><?= $lotoNumber ?></td>
    <td><?= $lotoPrice ?></td>
    <td><?= $xienLoto ?></td>
    <td><?= $isLoto ?></td>
</tr>
<?php } ?>
<?php } ?>