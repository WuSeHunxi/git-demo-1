window.onload=function(){
	var fImg=document.querySelector(".fImg");
	var divs=document.querySelectorAll(".fCenter div")
	
	fImg.style.animation='3s black linear';
	
	//把文字吸进去
	setTimeout(function(){
		for(var i=0;i<divs.length;i++){
			//一上来先把每个文字块的位置存一下，为了吐出来的时候能够找到对应的位置
			divs[i].l=divs[i].offsetLeft;
			divs[i].t=divs[i].offsetTop;
			
			//文字吸进去的时候要先都跑到中间的位置上去
			divs[i].style.left=fImg.offsetWidth/2-divs[i].offsetWidth/2+'px';
			divs[i].style.top=fImg.offsetHeight/2-divs[i].offsetHeight/2+'px';
			divs[i].style.transform='scale(0)';
		}
	},2000);
	
	fImg.addEventListener('animationend',end);
	function end(){
		//让黑洞消失一会，在这里this指向fImg，是因为animationend事件身上的原因
		this.style.transform='scale(0)';
		
		//停止一段时间后再吐出来，此时需要延迟执行，即可以使用setTimeout函数
		setTimeout(function(){
			for(var i=0;i<divs.length;i++){
				//根据上面存的值设置的
				divs[i].style.left=divs[i].l+'px';
				divs[i].style.top=divs[i].t+'px';
				divs[i].style.transform='scale(1)';
			}
			
			//让黑洞慢慢放大（重新出现），有过渡的效果
			fImg.style.transition='0.2s';
			fImg.style.transform='scale(1)';
		},500);
		
		//在过渡完成以后让它转起来 最后的情况
		fImg.addEventListener('transitionend',function(){
			this.style.animation='10s blackRoate linear infinite';
		},false);
	}
};
