/**
 * Created by HUCC on 2016/12/21.
 */
$.fn.bgColor = function (color) {
    //原型对象的this指的就是jQuery
    this.css("backgroundColor", color);
    return this;
}