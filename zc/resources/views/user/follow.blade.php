@extends('layouts.user')
@section('title')
众筹-会员中心-我的发起
@endsection
	@section('content')
			<div class="right">
				<ul class="head">
					<li>我的关注</li>
				</ul>
				<table class="zc-list">
					<thead>
						<tr>
							<th>项目信息</th>
							<th>项目类型</th>
							<th>筹资进度</th>
							<th>标签</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<!-- 项目 -->
						@foreach($crowds as $c)
						<tr class="space">
							<td colspan="5"></td>
						</tr>
					
						<tr class="info">
							<td><a href="{{route('crowd',['id'=>$c->id])}}"><img src="{{Storage::url($c->crowfd_img)}}"></a></td>
							<td>{{$c->type}}</td>
							<td>
								目标：{{$c->target}}元
								<br>
								已筹备：{{$c->money}}元
							</td>
							<td>
								{{$c->tag}}
							</td>
							<td>
								<a href="{{route('crowd',['id'=>$c->id])}}">查看</a>
								<a onclick="return confirm('确定要取消关注吗？')" href="{{route('delFollow',['id'=>$c->id])}}">取消关注</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<!-- 翻页 -->
				<div class="page">
					<a href="">上一页</a>
					<a href="" class="active">1</a>
					<a href="">2</a>
					<a href="">3</a>
					<a href="">下一页</a>
				</div>
			</div>
		</div>
	</div>
	@endsection