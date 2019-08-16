var oUl = $('ul');
var oLi = $('li');
//未展示的宽度 (ulW-400)/(len-1)
var len = oLi.clientHeight;
var width = oUl.css('width');
var flag=true;
//初始化
function init(){
    bindEvent();
    if(flag){
        liChange($(oLi[len-1]));
    }
}
function bindEvent(){
    oLi.on('click',function(){
        if(($(this).index()+1)==len){
            flag=false;
        }else{
            flag=true;
        }
        liChange($(this));
    });
    oUl.on('mouseleave',function(){
        init();
    })
}
function liChange(event){
    event.animate({
        'width':'400px'
    },300,'linear').siblings().animate({
        'width':oW+'px'
    },300,'linear');
    event.find('.title').css('display','none');
    event.siblings().find('.title').css('display','block');
    event.find()
}