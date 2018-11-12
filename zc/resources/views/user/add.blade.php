@extends('layouts.admin')
@section('content')
@if($errors->any())

@foreach($errors->all() as $e)

{{$e}}

@endforeach
@endif
	<!--content S-->
	<div class="super-content" style="background: #f6f5fa;">
		
		<div class="superCtab">
			<div class="publishArt">
				<h4>添加用户</h4><br><br>
				<div class="pubMain">
					<a href="javascript:history.go(-1)" class="backlistBtn"><i class="ico-back"></i>返回列表</a>
					<form action="{{route('addUser')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
				
						<div class="form-group col-xs-7">
							<label class="control-label" for="input1">用户名</label>
							<input type="text" class="form-control" name="mobile" id="input1" placeholder="请输入手机号">
						</div>
						<div class="form-group col-xs-7">
							<label class="control-label" for="input2">密码</label>
							<input type="password" class="form-control" name="password" id="input2" placeholder="请输入用户密码">
						</div>
						<div class="form-group col-xs-7">
							<label for="face">头像</label>
							<input type="file" name="face" id="face">
						</div>
	
							
						<div class="form-group col-xs-7">
							<input type="submit" id="" value="添加" class="saveBtn">
						</div>
					</form>
				</div>
			</div>
		
		</div>
		<!--main-->
		
	</div>
	<!--content E-->
	
	@endsection
