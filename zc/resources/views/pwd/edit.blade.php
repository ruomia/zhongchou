<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>众筹-会员中心-个人资料</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/common.css">
	<link rel="stylesheet" href="/css/member.css">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<script src="/js/jquery.min.js"></script>
    <!-- 引入bootstrap中的JS -->
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>

	@include('layouts.new')
	<!-- 主体 -->
	<div class="member-body">
		<div class="container clearfix">
			
			<div class="right">
				<ul class="head">
					<li>个人资料</li>
				</ul>
				<form class="form" action="{{route('doEditPwd')}}" method="post">
				{{csrf_field()}}
				<div class="form-group col-xs-7">
						<label class="control-label" for="input1">原密码：</label>
						<input type="password" class="form-control" name="oldPassword" id="input1"  placeholder="请输入原密码">
						@if($errors->has('oldPassword'))
						<span>{{$errors->first('oldPassword')}}</span>
						@endif
					</div>
					<div class="form-group col-xs-7">
						<label class="control-label" for="input2">新密码：</label>
						<input type="password" class="form-control" name="password" id="input2"  placeholder="请输入新密码">
						@if($errors->has('password'))
						<span>{{$errors->first('password')}}</span>
						@endif
					</div>
					<div class="form-group col-xs-7">
						<label class="control-label" for="input3">确认密码：</label>
						<input type="password" class="form-control" name="password_confirmation" id="input3"  placeholder="请再次输入新密码">
						@if($errors->has('password_confirmation'))
						<span>{{$errors->first('password_confirmation')}}</span>
						@endif
					</div>
					<div class="form-group col-xs-7">
					<button type="submit" class="btn btn-primary">修改</button>
					</div>
					
				</form>
			</div>
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