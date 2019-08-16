function $(id){
    return typeof id==="string"?document.getElementById(id):null;
}
function scroll(){
    if(window.pageYOffset!==null){
        return{
            top:window.pageYOffset,
            left:window.pageXOffset
        }
    }else if(document.compatMode==="CSS1Compat"){
        return{
            top:document.documentElement.scrollLeft,
            left:document.documentElement.scrollLeft
        }
    }
    return{
        top:document.body.scrollTop,
        left:document.body.scrollLeft
    }
}
function animation(obj,target,step){
    //清除定时器
    clearInterval(obj.time);
    //判断方向
    var dir=obj.offsetLeft<target?step:-step;
    //设置定时器
    obj.time=setInterval(function(){
        obj.style.left=obj.offsetLeft+dir+"px";
        if(Math.abs(target-obj.offsetLeft)<Math.abs(dir)){
            clearInterval(obj.time);
            obj.style.left=target+"px";
        }
    },20);
}
function buffer(obj,json,fn){//obj:对象，attr:属性值，fn:回调函数(回调函数存在就会自动执行)
    clearInterval(obj.time);
    obj.time=setInterval(function(){
        var flag=true;
        for(var k in json){
            begin=parseInt(getCssAttrValue(obj,k))||0;//每一个传入的属性
            target=parseInt(json[k]);//每一个传入的属性值
            speed=(target-begin)*0.2;//步长
            //向上取整
            speed=(target>begin)?Math.ceil(speed):Math.floor(speed);
            //让盒子动起来
            obj.style[k]=begin+speed+"px";
            //判断是否继续运行，得保证传入的每一个值和最后运动的距离相同
            if(begin!==target){
                flag=false;//当为false时，继续运动
            }
        }
        if(flag){//当为true时，停止运动，清除定时器
            clearInterval(obj.time);
            //判断有没有回调函数
            if(fn){
                fn();
            }                
        }
    },20);
}
function changeCss(obj,attr,value){
    obj.style[attr]=value;
}
function getCssAttrValue(obj,attr){//获取属性值（obj是对象，attr是属性）
    if(obj.currentStyle){
        return obj.currentStyle[attr];
    }else{
        return window.getComputedStyle(obj,null)[attr];
    }
}
function client(){
    if(window.innerWidth){//ie9+最新浏览器
        return{
            width:window.innerWidth,
            height:window.innerHeight
        }
    }else if(document.compatMode==="CSS1Compat"){
        return{
            width:document.documentElement.clientWidth,
            height:document.documentElement.clientHeight
        }
    }
    return{
        width:document.body.clientWidth,
        height:document.body.clientHeight
    }
}