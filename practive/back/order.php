<h3 class="ct">訂單清單</h3>
<div> 快速刪除 :
    依日期 <input type="radio" name="type" value="date">
    <input type="text" name="" id="date">
    依電影 <input type="radio" name="type" value="movie">
    <select name="" id="movie">
        <?php
        $ms = $Ord->all(" group by movie");
        foreach ($ms as $m) {
            echo "<option value='{$m['movie']}'>{$m['movie']}</option>";
        }
        ?>
    </select>
    <button onclick="checkout()">刪除</button>
</div>
<style>
    .head,.item{
        display: grid;
        grid-template-columns: repeat(4,3fr) 2fr 3fr 2fr;
        align-items: center;
        text-align: center;
    }
    .head{
        width: 98%;
        grid-gap: 5px;
        padding: 5px auto;
    }
    .hall{
        height: 350px;
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
    <div>訂單標號</div>
    <div>電影名稱</div>
    <div>日期</div>
    <div>場次時間</div>
    <div>訂購數量</div>
    <div>訂購位置</div>
    <div>操作</div>
</div>
<div class="hall">
    <?php
    $ods = $Ord->all(" order by num desc");
    foreach ($ods as $od) {
    ?>
        <div class="item">
            <div><?=$od['num']?></div>
            <div><?=$od['movie']?></div>
            <div><?=$od['date']?></div>
            <div><?=$od['session']?></div>
            <div><?=$od['qt']?></div>
            <div>
                <?php
                $seats = unserialize($od['seats']);
                foreach ($seats as $seat) {
                    echo floor(($seat / 5) + 1) . "排" . ($seat % 5 + 1) . "號";
                    echo "<br>";
                }
                ?>
            </div>
            <div>
                <button onclick="del('ord',<?=$od['id']?>)">刪除</button>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    function qDel(){
        let type = $('input[name=type]:checked').val();
        let val;
        switch(type){
            case 'date':
                val = $('#date').val()
                break;
            case 'movie':
                val = $('#movie').val()
                break;
        }
        let chk = confirm(`確定要刪除${val}的所有資料`);
        if(chk){
            $.post("api/qDel.php",{type,val},()=>{
                location.reload();
            })
        }
    }
</script>