<!-- 顶部 -->
<link rel="stylesheet" href="/css/content.css">
<div class="top-banner">
		<div class="container tel">官方咨询电话 400-111-2222</div>
	</div>
	<!-- 导航 -->
	<div class="container top-nav">
		<a href="/"><img id="logo" src="images/logo.png" alt=""></a>


		<a href="/">首　页</a>
		<a href="{{route('crowds.add')}}" class="btn-blue" id="zc-add">发起众筹</a>
		 <!--引入公共文件  -->
		@if(!session('id'))
		<div class="fr login-btn">
			<a href="{{route('login')}}">登录</a> 
			<a href="{{route('regist')}}">注册</a>
		</div>
		@else
		<div class="fr login-btn logined-btn" style="width:80px;">
				<img id="head_img"@if(!session('smface'))src="/images/f2.png" @else src="{{Storage::url(session('smface'))}}" @endif alt="" style="width:50px;height:50px;border-radius: 100px;">
				<ul style="display:none;" id="head_ul">
				    <li class="logined-name">{{session('mobile')}}</li>
					<li><a href="{{route('editMes')}}">个人资料</a></li>
					<li><a href="{{route('editPwd')}}">修改密码</a></li>
					<li><a href="{{route('myfaqi')}}">我的发起</a></li>
					<li><a href="{{route('follow')}}">我的收藏</a></li>
					<li><a href="{{route('myorder')}}">我的定单</a></li>
					<li><a href="{{route('face')}}">设置头像</a></li>
					<li><a href="{{route('exit')}}">退出</a></li>
				</ul>
		</div>
		@endif
	</div>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script>
			$(".fr").mouseover(function(){
				$("#head_ul").css("display","inline-block");
				// $("#head_ul").css("position","absolute");
				// $("#head_ul").css("z-index","9999");
				// $("#head_ul").css("top","70px");
				// $("#head_ul").css("right","180px");
				// $("#head_ul").css("background-color","#ccc");
			});
			$(".fr").mouseout(function(){
			$("#head_ul").css("display","none");
			});
	</script>