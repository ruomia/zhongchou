
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>用户登录</title>
	<link rel="stylesheet" href="/css/base.css" />
	<link rel="stylesheet" href="/css/login.css" />
	<script src="/ueditor/third-party/jquery.min.js"></script>
</head>
<body>
<div class="superlogin"></div>
<div class="loginBox">
	<div class="logo"><img src="/images/logo_login.png"/></div>
	<div class="loginMain">
		<div class="tabwrap">
		<form action="{{route('doAdmin')}}" method="post" id="loginform">
			{{csrf_field()}}
		<table border="0" cellspacing="0" cellpadding="0">
			<tr><td class="title">用户名：</td><td><input type="text" name="mobile" class="form-control txt" /></td></tr>
			<tr><td class="title">密   码：</td><td><input type="password" name="password" class="form-control txt" /></td></tr>
			<tr><td class="title">验证码：</td><td><input type="text" class="form-control txt txt2" name="captcha" />
			<span class="yzm">
				<img src="{{route('captcha')}}" onclick="this.src='{{route('captcha')}}?'+Math.random()" width="100%" height="100%"/>
			</span></td></tr>
			@if($errors->any())
			@foreach($errors->all() as $e)
			<tr class="errortd"><td>&nbsp;</td><td><i class="ico-error"></i><span class="errorword">{{$e}}</span></td></tr>	
			@endforeach
			@endif	
			<tr><td>&nbsp;</td><td><input type="button" class="loginbtn" value="登录" onclick="checkForm()"/></td></tr>		
			
		</table>
		</form>
		</div>
	</div>
</div>
<div class="footer">Copyright © 2015-2018 传智专修学院  All Rights Reserved.</div>
</body>
</html>
<script>


	function checkForm(){

		//提交表单
		$("#loginform").submit();

	}


</script>
