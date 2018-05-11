<style>
    
.cau_lo {
    background: #FED683;
    padding: 2px;
    font-size: 15px;
    font-weight: bold;
}
.cau_vt1 {
    color: #0033FF;
    font-size: 18px;
    font-weight: bold;
}

</style>

<form name="f" action="soicau<?= Yii::$app->params['suffix'] ?>" method="GET" style="margin:10px 0"><input type="hidden" name="submit" value="1"><input type="hidden" name="setmode" value="full">
<b>Độ dài của cầu:</b> <select name="exactlimit"><option value="0">Bằng hoặc hơn</option><option value="1" selected="">Chính xác bằng</option></select>&nbsp; <input size="2" name="limit" value="2" style="width:25px; font-size:13px; font-weight:bold">&nbsp;ngày&nbsp;&nbsp;<input type="submit" class="button" value=" Soi cầu ">
<div style="margin:5px 0 5px 0"><a class="a_small" href="javascript:void(0)" onclick="var opts=document.getElementById(&quot;opts&quot;); if(opts.style.display==&quot;none&quot;){opts.style.display=&quot;block&quot;; this.innerHTML=&quot;Tùy chọn ▲&quot;} else {opts.style.display=&quot;none&quot;; this.innerHTML=&quot;Tùy chọn ▼&quot;}">Tùy chọn ▲</a></div>
<div id="opts" style="float:left; background:#FFF5E8; border:#F3DCB1 1px solid; padding:5px">
    Ngày <input size="10" name="ngay" id="ngay" value="20/10/2017" class="hasDatepicker">
    <select name="nhay" id="nhay" onchange="if(this.value>1)f.db.checked=0">
        <option value="1">1 nháy
        </option><option value="2" selected="">2 nháy
        </option><option value="3" >3 nháy
        </option><option value="4">4 nháy
        </option><option value="5">5 nháy
    </option></select>
    <input type="checkbox" name="db" value="1" onclick="if(this.checked)nhay.selectedIndex=0" id="db"><label for="db">Giải đặc biệt</label>
    <input type="radio" name="lon" value="1" id="caulon" checked=""><label for="caulon">Lộn</label> <input type="radio" name="lon" value="0" id="khonglon"><label for="khonglon">Không lộn</label>
    <script>picker('ngay')</script>
</div>
<div style="clear:both"></div>
</form>

<?php   

    if(isset($showcauareas) && count($showcauareas) > 0){
        print_r($showcauareas);
        //echo 'dang sau cau';
    }else{
        // echo 'ko sau cau';
        if(isset($tableCauRun)){
           print_r($tableCauRun);
        }
        if(isset($tableMatranCau) ){
           print_r($tableMatranCau);
        }
    }
    

    if(isset($vitriCaus) && count($vitriCaus) > 0){
       
       foreach ($vitriCaus as $key => $vitriCau) {
           echo $vitriCau .' - ';
       }
    }
 ?>

 <div id=showcauarea>
 </div>
