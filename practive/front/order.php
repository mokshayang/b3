<h3 class="ct">線上訂票</h3>
<style>
    table {
        width: 30%;
        margin: auto;
    }
</style>
<div id="ord">
    <table>
        <tr>
            <td>電影:</td>
            <td>
                <select name="" id="movs"></select>
            </td>
        </tr>
        <tr>
            <td>日期:</td>
            <td>
                <select name="" id="days"></select>
            </td>
        </tr>
        <tr>
            <td>場次:</td>
            <td>
                <select name="" id="session"></select>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button onclick="$('#ord,#booking').toggle(),booking()">確定</button>
        <button>重置</button>
    </div>
</div>
<div id="booking" style="display:none">

</div>
<script>
getMovs();

function booking(){
    let into = {
            movie:$('#movs option:selected').text(),
            days:$('#days').val(),
            session:$('#session').val(),
    };
    $.get("api/booking.php",into,(res)=>{
        $('#booking').html(res);
        $('#mov').text(into.movie)
        $('#day').text(into.days)
        $('#sess').text(into.session)
    });
}


function getMovs(){
    let movs = $('#movs');
    let par = location.href.split("?")[1].split("&");
    $.get("api/get_movie.php",(res)=>{
        movs.html(res)
        if(par[1]) $(`option[value=${par[1].split("=")[1]}]`).prop('selected',true);
        getDays(movs.val());
        movs.on('change',()=>getDays(movs.val()));
    })
}
function getDays(id){
    let days = $('#days');
    $.get("api/get_date.php",{id},(res)=>{
        days.html(res)
        getSess(id,days.val());
        days.on('change',()=>getDays(id,days.val()));
    })
}
function getSess(id,date){
    $.get("api/get_session.php",{id,date},(res)=>{
        $('#session').html(res)
    })
}
</script>