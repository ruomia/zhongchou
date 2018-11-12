@extends('layouts.main')
@section('title','首页')
@section('content')

	
	

	<div class="login-form" style="background-color: #fff; border: none;">
		<!-- 登录表单 -->
		<div class="container clearfix">
			<div class="right" style="position: absolute; left: 550px; top: 200px; width: 450px">
				<h2>登录</h2>
@if($errors->any())

@foreach($errors->all() as $e)

{{$e}}

@endforeach
@endif
				<form class="form" action="{{route('dologin')}}" method="post">
				 {{ csrf_field() }}
					<div>
						<input type="text" name="mobile" placeholder="手机号">
					</div>
					<div>
						<input type="password" name="password" placeholder="密码">
					</div>
					<img  onclick="this.src='{{route('captcha')}}?'+Math.random()" src="{{route('captcha')}}" alt="">
					
					<input type="text" name="captcha" placeholder="验证码">
					<div>
						<input type="submit" class="btn btn-lage btn-info" value="登录">
					</div>
				</form>
			</div>
			
		</div>
	</div>
	

	<!-- 页脚 -->
	<div class="footer" style="position: absolute; bottom: 0px; width: 100%">
		<div class="container">
			©2017 XXX科技有限公司 版权所有 京ICP证332211号 | 出版物经营许可证编号新出发（京）批字第直123432号 | 食品流通许可证 编号：SP1324534523445 | 京公网安备00011122321311
		</div>
	</div>
	
</body>
</html>
@endsection