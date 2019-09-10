
// 表示文档全部加载完成

jQuery(document).ready(function(){

	// 按回车键获取到文本框的值
	getData()
	$('#headerGet').on('keydown',function(e){

		if(e.keyCode == 13){

			// console.log(1)
			var param = $(this).val();
			// console.log(param);
			getData(param)
		}
	});

	// 发请求 设模板
	function getData(param){
		var param = param ? param : "北京";
		$.ajax({
			type:'get',
			//url:'http://api.jisuapi.com/weather/query?appkey=eee8cacbc1e612cd&city=上海',
			url:'http://api.jisuapi.com/weather/query',
			data:{
				appkey:"eee8cacbc1e612cd",
				city:param   // 城市名称是变化的
			},
			dataType:'jsonp',  // 跨域
			jsonp:'callback',  // 回调函数
			success:function(json){
				console.log(json);

				// 数据和模板相结合
				var html = template('tmplt',json);
				$('#ulLists').html(html);
			}
		})
	}
	

})