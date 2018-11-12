@extends('layouts.main')
@section('title','首页')
@section('content')



	<div class="login-form" style="background-color: #fff; border: none;">
		<!-- 登录表单 -->
		<div class="container clearfix">
			<div class="left" style="position: absolute; left: 550px; top: 200px; width: 500px;">
				<h2>注册</h2>
				<form class="form" action="{{route('doregist')}}" method="post" enctype='multipart/form-data'>
				{{csrf_field()}}
		@if($errors->any())

@foreach($errors->all() as $e)

{{$e}}

@endforeach
@endif 
					<div>
						<input type="text" name="mobile" placeholder="手机号">
					</div>
					<!-- <div>
						<input style="width: 50%; margin-right: 10px;" type="password" placeholder="手机验证码">
						<a href="" class="btn emp">获取验证码</a>
					</div> -->
					<div>
						<input type="password" name="password" placeholder="密码">
					</div>
					<div >
						<input type="password" name="password_confirmation" placeholder="再次输入密码">
					</div>
					<div>
						<input type="checkbox" name="protocol" style="vertical-align: middle;"> 阅读并同意 <a href="">《用户注册服务协议》</a>
					</div>
					<div>
						<input type="submit" class="btn btn-lage btn-info"value="注册">
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