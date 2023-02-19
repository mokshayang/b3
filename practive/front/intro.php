<?php
$m = $Movie->find($_GET['id']);
?>
<div class="tab rb" style="width:87%;">
  <div style="background:#FFF; width:100%; color:#333; text-align:left">
    <video src="upload/<?=$m['trailer']?>" width="300px" height="250px" controls="" style="float:right;"></video>
    <font style="font-size:24px"> <img src="upload/<?=$m['poster']?>" width="200px" height="250px" style="margin:10px; float:left">
      <p style="margin:3px">影片名稱 ：<?=$m['name']?>
        <input type="button" value="線上訂票" onclick="location.href='?do=order&id=<?= $m['id'] ?>'" style="margin-left:50px; padding:2px 4px" class="b2_btu">
      </p>
      <p style="margin:3px">影片分級 ： <img src="icon/03C0<?=$m['level']?>.png" style="display:inline-block;"><?=$Movie->lv[$m['level']]?> </p>
      <p style="margin:3px">影片片長 ： <?=$m['length']?>分</p>
      <p style="margin:3px">上映日期 <?=$m['ondate']?></p>
      <p style="margin:3px">發行商 ： <?=$m['publish']?></p>
      <p style="margin:3px">導演 ： <?=$m['director']?></p>
      <br>
      <br>
      <p style="margin:10px 3px 3px 3px; word-break:break-all"> 劇情簡介：<?=$m['intro']?><br>
      </p>
    </font>
    <table width="100%" border="0">
      <tbody>
        <tr>
          <td align="center"><input type="button" value="院線片清單" onclick="location.href='?do=index'"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>