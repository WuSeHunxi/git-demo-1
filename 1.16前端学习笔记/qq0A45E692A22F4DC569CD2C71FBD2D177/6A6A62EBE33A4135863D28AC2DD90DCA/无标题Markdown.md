# 前段
## 1.HTML(内容)
## 2.css(样式)
## 3.js(交互)



# 后端
## 1.java(管理系统)
## 2.php
## 3.node.js



# 数据库
## 1.Mysql
## 2.Oracle
## 3.Sqlserver



# HTML：处理文字信息
## 1.html是根标签,head是人看不到的，body是给用户看的内容。HTML的开头必不可少，每一个标签都有属性，属性名=“属性值”。
## HTML的字典，编码字符集<meta=UTF_8>，SEO搜索引擎优化技术。
## 2.并列兄弟标签
## 3.字符集"UTF_8"：出现乱码
## title：标签，出现在网页的标签中，网页的名。<html lang=en>,告诉编译器这是什么语言，告诉搜素引擎爬虫，我们的网站是什么内容的。SEO搜素引擎优化技术。
## 在head中的HTML是给网页看的
## <p>能够让标签成段展示，（h1-h6）标题标签，六级标题，从上到下依次递减：每一个标签独占一行；更改字体的大小；加粗字体。
## <strong>,<em>分别是字体加粗，斜体。
## <del>内容划线，又中划线的标签。
## <div>：容器：分块明确，使结构更加明确化；捆绑操作，把共性放在容器里，绑定一起操作。
## <span>:容器：结构化，更加清晰的分块。
## 空格：分割前后字符，不是空格文本，只能出现一次；空格文本的展示形式：(& nbsp符; ).html编码（nbsp）,(<)小于less than,(>)great than.
## 通常标签有开始和结束，标签可以嵌套，Web 浏览器的作用是读取 HTML 文档，并以网页的形式显示出它们。浏览器不会显示 HTML 标签，而是使用标签来解释页面的内容。
## 有序列表ol,li：成组出现
## ul.li：骨架，大的功能由子功能相同的组成，结构相同，内容有一些区别：导航栏，hover：表示当鼠标移上去之后会发生什么事。经常与导航栏一起出现。
## 图片：网上的url；本地的绝对路径；本地的相对路径。绝对路径：即图片和文件的保存的地址不同，所以要将地址写全，相对路径：即文件和图片的保存位置相同，可以直接写后面不一样的即可（1）当图片的格式出错时，使用alt展示信息。（2）title图片提示符。
## a标签：（1）链接，放啥都可以，可以是文字图片，地址，点击之后都会跳转链接，若要跳转到另一个页面：target=——blank。（2）锚点(记录一个位置，回到这个位置，在a标签中加入定点的表示位置id="#定点位置")，这样可以回到原来的地方；（3）打电话（很重要）；发邮件：maito+邮箱地址。（4）协议限定符：黑客。
## from表单标签：发送数据；需要发送数据方式（method=“get”），发送个谁：发送到的地址。from需要组建配合来实现功能。组件1：（1）input：提交（需要数据名name=“”和数据值（数据内容value(里面的的是啥就是啥)））（让数据更完整）type="radius"("checkbox"),表示单选（多选）。checked="chhecked"(默认选中)。（2）select(下拉菜单)：直接zaiselect中写数据名（option中的值就是数据值）。
## 主流浏览器（shell+内核）：IE (trident); fireform (Gecko); Google chrom(Webkit); Safari (Webkit); Opera (presto).
## html的注释：调错；解释。
# CSS的语法（样式）依赖结构而存在（层叠样式表）
## 1.引入css：（1）行间样式，直接在标签里写；（2）页面级css：在head中写《style typr="text/css"》;（3）外部css文件：建立新的文件.css。在head中写一个《link》标签。异步的：同时发生的；同步的：不同时发生的。
## 1.选择器：(1)id(id必须一一对应)选择器，即此时就有了一个id="only"地址，在css中写成(#only)；(2)class选择器：class与元素是多对多的，多个元素可以共用一个class；一个元素以u多个class：class=" demo demo1";(3)标签选择器：一选就是全部的。(4)通配符选择器：把所有的标签都作用，全局标签。(5)属性选择器[id=""/class=""]。（6）!important。（7）父子选择器（派生选择器）每一个层级都没有必要是标签选器，只要是由父子关系就行，父子关系可以直接也可以间接。（浏览器中的父子选择器是从右向左的）（7）直接子元素选择器（要加空格和>）与间接无关，必须是直接一级的。（8）并列选择器（多个限制条件控制一个元素，用并列选择器）（并列选择器和其他的并列要放在前面，除了id选择器）。（9）分组选择器（功能是一样的，共用一个代码块）。（10）伪类选择器hover（当鼠标移动到他所管辖的范围之内就会发生变化）,当你想要给你所选择的元素加上一些移动鼠标会产生的样式时，用hover.
## 优先级比较（权重值比较（256进制））：!important的优先级>行间样式的优先级>id的优先级>class的优先级和属性选择器>标签的优先级> ，只要写在同一横行的选择器将它们的权重值相加。
# 【伪元素】行级元素，要改变他的属性要加上（display:inline-block;）（没有html结构）存在任意一个元素里面，特殊的两个是：before,after,可以通过css将两个元素选出来：：标签+(::before){content:""(只存在于伪元素的里面，必须得写}/(::after).
## 选择一个元素可以用的方法
## 属性 1。font-size:字体大小（设置的是字体的高）。2.font-weight:字体加粗（lighter,bold,bolder,也可以用数字（100-900））。3.font-family:字体型号（arial）。4.font-style:(字体展示样式（斜体）)。5.color：设置字体颜色（颜色代码：ff（红）ff（绿）ff（蓝））;(rgb(255，355，355)颜色函数)。
## 属性 2.border（复合值）:盒子（border-width;border-style:dashed(条状虚线));border的每一个边都可以自行设置,border放大每条边相交时每个边平分，可以利用border画三角形（当height:0px;width:0px;）。border里面代表盒子的内容，边框代表盒子的边，盒子的边框可以把盒子的内容覆盖（当盒子的宽高都为0时）。
## 文本属性： 1.text-align:center(中间对齐);2.line-height:(单行文本所占高度：让文本所占高度等于容器高度)；2.text-indent:em(首航行缩进)(1em=1*fnt-size相对文字的大小进行所缩进;)
## del（禁止使用标签）和span：span{text-decoration:line-through/underline;cursor（是鼠标发生变化）:pointer(鼠标变成小手
# 标签归类：行级元素inline（span,del,strong,em,a）（内容决定元素大小和所占位置，不可以通过css改变宽高）display:inline；块级元素block(div,p,ul,li,ol,form,adress)（独占一行，可以改宽高）display:block;行级块元素inline-block（img：宽高会等比例缩放）（内容决定大小，可以改宽高）display:inline-block。【可以通过改变display的内容使上述三种类型的元素css样式发生改变】。PS：：凡是带有inline的元素都有文字特性。
## 是图片并列排在一起：（margin是元素和元素之间的空隙），将图片之间的空隙变没需要将img并排在一起写。
## 公司开发经验：（PS::适用于团队工作开发打包）：先定义功能，（后选用功能样式）在进行匹配。【例如：只有几个颜色和几个盒子的样式，但是要组成的盒子个数不取定，类型也不确定，就要用这种方法】。PS::一个html文件可以有多个css文件。
## 自定义标签（标签选择器：在标签刚出生时就将他们初始化）：赋予他们新的使命，通配符选择器：初始化所有标签，而且不会造成任何影响PS：：body有一个天生的margin:8px;（几乎所有标签都有margin和padding）。PS：：只有ul有list-style;如果a标签下面有img让它的border:0；em标签不需要斜体。
# 【盒子模型】（针对于html的每一个元素的，每一个元素都符合盒子模型的语法特点）：盒子模型：【盒子的三大部分：盒子壁（border），盒子内边距(padding有四个值，每个值可以不一样（左右等距的情况多），代表四个方向：（四个值):上右下左；（三个值，一个值的代表左右）：上左右下），盒子的内容区(with+height);外边距(margin)，性质和padding相似】。如果想把里面的盒子放在外面的盒子的中间的话，要让两个盒子一样大和在外的盒子套padding，四周都是一样的。PS：：盒模型的计算问题：只算盒子部分，margin不是盒子的部分。
## PS：盒模型的Bug
# 【层模型】（定位：让特定的元素在特定的位置出现）：（1）绝对定位：脱离原来位置进行定位，absolute:left/right,top/bottom只和position一起使用（脱离原来的层）。（2）relative:相对定位：保留原来位置进行定位，相对于自己原来产生的位置进行定位。PS::absolute：相对于最近的有定位（啥样的都可以）的父级进行定位，如果没有最近的有定位的父级那么相对于文档进行定位。（3）广告定位：固定定位（相对于窗口进行定位），咋地都不动（left:50%;top:50%,相对于文档进行定位）
## PS::z-indext:向屏幕靠近；border-radius:50%(圆);
# 定位：：参照物（relatve:保留原来位置，对后续元素没有影响）和定位(absolute，可以任意的调换自己的参照物，更灵活)
## margin的塌陷问题：：垂直方向上的父子元素的margin是一体的,取最大的那个值。现在想让子集相对于父级向下移动：如果子集的margin比父级的小，那么子集和父级都不会变化，但是如果子集大于父级，父级会随着子集一起动，就好像父级没有棚一样，解决此问题的（残暴法：在父级中加上border-top:(相当于给父级加个棚)，但是这种方法不可行，公司开发不可以用）。真正的解决方法（每一个盒子都有一个相似的语法规则）：bfc(会让特定的盒子遵循另一种渲染规则)，如何触发盒子的bfc:position:absolute;display:inline-block;float:left/right;overflow:hidden(溢出盒子的部分要隐藏展示).PS：：：position:absolute;float:left打内部将元素变成inline-block.
## margin合并（这个问题解决不了，不能因为改bug而加html）：累加，区域不能共用。：两个兄弟元素竖直方向上的margin是合并的，只取一个，此时要解决这个问题要用bfc：让兄弟集处在同一个父级中（）这样才能让兄弟之间相加。【不解决，在开发的时候利用像素】。
# 浮动模型：float：在子元素中加上的话会使每个子元素都浮动（让元素排队）。(1)PS::浮动元素产生了浮动流（对后面的元素产生影响），所有产生了浮动流的元素，块集元素看不到他，只有文本类属性（inline）的元素，文本，bfc才能看见。去除浮动流：：加上一个p元素：（只有块集元素才能用clear:both清除浮动流）p{clear:both;}(清除所有的);;;;利用伪元素在逻辑后加上after.(2)文字环绕图片。
**~~Css中有些属性是继承不了的，不能继承的实在是太多了，但是能继承的却很少，所有可继承的元素：visibility和cursor；内联元素可继承的：letter-spacing,word-spacing,white-space,line-height,color,font-family,font-size,font-style,font-weight,font-variant,text-decoration,text-transform,direction；l列表元素可继承的:list-style,list-style-type,list-style-position,list-style-image；终端块级元素可继承的:text-indent,text-align~~**
## I.文本溢出打点展示：（1）单行文本溢出容器：事先就要写出来，利于开发（三件套：white-space:nowrap(强制不换行)；overflow:hidden(溢出隐藏)；text-overflow:ellipsis;）；；（2）多行文本溢出容器：直接打出来（容器和单行文本的比值是能展示几行的数。）II.背景图片：拿图片铺满容器，background-size:100p 100px;background-image:url(图片地址)；background-repeat:no-repeat(图片不重复)（一般情况下不重复）；background-position:100px 100px/left top...(图片在容器中展示的位置)
## 文本类元素具有文本的特点，文字和文字之间底对齐。若要在背景中加上文字，则外面的文字会和里面的文字对齐，而不再是外面的行级元素了。



# JavaScript的语法。
## 1.在函数中，对于不定参的用处很多，如系统的大部分功能，还有就是很多数进行累和。
## 2.函数的是参合形参相互对应的话会发生映射，其中有一个发生改变，另一个也会发生变化。若不互相对应的话，就会出现未定义的情况。
## 3.return：函数的返回值；
##           函数的结束标志。
##           function sum()
		{
			return 1233;
		}
##		var num=sum();
## 3.函数递归
## 变量的作用域
## 全局变量：内部变量可以用外部变量，但是反过来不可以
// function sum(a,b)
		// {
		// 	b=2;
		// 	console.log(arguments[1]);
		// }
		// sum(12);
		// function sum()
		// {
		// 	return 1233;
		// }
		// var num=sum();
		// function screat(animal)
		// {
		// 	switch(animal)
		// 	{
		// 		case 'dog':
		// 			document.write('wangwangwang');
		// 			break;
		// 		case 'cat':
		// 			document.write('miaomiaomiao');
		// 			break;
		// 	}
		// }
		// screat('dog');
		
		// function reverse()
		// {
		// 	var num=window.prompt('input');
		// 	//var str='';
		// 	for(var i=num.length-1;i>=0;i--)
		// 	{
				
		// 		var n=transfer(num[i]);
		// 	}
		// 	document.write(n);
		// }
		// function transfer(target)//转换
		// {
		// 	switch(target)
		// 	{
		// 		case '1':
		// 			document.write('一');
		// 			break;
		// 		case '2':
		// 			document.write('儿');
		// 			break;
		// 		case '3':
		// 			document.write('三');
		// 			break;
		// 	}
		// }
		// 利用函数求阶乘
		// var n=window.prompt('input');
		// function jc(n)
		// {
		// 	if(n==1||n==0)
		// 	{
		// 		return 1;
		// 	}
		// 	else if(n>1)
		// 	{
		// 		return  n * jc(n-1);

		// 	}
		// 	else
		// 	{
		// 		document.write('wrong');
		// 	}
		// }
		// var num=jc(n);
		// document.write(num);
	//利用函数求斐波那契数列
	// var n=window.prompt('input');
	// function feiBoNaQie(n)
	// {
	// 	if(n==1||n==2)
	// 	{
	// 		return 1;
	// 	}
	// 	else
	// 	{
	// 		return feiBoNaQie(n-1)+feiBoNaQie(n-2);
	// 	}
	// }
	// var num=feiBoNaQie(n);
	//document.write(num);
## border:边框设置：border-left;
##                  bordre-top;
##                  border-bottom;
##                  bordre-right;每一个边都有属性，例如长宽高，颜色，边的类型。
	