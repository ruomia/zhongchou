@extends('layouts.admin')

@section('content')
	<!--content S-->
	<div class="super-content">
		<div class="superCtab">
			<div class="ctab-title clearfix"><h3>用户管理</h3>
				<a  href="{{route('tjUser')}}" class="sp-column"><i class="ico-export"></i>添加用户</a>
			</div>
			
			<div class="ctab-Main">
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn Mian-cont-btn2 clearfix">
						<div class="operateBtn">
					
						</div>
						<div class="searchBar">
							<form action="">
							<div class="form-group">
									<input type="text" class="form-control" name="key"  placeholder="请输入类型名称">
									<input type="submit" class="srhBtn" value="">
								</div>
							</form>
						</div>
					</div>
					<br>
					<div class="Mian-cont-wrap">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr><th class="t_1">编号</th><th class="t_2_1">用户名</th><th class="t_2_1">头像</th><th class="alcenter">操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							<tbody>
								@foreach($users as $u)
								<tr class="">
									<td class="t_1">{{$u->id}}</td>
									<td class="t_2_1"><a href="#" class="team-a">{{$u->mobile}}</a></td>
									<td class="t_2_1"><img src="{{Storage::url($u->smface)}}" alt="" width="50"></td>
									<td class="alcenter">
									<div class="btn">
									
										<a onclick="return confirm('确定要删除该用户吗？')" href="{{route('delUser',['id'=>$u->id])}}" class="delete">删除</a></div>
									</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
						<!--pages S-->
						{{$users->appends($req->all())->links()}}
						<!--pages E-->
					</div>
				</div>
			</div>
		</div>
		<!--main-->
		
	</div>
	<!--content E-->

@endsection