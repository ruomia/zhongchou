@extends('layouts.admin')
@section('content')
	<!--content S-->
	<div class="super-content">
		
		<div class="superCtab">
			<div class="publishArt">
				<h4>添加类型</h4> <br><br>
				<div class="pubMain">
					<a href="javascript:history.go(-1)" class="backlistBtn"><i class="ico-back"></i>返回列表</a>
					<form action="{{route('addType')}}" method="post">
						{{csrf_field()}}
						
					
						<div class="form-group col-xs-7">
							<label class="control-label" for="input1">选择分类</label>
							<select  class="form-control" name="type" id="input1">
								<option value="0">根级分类</option>
								@foreach($types as $t)
								<option value="{{$t->id}}#{{$t->path}}">{{$t->type_name}}</option>
								@endforeach
							</select>
				
						</div><br>
					
						<div class="form-group col-xs-7">
							<label class="control-label" for="input2">类型名称</label>
							<input type="text" class="form-control" name="typename" id="input2"  placeholder="请输入类型名称">
						</div>
					
						<div class="form-group col-xs-7">
							<input type="submit" id="" value="发布" class="saveBtn">
						</div>
						
						
					</form>
				</div>
			</div>
		
		</div>
		<!--main-->

		


		
		
	</div>
	<!--content E-->
@endsection