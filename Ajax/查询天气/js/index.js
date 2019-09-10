$(document).ready(function(){

    $("#headerGet").on("keydown",function(e){
        if(e.keyCode==13){
            var param=$(this).val();

        }
    })
    function getData(param){
        var param=param?param:"北京";
        $.ajax({
            type:"get",
            url:"http://api.jisuapi.com/weather/query",
            data:{
                appkey:"eee8cabc1e612cd",
                city:param
            },
            dataType:'jsonp',
            jsonp:'callback',
            success:function(json){
                var html=template('tmpl',json);
                $("#ulLists").htm(html);
            }
        })
    }
});