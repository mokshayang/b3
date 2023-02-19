<h3 class="ct">預告片清單</h3>
<style>
        .head,.item{
        display: grid;
        grid-template-columns: repeat(3,2fr) 3fr;
        align-items: center;
        text-align: center;
    }
    .head{
        width: 98%;
        grid-gap: 5px;
        padding: 5px auto;
    }
    .hall{
        height: 200px;
        overflow: auto;
    }
    .head>div{
        background-color: #ccc;
    }
    .item{
        border: 1px solid #333;
        border-radius: 5px;
        margin-top: 5px;
        height: 90px;
    }
</style>
<div class="head">
    <div>預告片清單</div>
    <div>預告片片名</div>
    <div>預告片排序</div>
    <div>操作</div>
</div>
<form action="api/tp_edit.php" method="post">
<div class="hall">
<?php
$rows = $Tp->all(['sh'=>1]," order by rank ");
foreach($rows as $k => $row){
$prev = ($k==0)?$row['id']:$rows[$k-1]['id'];
$next = ($k+1==count($rows))?$row['id']:$rows[$k+1]['id'];
$sel = ($row['sh']==1)?'checked':'';
?>
<div class="item">
    <div>
        <img src="upload/<?=$row['img']?>" style="width:72px">
    </div>
    <div><input type="text" name="name[]" value="<?=$row['name']?>"></div>
    <div>
        <button type="button" onclick="sw('<?=$do?>',<?=$row['id']?>,<?=$prev?>)">往上</button>
        <button type="button" onclick="sw('<?=$do?>',<?=$row['id']?>,<?=$next?>)">往下</button>
    </div>
    <div>
        <input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$sel?>> 顯示
        <input type="checkbox" name="del[]" value="<?=$row['id']?>"> 刪除 &nbsp;&nbsp;
        <select name="ani[]" id="">
            <option value="1" <?=($row['ani']==1)?'selected':'';?>>淡入淡出</option>
            <option value="2" <?=($row['ani']==2)?'selected':'';?>>滑入滑出</option>
            <option value="3" <?=($row['ani']==3)?'selected':'';?>>縮放</option>
        </select>
        <input type="hidden" name="id[]" value="<?=$row['id']?>">
    </div>
</div>
<?php } ?>
</div>

<div class="ct">
    <input type="submit" value="編輯確定">
    <input type="reset" value="重置">
</div>
</form>
<hr>
<form action="api/tp_add.php" method="post" enctype="multipart/form-data">
<h3 class="ct">新增預告片海報</h3>
預告片海報 : <input type="file" name="img">
預告片片名 : <input type="text" name="name" id="">
<div class="ct">
    <input type="submit" value="新增">
    <input type="reset" value="重置">
</div>
</form>
