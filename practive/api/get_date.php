<?php include_once "base.php";
$t = $Movie->find($_GET['id']);
$today = strtotime(date("Y-m-d"));
$tt = 3+(strtotime($t['ondate']) - $today)/(60*60*24);
for($i=1;$i<=$tt;$i++){
    $date = date("Y-m-d",strtotime("+$i day"));
    $str = date("m月d日 l",strtotime("+$i day"));
    echo "<option valut=$date>$str</option>";
}