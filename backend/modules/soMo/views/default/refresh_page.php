
<?php 
if(isset($dataProviders) && $dataProviders){

    foreach ($dataProviders as $key => $dataProvider) {
            $giac_mo = $dataProvider['giac_mo'];
            $boi_so  = $dataProvider['boi_so'];
     ?>
        <tr>
            <td><?= $key + 1  ?></td>
            <td><?= $giac_mo ?></td>
            <td><?= $boi_so ?></td>
        </tr>
    <?php } ?>
<?php } ?>