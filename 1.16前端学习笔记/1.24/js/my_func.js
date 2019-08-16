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