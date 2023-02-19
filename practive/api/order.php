<?php include_once "base.php";
if(!empty($_POST['seats'])){
$max = $Ord->max('id')+1;
$_POST['num'] = date("Ymd").sprintf("%04d",$max);
sort($_POST['seats']);
$_POST['qt'] = count($_POST['seats']);
$_POST['seats'] = serialize($_POST['seats']);
$Ord->save($_POST)
?>
<div class="ct">
<p>您選擇的電影 : 訂單編號 :<?=$_POST['num']?></p>
<p>日期 :<?=$_POST['date']?></p>
<p>場次時間<?=$_POST['session']?></p>
<p>座位 : <br>
    <?php
    $seats = unserialize($_POST['seats']);
    foreach($seats as $seat){
        echo floor(($seat/5)+1)."排".($seat%5+1)."號";
        echo "<br>";
    }
    ?>
    <br>
    共 <?=$_POST['qt']?> 張票
</p>
<button onclick="location.href='index.php'">確定</button>

</div>



<?php }else{ ?>
    <div class="ct">
        <h3>尚未選擇座位喔</h3>
        <button onclick="booking()">選擇座位</button>
    </div>
<?php } ?>

