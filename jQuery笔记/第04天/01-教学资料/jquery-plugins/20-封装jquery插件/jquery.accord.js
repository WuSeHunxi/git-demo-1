/**
 * Created by HUCC on 2016/12/21.
 */
$.fn.accord = function (arr ,width) {
    var $li = this.find("li");

    width = width || 100;
    var boxWidth = this.width();
    var maxWidth = boxWidth - ($li.length -1) * width;
    var avgWidth = boxWidth/$li.length;

    $li.each(function (i, e) {
        $(e).css("backgroundColor", arr[i]);
    });

    $li.mouseenter(function () {
        $(this).stop().animate({"width":maxWidth+"px"}).siblings().stop().animate({"width":width+"px"});
    });

    $li.mouseleave(function () {
        $li.animate({"width":avgWidth+"px"});
    });
};