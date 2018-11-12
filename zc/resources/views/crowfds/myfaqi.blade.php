<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>众筹-会员中心-我的发起</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/member.css">
</head>
<body>

	@include('layouts.new')






	<!-- 主体 -->
	<div class="member-body" style="min-height:800px;" >
		<div class="container clearfix">
			
			<div class="right">
				<ul class="head">
					<li>我的发起</li>
				</ul>




				<table class="zc-list">
					<thead>
						<tr>
							<th>项目信息</th>
							<th>筹资进度</th>
							<th>操作</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<!-- 项目 -->
						@foreach($faqi as $f)
						<tr class="space">
							<td colspan="5"></td>
						</tr>

						<tr class="time">
							<td colspan="3">发起时间：{{$f->created_at}}</td>
							<td align="center"><a onclick="return confirm('确定要删除吗？');" href="{{route('faqidelete',['id'=>$f->id])}}">删除</a></td>
						</tr>
						<tr class="info">
							<td><a  href="{{route('crowd',['id'=>$f->order->id])}}">{{$f->title}}<br><img src="{{ Storage::url($f->crowfd_img)}}"></a></td>

							<td>
								目标：{{$f->target}}元
								<br>
								已筹备：{{$f->money}}元
							</td>
						
							<td>
							
								<a href="{{route('crowd',['id'=>$f->crowfd_id])}}">查看</a>
							</td>
						</tr>
						@endforeach
						<!-- 项目 -->

						<!-- 项目 -->

					</tbody>
				</table>
				<!-- 翻页 -->
				<div>
					{{ $faqi->links() }}
				</div>
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