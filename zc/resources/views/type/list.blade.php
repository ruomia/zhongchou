@extends('layouts.admin')

@section('content')
	<!--content S-->
	<div class="super-content">
		<div class="superCtab">
			<div class="ctab-title clearfix"><h3>类型管理</h3>
				<a  href="{{route('tjType')}}" class="sp-column"><i class="ico-export"></i>添加类型</a>
			</div>
			
			<div class="ctab-Main">
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn Mian-cont-btn2 clearfix">
						<div class="searchBar">
							<form action="">
								<div class="form-group">
									<input type="text" class="form-control" name="key" value="{{$req->key}}" placeholder="请输入类型名称">
									<input type="submit" class="srhBtn" value="">
								</div>
							</form>
						</div>
					</div>
					<br>
					<div class="Mian-cont-wrap">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr><th class="t_1">编号</th><th class="t_2_1">类型名称</th><th class="t_2_1">路径</th><th class="alcenter">操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							<tbody>
								@foreach($types as $t)
								<tr class="">
									<td class="t_1">{{$t->id}}</td>
									<td class="t_2_1"><a href=">" class="team-a">{{$t->type_name}}</a></td>
									<td class="t_2_1">{{$t->path}}</td>
									<td class="alcenter">
									<div class="btn">
										<a href="{{route('editType',['id'=>$t->id])}}" class="modify">编辑</a>
										<a onclick="return confirm('确定要删除吗？')" href="{{route('delType',['id'=>$t->id])}}" class="delete">删除</a></div>
									</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>
						<!--pages S-->
					
						<!--pages E-->
					</div>
				</div>
			</div>
		</div>
		<!--main-->
		
	</div>
	<!--content E-->

@endsection