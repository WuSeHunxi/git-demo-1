(function(window,undefined){
    var njQuery=function(selector){
        return new njQuery.fn.init(selector);
    } 
    njQuery.prototype={
        constructor:njQuery,
        init : function(selector){
        
        /*结论
        1.传入'' null undefined NaN 0 false：会返回一个空的jQuery对象
        2.字符串:
            代码片段:会将创建好的DOM元素存储到jQuery对象中并且返回给我们
            选择器:会将创建好的DOM元素存储到jQuery对象中并且返回给我们
        3.数组：会将数组中存储的所有元素依次存储到jQuery对象中去并返回(真数组会变成伪数组)
        4.除上述类型以外：会将传入的数据存储到jQuery对象中并返回
        */
            //先去除字符串两端的空格
            selector=njQuery.trim(selector);
            if(!selector){
                return this;
            }
            else if(njQuery.isFunction(selector)){
                njQuery.ready();selector
            }
            else if(njQuery.isString(selector)){//通过读方法名就知道要干什么
                //判断是否是代码片段(代码片段是以<开头 并且 >结尾 并且最短的代码片段的长度是3)
                if(njQuery.isHTML(selector)){
                    //根据代码片段创建所有的代码元素
                    var temp=document.createElement("div");
                    temp.innerHTML=selector;
                    //将创建好的一级元素添加到jQuery当中
                    // for(var i=0;i<temp.children.length;i++){
                    //     this[i]=temp.children[i];
                    // }
                    // //给jQuery对象添加length属性
                    // this.length=temp.children.length;
                    //将真数组转化成伪数组
                    [].push.apply(this,temp.children);//等价于上面注释掉的代码(temp.children是数组),把数组中的值传递给this,最后再返回this
                    //返回加工好的this(jQuery)
                    return this;
                }
                //判断是否是选择器
                else{
                    //根据传入的选择器找到对应的元素
                    var res=document.querySelectorAll(selector);
                    //将找到的元素添加到njQuery上
                    // for(var i=0;i<res.length;i++){
                    //     this[i]=res[i];
                    // }
                    // //给jQuery对象添加length属性
                    // this.length=res.length;
                    [].push.apply(this,res);
                    //返回加工上的this
                    return this;
                }
            }
            else if(njQuery.isArray(selector)){//window也有length属性
                //真数组和伪数组的toString方法返回的结果不一样 真数组：数组内部直接返回  伪数组：Object Object
                //真数组和伪数组的.toString.apply(xx)方法的返回结果不一样 真数组：Object Array 伪数组：Object Object
                //真数组：Object Array
                /*if(({}).toString.apply(selector)==="[object Array]"){//真数组
                    [].push.apply(this,selector);//将真数组转化成伪数组
                    return this;
                }
                //伪数组
                else{
                    //在企业开发中，无论将自定义的伪数组转化成真或者伪，都需要先转化成真数组
                    var arr=[].slice.apply(selector);
                    //然后再将真数组转化成伪数组
                    [].push.apply(this,arr);
                    return this;
                }*/
                //无论是真数组还是伪数组都想将其转化为真数组
                var arr=[].slice.call(selector);
                [].push.apply(this,arr);
                return this;
            }
            else{
                this[0]=selector;
                this.length=1;
                return this;
            }
        },
        jquery:"1.1.0",
        selector:"",
        length:0,
        //[].push找到数组的push方法
        //冒号前面的push将来由njQuery对象调用
        //相当于[].push.apply(this); this 就是njQuery对象
        push:[].push,
        sort:[].sort,
        splice:[].splice,
        toArray:function(){
            return [].slice.call(this);//将this这个伪数组转化成真数组
        },
        get:function(num){
            //没有传参
            if(arguments.length===0){
                return this.toArray();
            }
            //传递的参数不是负的数
            else if(num>=0){
                return this[num];
            }
            //传递负数
            else{
                return this[this.length+num];
            }
        },
        eq:function(num){
            //不传参
            if(arguments.length===0){
                return new njQuery;
            }
            //传递非负数
            else if(num>=0){
                return njQuery(this.get(num));
            }
            //传递负数
            else{
                return njQuery(this.get(num));
            }
        },
        first:function(){
            return this.eq(0);
        },
        last:function(){
            return this.eq(-1);
        },
        //该方法是对象方法
        each:function(fn){
            //利用工具方法解决each的对象方法
            return njQuery.each(this,fn);//遍历this 传递的参数是fn
        }
    }
    njQuery.extend=njQuery.prototype.extend=function(obj){
        for(var key in obj){
            this[key]=obj[key];
        }
    }
    //将相同的方法传入extend中，方便使用
    njQuery.extend({
        isString:function(str){
            return typeof str==="string";
        },
        isHTML:function(str){
            return str.charAt(0)=="<"&&str.charAt(str.length-1)==">"&&str.length>=3;
        },
        //去除字符串空格的方法
        trim:function(str){
            if(!njQuery.isString(str)){//如果不是字符串，就可以直接返回
                return str;
            }
            //判断是否支持trim方法
            if(str.trim){
                return str.trim();
            }else{
                //利用替换方法(正则表达式)
                return str.replace(/^\s+|\s+$/g,"");//匹配代码片段前面的空格或者后面的空格(全局匹配)
            }
        },
        isObject:function(sele){
            return typeof sele==="object";
        },
        isWindow:function(sele){
            return sele===window;
        },
        isArray:function(sele){
            if(njQuery.isObject(sele)&&!njQuery.isWindow(sele)&&"length" in sele){
                return true;
            }
            return false;
        },
        isFunction:function(sele){
            return typeof sele==="function";
        },
        //判断DOM元素是否加载完毕
        ready:function(fn){
            if(document.readyState=="complete"){
                fn();
            }else if(document.addEventListener){//高级浏览器
                document.addEventListener("DOMContentLoaded",function(){
                    fn();
                });
            }else{//低级浏览器
                document.attachEvent("onreadystatechange",function(){
                    if(document.readyState=="complete"){
                        fn();
                    }
                })
            }
        },
        //该方法是工具方法
        each:function(obj,fn){
            //判断是否是数组 如果是数组直接利用简单的for循环遍历即可
            if(njQuery.isArray(obj)){
                for(var i=0;i<obj.length;i++){
                    var res=fn.call(obj[i],i,obj[i]);
                    if(res===true){
                        continue;
                    }else if(res===false){
                        break;
                    }
                }
            }
            //判断是否是对象
            else if(njQuery.isObject(obj)){
                for(var key in obj){
                    var res=fn.call(obj[key],key,obj[key]);//回调函数会返回true false
                    if(res===true){
                        continue;
                    }else if(res===false){
                        break;
                    }
                }
            }
            return obj;
        },
        map:function(obj,fn){//map方法的返回值是 索引+值
            var res=[];
            if(njQuery.isArray(obj)){
                for(var i=0;i<obj.length;i++){
                    var temp=fn(obj[i],i);
                    if(temp){//只有当temp中有值的时候才会执行res.push(temp)
                        res.push(temp);
                    }
                }
            }else if(njQuery.isObject(obj)){
                for(var key in obj){
                    var temp=fn(obj[key],key);
                    if(temp){//只有当temp中有值的时候才会执行res.push(temp)
                        res.push(temp);
                    }
                }
            }
            return res;
        },
        //获取样式
        getStyle:function(dom,styleName){
            if(window.getComputedStyle){
                return window.getComputedStyle(dom)[styleName];
            }else{
                return dom.currentStyle[styleName];
            }
        },
        addEvent:function(dom,name,callBack){
            if(dom.addEventListener){
                dom.addEventListener(name,callBack);
            }else{
                dom.attchEvent("on"+name,callBack);
            }
        }
    });
    njQuery.prototype.extend({
        empty:function(){
            //遍历所有找到的元素
            this.each(function(key,value){
                value.innerHTML="";
            });
            //链式编程（返回的this就是原来刚遍历的对象），以便于后来的可以直接使用原来得到的对象
            return this;
        },
        remove:function(sele){
            if(arguments.length===0){//没有参数的情况
                //遍历指定元素
                this.each(function(key,value){//value是要遍历的元素
                    //根据指定的元素找到其相应的父元素
                    var parent=value.parentNode;
                    //在原生JS中 通过父元素删除指定的子元素
                    parent.removeChild(value);
                });
            }else{
                //在HTML中的元素
                var $this=this;
                //根据传入的选择器找到对应的元素(指定的元素)
                $(sele).each(function(key,value){//利用jQuery的核心函数将选择其对应的元素找到
                    //遍历找到的元素，获取对应的类型
                    var type=value.tagName;//获取指定元素(value)的名称(通过tagName)
                    //遍历元素(遍历HTML中的有相关选择器的元素)
                    $this.each(function(k,v){
                        //获取当前的遍历的元素的类型
                        var t=v.tagName;
                        //判断找到元素的类型和指定元素的类型
                        if(t===type){
                            //根据指定的元素找到其相应的父元素
                            var parent=value.parentNode;
                            //在原生JS中 通过父元素删除指定的子元素
                            parent.removeChild(value);
                        }
                    })
                });
            }
            return this;
        },
        html:function(content){
            if(arguments.length===0){
                return this[0].innerHTML;
            }else{
                this.each(function(key,value){
                    value.innerHTML=content;
                });
            }
        },
        text:function(content){
            if(arguments.length===0){
                var res="";//不传参的时候直接就是文本字符串的拼接 遍历相应的元素 找到其文本内容 然后返回
                this.each(function(key,value){
                    res+=value.innerText;
                });
                return res;
            }else{      
                this.each(function(key,value){
                    value.innerText=content;
                });
            }
        },
        appendTo:function(sele){
            //先统一的将传入的数据都放在核心函数中 将其转化成jQuery对象
            var $target=$(sele);
            var $this=this;//this就是当前需要添加到sele中的变量
            var res=[];
            $.each($target,function(key,value){
                $this.each(function(k,v){
                    if(key===0){//如果是第一个就可以直接添加
                        //value就是遍历到的每一项
                        value.appendChild(v);
                        res.push(v);
                    }else{//如果不是第一个需要先克隆 再添加
                        //先克隆
                        //v也是遍历到的每一项
                        var temp=v.cloneNode(true);
                        //再添加
                        value.appendChild(temp);
                        res.push(temp);
                    }
                });
            });
            //返回所有添加的元素
            return $(res);//==>得到的是jQuery对象
            //要将source添加到target中去
            /*for(var i=0;i<$target.length;i++){
                var targetEle=$target[i];
                for(var j=0;j<$this.length;j++){
                    //sourceEle是遍历到的每一项
                    var sourceEle=$this[j];//要添加的source元素可能也是多个 每一个都要添加到target中去
                    //判断当前遍历到的是第几个
                    if(i===0){//如果是第一个就可以直接添加
                        targetEle.appendChild(sourceEle);
                    }else{//如果不是第一个需要先克隆 再添加
                        //先克隆
                        var temp=sourceEle.cloneNode(true);
                        //再添加
                        targetEle.appendChild(temp);
                    }
                }
            }*/
        },
        //除了添加的方法不一样 其他的部分都一样
        prependTo:function(sele){
            var $target=$(sele);
            var $this=this;//this就是当前需要添加到sele中的变量
            var res=[];
            $.each($target,function(key,value){
                $this.each(function(k,v){
                    if(key===0){//如果是第一个就可以直接添加
                        //value就是遍历到的每一项
                        value.insertBefore(v,value.firstChild);
                        res.push(v);
                    }else{//如果不是第一个需要先克隆 再添加
                        //先克隆
                        //v也是遍历到的每一项
                        var temp=v.cloneNode(true);
                        //再添加
                        value.insertBefore(temp,value.firstChild);
                        res.push(temp);
                    }
                });
            });
            //返回所有添加的元素
            return $(res);
        },
        append:function(sele){
            //append和appendTo方法的不同有三处：参数是字符串 参数的调用的顺序 返回值不同
            //先判断是不是字符串
            if(njQuery.isString(sele)){
                //直接让字符串添加到最后即可
                this[0].innerHTML+=sele;//this是jQuery对象 不能使用原生JS的方法 this[0]是取到了对象中的第一个 可以使用innerHTML
            }else{
                $(sele).appendTo(this);
            }
            return this;//直接返回调用者
        },
        prepend:function(sele){
            //prepend和prependTo方法的不同有三处：参数是字符串 参数的调用的顺序 返回值不同
            //先判断是不是字符串
            if(njQuery.isString(sele)){
                //直接让字符串添加到最后即可
                //sele是新的内容 是字符串 新的字符串+原来的字符串（这样就把新添加的内容放在了原来的内容的前面） 
                //    再赋值给原来的字符串
                this[0].innerHTML=sele+this[0].innerHTML;//this是jQuery对象 不能使用原生JS的方法 this[0]是取到了对象中的第一个 可以使用innerHTML
            }else{
                $(sele).prependTo(this);
            }
            return this;//直接返回调用者
        },
        insertBefore:function(sele){
            var $target=$(sele);
            var $this=this;//this就是当前需要添加到sele中的变量
            var res=[];
            $.each($target,function(key,value){
                var parent=value.parentNode;
                $this.each(function(k,v){
                    if(key===0){//如果是第一个就可以直接添加
                        //value就是遍历到的每一项
                        parent.insertBefore(v,value);
                        res.push(v);
                    }else{//如果不是第一个需要先克隆 再添加
                        //先克隆
                        //v也是遍历到的每一项
                        var temp=v.cloneNode(true);
                        //再添加
                        parent.insertBefore(temp,value);
                        res.push(temp);
                    }
                });
            });
            //返回所有添加的元素
            return $(res);
        },
        //将新的添加到指定元素前面 然后再把指定元素删除
        replaceAll:function(sele){
            var $target=$(sele);
            var $this=this;//this就是当前需要添加到sele中的变量
            var res=[];
            $.each($target,function(key,value){
                var parent=value.parentNode;
                $this.each(function(k,v){
                    if(key===0){//如果是第一个就可以直接添加
                        //将元素插入到指定元素的前面
                        $(v).insertBefore(value);//value就是指定的元素
                        //将指定元素删除
                        $(value).remove();
                        res.push(v);
                    }else{//如果不是第一个需要先克隆 再添加
                        //先克隆
                        var temp=v.cloneNode(true);//v也是遍历到的每一项
                        //将元素插入到指定元素的前面
                        $(temp).insertBefore(value);//value就是指定的元素
                        //将指定元素删除
                        $(value).remove();
                        res.push(temp);
                    }
                });
            });
            //返回所有添加的元素
            return $(res);
        },
        clone:function(deep){
            var res=[];
            //判断是否是深复制
            if(deep){
                //深复制
                this.each(function(key,ele){
                    var temp=ele.cloneNode(true);
                    //遍历元素中的eventCache对象
                    njQuery.each(ele.eventsCache,function(name,array){
                        //遍历事件对应的数组
                        njQuery.each(array,function(index,method){
                            //给复制的元素添加事件
                            $(temp).on(name,method);
                        });
                    })
                    //复制完之后得到的是由数组转变的jQuery对象
                    res.push(temp);
                });
                return $(res);
            }else{
                //浅复制
                this.each(function(key,ele){
                    var temp=ele.cloneNode(true);
                    //复制完之后得到的是由数组转变的jQuery对象
                    res.push(temp);
                });
                return $(res);
            }
        }
    });
    //属性操作相关方法
    njQuery.prototype.extend({
        attr:function(attr,value){
            //判断是不是字符串
            if(njQuery.isString(attr)){
                //判断是一个参数还是两个参数
                if(arguments.length===1){
                    return this[0].getAttribute(attr);//attr是属性节点的名称
                }else{
                    //要把所有的DOM节点都遍历 然后每一个节点的属性都发生改变
                    this.each(function(key,ele){
                        ele.setAttribute(attr,value);
                    });
                }
            }
            //判断是不是对象(要把键和值都传入的对象)
            else if(njQuery.isObject(attr)){
                var $this=this;
                //遍历取出所有属性节点的名称和对应的值
                $.each(function(key,value){
                    //遍历取出所有的元素
                    $this.each(function(k,ele){
                        ele.setAttribute(key,value);
                    });
                });
            }
            return this;
        },
        prop:function(attr,value){
            //判断是不是字符串
            if(njQuery.isString(attr)){
                //判断是一个参数还是两个参数
                if(arguments.length===1){
                    return this[0][attr];//attr是属性节点的名称
                }else{
                    //要把所有的DOM节点都遍历 然后每一个节点的属性都发生改变
                    this.each(function(key,ele){
                        ele[attr]=value;
                    });
                }
            }
            //判断是不是对象(要把键和值都传入的对象)
            else if(njQuery.isObject(attr)){
                var $this=this;
                //遍历取出所有属性节点的名称和对应的值
                $.each(function(key,value){
                    //遍历取出所有的元素
                    $this.each(function(k,ele){
                        ele[key]=value;
                    });
                });
            }
            return this;
        },
        css:function(attr,value){
            //判断是不是字符串
            if(njQuery.isString(attr)){
                //判断是一个参数还是两个参数
                if(arguments.length===1){
                    return njQuery.getStyle(this[0],attr);//attr是属性节点的名称
                }else{
                    //要把所有的DOM节点都遍历 然后每一个节点的属性都发生改变
                    this.each(function(key,ele){
                        ele.style[attr]=value;
                        ele[attr]=value;
                    });
                }
            }
            //判断是不是对象(要把键和值都传入的对象)
            else if(njQuery.isObject(attr)){
                var $this=this;
                //遍历取出所有属性节点的名称和对应的值
                $.each(function(key,value){
                    //遍历取出所有的元素
                    $this.each(function(k,ele){
                        ele.style[key]=value;
                        ele[key]=value;
                    });
                });
            }
            return this;
        },
        val:function(content){
            if(arguments.length===0){
                return this[0].value;
            }else{
                this.each(function(key,ele){
                    ele.value=content;
                });
                return this;
            }
        },
        hasClass:function(name){
            //设置一个标志变量 用来保存true或者false
            var flag=false;
            if(arguments.length===0){
                return flag;
            }else{
                this.each(function(key,ele){
                    //获取元素中class保存的值
                    var className=" "+ele.className+" ";
                    //给传入的字符串也加上空格
                    var name=" "+name+" ";
                    //判断
                    if(className.indexOf(name)!=-1){
                        flag=true;//如果直接false的话就会break，所以要用flag来保存变量
                        return false;//break即可
                    }
                });
                return flag;//接收返回值
            }           
        },
        addClass:function(name){//既要遍历元素 也要遍历类名
            if(arguments.length===0){
                return this;
            }
            //对传入的类名进行切割
            var name=name.splice(" ");
            //遍历取出所有的元素
            this.each(function(key,ele){
                //遍历取出所有的类名
                $.each(name,function(k,value){
                    //判断指定元素中是否包含指定类名
                    if(!$(ele).hasClass(value)){
                        ele.className=ele.className+" "+value;
                    }
                });
            });
            return this;
        },
        removeClass:function(name){
            if(arguments.length===0){
                //要遍历所有相关的元素
                this.each(function(key,ele){
                    //将他们的className设置为空===删除
                    ele.className="";
                });
            }else{
                //对传入的类名进行切割
                var name=name.splice(" ");
                //遍历取出所有的元素
                this.each(function(key,ele){
                    //遍历取出所有的类名
                    $.each(name,function(k,value){
                        //判断指定元素中是否包含指定类名
                        if($(ele).hasClass(value)){
                            //利用replace方法可以完成删除
                            ele.className=(" "+ele.className+" ").replace(" "+value+" ","");
                        }
                    });
                });
            }
        },
        toggleClass:function(name){
            if(arguments.length===0){
                this.removeClass(name);
            }else{
                //对传入的类名进行切割
                var name=name.splice(" ");
                //遍历取出所有的元素
                this.each(function(key,ele){
                    //遍历取出所有的类名
                    $.each(name,function(k,value){
                        //判断指定元素中是否包含指定类名
                        if($(ele).hasClass(value)){
                            //删除
                            $(ele).removeClass(value);
                        }else{
                            //添加
                            $(ele).addClass(value);
                        }
                    });
                });
            }
            return this;
        }
    });
    //事件操作的相关方法
    njQuery.prototype.extend({
        on:function(name,callBack){//给名字相同的对象都添加事件
            this.each(function(key,ele){//ele就是DOM元素
                //判断当前的元素中是否保存了所有的事件对象
                if(!ele.eventsCache){
                    ele.eventsCache={};
                }
                //判断对象中有没有对应的数组
                if(!ele.eventsCache[name]){
                    ele.eventsCache[name]=[];
                    //将回调函数添加到数组中
                    ele.eventsCache[name].push(callBack);
                    //添加对应类型的事件
                    njQuery.addEvent(ele,name,function(){
                        njQuery.each(ele.eventsCache[name],function(k,method){
                            method();
                        });
                    });
                }else{
                    //直接将回调函数添加到数组中
                    ele.eventsCache[name].push(callBack);
                }
            });
        },
        off:function(name,callBack){
            //判断是否传入参数
            if(arguments.length===0){
                this.each(function(key,ele){
                    ele.eventsCache={};
                });
            }
            //判断传入一个参数
            else if(arguments.length===1){
                this.each(function(key,ele){
                    ele.eventsCache[name]=[];                    
                });
            }
            //判断传入两个参数
            else if(arguments.length===2){
                this.each(function(key,ele){
                    njQuery.each(ele.eventsCache[name],function(index,method){
                        //判断当前遍历到的方法和传入的方法是否相等
                        if(method===callBack){
                            //相等的话就需要把该事件删除 此时要利用splice方法
                            ele.eventsCache[name].splice(index,1);//从当前索引处删除一个即可
                        }
                    });
                });
            }
        }
    });
    //想要添加实例方法利用njQuery.prototype.extend=function(){}
    njQuery.prototype.init.prototype=njQuery.prototype;
    window.njQuery=window.$=njQuery;
})(window);

