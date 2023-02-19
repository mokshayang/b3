<?php include_once "base.php";
$t = $Movie->find($_GET['id']);
$date = $_GET['date'];
$hr = date("G");
if($date == date("Y-m-d") && $hr >= 14){
    $st = ($hr/2)-5;
}else{
    $st = 1;
}
for($i=1;$i<=5;$i++){
    $st = $Ord->sum('qt',['movie'=>$t['name'],'date'=>$date,'session'=>$Ord->sss[$i]]);
    echo "<option value='{$Movie->sss[$i]}'>";
    echo $Movie->sss[$i];
    echo " 剩餘座位". (20-$st);
    echo "</option>";
}


