<?php
	/*
	留言板例子
	功能：1：添加留言、删除留言、修改留言、留言列表（单页显示限定、分页）
	    2：留言详情页（title content time hits）
	    3：搜索功能
	数据库设计：blog(bid,title,content,time,hits,writer)
	 * user(uid,uname,pass,band)
	连接数据库（创建数据库->数据表->列名(类型)）
	类型  int char varchar text date timestamp blob
	 * 
	 * name char(8) sword   pass varchar(6)  12345 max-width
	  */
	/*  
	$str="唯创啥时候上市呀";
	$ss=iconv_substr($str,2);
	echo $ss;*/
	//增 insert into 表名(列名,列名,列名....) values(值,值,值,...)
	//删 delete from 表名  where bid='$bid'
	//改 update 表名 set 列名=值,列名=值.. where bid='$bid';
	//查  select * from blog  排序 asc  desc
	//    select * from blog where bid='$bid';
	
	//链接数据库
	//phpinfo();
	@$link=mysqli_connect("localhost","root","") or die("数据库连接错误");
	//选择数据库
	@mysqli_select_db($link,'liuyan2') or die("选择数据库错误");
	//设置传输编码
	@mysqli_set_charset($link,"UTF8");
?>
















