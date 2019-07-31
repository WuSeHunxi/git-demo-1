window.onload=function(){
    var text=document.querySelector("#banner .text");
    var child=text.children;
    text.style.transition='2s all ease-in';
    text.style.width="424px";
    text.style.opacity='1';
    text.num=0;
    text.addEventListener('transitioned',function(){
        text.num++;
        if(text.num==1){
            child[0].style.animation='1s left';
            child[1].style.animation='1s right';
            var html=document.querySelector("html");
            html.style.animation=".9s shake";
            var iframe=document.createElement("iframe");
            iframe.allow="autoplay";
            iframe.style="display:none";
            iframe.src="video/3360.mp3";
            document.body.appendChild(iframe);
        }
    });
};
