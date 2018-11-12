<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>众筹-会员中心-个人资料</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/member.css">
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
				<form class="form" action="">
					<div>
						<label>用户名：</label>
						<input type="text" value="孔子___ABCXXX">
					</div>
					<div>
						<label>性别：</label>
						<input type="radio"> 男
						<input type="radio"> 女
						<input type="radio"> 保密
					</div>
					<div>
						<label>城市：</label>
						<select>
							<option value="">请选择</option>
						</select>
						<select>
							<option value="">请选择</option>
						</select>
					</div>
					<div>
						<label>简介：</label>
						<textarea></textarea>
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