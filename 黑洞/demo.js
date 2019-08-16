window.onload=function(){
    var fImg=document.querySelector(".fImg");
    var divs=document.querySelectorAll(".fCenter div");
    fImg.style.animation='3s black linear';
    setTimeout(function(){
        for(var i=0;i<divs.length;i++){
            divs[i].l=divs[i].offsetLeft;
            divs[i].t=divs[i].offfsetTop;
            divs[i].style.left=(fImg.offsetWidth-divs[i].offsetWidth)/2+'px';
            divs[i].style.top=(fImg.offsetHeight-divs[i].offsetHeight)/2+'px';
            divs[i].style.transform='scale(0)';
        }
    },2000);
    fImg.addEventListener('animationend',end);
    function end(){
        this.style.transform='scale(0)';
        setTimeout(function(){
            for(var i=0;i<divs.length;i++){
                divs[i].style.left=divs[i].l+'px';
                divs[i].style.top=divs[i].t+'px';
                divs[i].style.transform='scale(1)';
            }
            fImg.style.transition='0.2s';
            fImg.style.transform='scale(1)';
        },2000);
    }
    fImg.addEventListener('transitionend',function(){
        this.style.animation='10s blackRoate linear infinite';
    })
}