$(function(){
    //自定义滚动条(已在HTML中导入滚动条的文件)
    //监听歌曲的移入移出事件
    $(".list_music").hover(function(){
        //移入：显示子菜单 find()是找到所有的子节点 加参数就可以找到特定的子节点
        //this就是"list_music" 
        $(this).find(".list_menu").stop().fadeIn(100);
        $(this).find(".list_time a").stop().fadeIn(100);
        //隐藏时长
        $(this).find(".list_time span").stop().fadeOut(100);
    },function(){
        //移出：隐藏子菜单
        $(this).find(".list_menu").stop().fadeOut(100);
        $(this).find(".list_time a").stop().fadeOut(100);
        //显示时长
        $(this).find(".list_time span").stop().fadeIn(100);
    });
    //监听复选框的点击(切换当前的模式)
    $(".list_check").click(function(){
        //切换当前的模式
        $(this).toggleClass(".list_checked");
    });
});