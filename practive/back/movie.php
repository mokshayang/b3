<button onclick="location.href='?do=movie_add'">新增電影</button>
<hr>
<style>
    .item {
        display: grid;
        grid-template-columns: 3fr 3fr 14fr;
        align-items: center;
        text-align: center;
    }

    .hall {
        height: 420px;
        overflow: auto;
    }
    .item {
        border: 1px solid #333;
        border-radius: 5px;
        margin-top: 5px;
        height: 90px;
    }
    .top{
        display: grid;
        grid-template-columns: repeat(3,1fr);
    }
</style>
<div class="hall">
    <?php
    $rows = $Movie->all(['sh' => 1], " order by rank ");
    foreach ($rows as $k => $row) {
        $prev = ($k == 0) ? $row['id'] : $rows[$k - 1]['id'];
        $next = ($k + 1 == count($rows)) ? $row['id'] : $rows[$k + 1]['id'];
        $sel = ($row['sh'] == 1) ? 'checked' : '';
    ?>
        <div class="item">
            <div>
                <img src="upload/<?= $row['poster'] ?>" style="width:72px">
            </div>
            <div>
                <img src="icon/03c0<?=$row['level']?>.png" style="vertical-align:center">
            </div>
            <div>
                <div class="top">
                    <div>片名:<?=$row['name']?></div>
                    <div>片長:<?=$row['length']?></div>
                    <div>上映時間<?=$row['ondate']?></div>
                </div>
                <div>
                    <button onclick="show(<?=$row['id']?>)"><?=($row['sh']==1)?'顯示':'隱藏';?></button>
                    <button type="button" onclick="sw('<?= $do ?>',<?= $row['id'] ?>,<?= $prev ?>)">往上</button>
                    <button type="button" onclick="sw('<?= $do ?>',<?= $row['id'] ?>,<?= $next ?>)">往下</button>
                    <button onclick="location.href='?do=movie_edit&id=<?=$row['id']?>'">編輯電影</button>
                    <button onclick="del('<?=$do?>',<?=$row['id']?>)">刪除電影</button>
                </div>
                <div><?=$row['intro']?></div>
            </div>
        </div>
    <?php } ?>
</div>