$(document).ready(function(){

    getDate();
    $("#headerGet").on("keydown",function(e){
        if(e.keyCode==13){
            var params=$(this).val();
            getDate(params);
        }
    });
    function getDate(params){
        var params=params?params:"北京";
        $.ajax({
            url:"http://api.jisuapi.com/weather/query",
            data:{
                appkey:"eee8cacbc1e612cd",
                city:params
            },
            dataType:"jsonp",
            jsonp:"callback",
            success:function(json){
                var html=template('tmplt',json);
                $("#ulLists").html(html);
            }
        })
    }
});