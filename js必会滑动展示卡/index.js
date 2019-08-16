
// 获得到每个li的宽度及margin  作为单位移动距离
var width = $('.wrapper li').outerWidth(true);

// 获得到li图片长度
var len = $('li').length;

// 显示区域图片个数
var num = 4;

// 标记移动单位
var i = 0;

bindEvent();
function bindEvent() {
    // 点击左按钮   当前标记移动单位减一
    $('.left').on('click', function () {
        i--;
        // 如果不是第一张图片 可以继续向前移动
        if (i >= 0) {
            $('.box').animate({ 'left': -(i * width) + 'px' })
        //如果移动到头 left值为0 
        } else {
            i = 0;
            $('.box').animate({ 'left': '0px' })
        }
    });
    // 点击右侧按钮  当前移动标记单位加1
    $('.right').on('click', function () {
        i++;
        // 判断临界值 
        if (i <= len - num) {
            $('.box').animate({ 'left': -(i * width) + 'px' })
        // 如果右侧不能继续向右移动   i赋值为固定值 同时确定当前left
        }else{
            i = len - num;
            $('.box').animate({ 'left': -(i * width) + 'px' })
        }
    })
}


