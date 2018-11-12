<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/common.css">
	<link rel="stylesheet" href="/css/member.css">
    @if(Route::currentRouteName()!='follow')
	<link href="/css/bootstrap.min.css" rel="stylesheet">
    @endif
	<script src="/js/jquery.min.js"></script>
    <!-- 引入bootstrap中的JS -->
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>

	@include('layouts.new')
	<!-- 主体 -->
	<div class="member-body">
		<div class="container clearfix">
			
			@yield('content')
		</div>
	</div>
	


		<!-- 页脚 -->
	<div class="footer">
		<div class="container">
			©2017 XXX科技有限公司 版权所有 京ICP证332211号 | 出版物经营许可证编号新出发（京）批字第直123432号 | 食品流通许可证 编号：SP1324534523445 | 京公网安备00011122321311
		</div>
	</div>
	
</body>
</html>