<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>显示我的地图</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
</head>
<body>
	<a id="location">显示我的当前位置</a>
	<a href="http://47.93.226.132/ymm/weixin2017-08-22-1/index.php/Weixin/login">登录跳转</a>
	<script>
	
	wx.config({
    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
    appId: "{$appid}", // 必填，公众号的唯一标识
    timestamp: {$timestamp}, // 必填，生成签名的时间戳
    nonceStr: "{$noncestr}", // 必填，生成签名的随机串
    signature: "{$signature}",// 必填，签名，见附录1
    jsApiList: ["openLocation","getLocation"] 
});

wx.ready(function(){
	var latitude,longitude;
	wx.getLocation({
    	type: 'gcj02', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火	星坐标，可传入''
	    success: function (res) {
	        latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
	        longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
	        var speed = res.speed; // 速度，以米/每秒计
	        var accuracy = res.accuracy; // 位置精度
	    }
	});

	var aBtn = document.querySelector("#location");
	aBtn.addEventListener("click",function(){
		wx.openLocation({
		    latitude: latitude, // 纬度，浮点数，范围为90 ~ -90
		    longitude: longitude, // 经度，浮点数，范围为180 ~ -180。
		    name: '我的位置', // 位置名
		    address: '创业者社区', // 地址详情说明
		    scale: 28, // 地图缩放级别,整形值,范围从1~28。默认为最大
		    infoUrl: 'http://www.baidu.com' // 在查看位置界面底部显示的超链接,可点击跳转
		});
	});
});

	</script>
</body>
</html>