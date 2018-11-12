@extends('layouts.user')
@section('title')
众筹-会员中心-个人资料
@endsection
			@section('content')
			<div class="right">
				<ul class="head">
					<li>个人资料</li>
				</ul>
				<form class="form" action="{{route('doEditMes')}}" method="post">
					{{csrf_field()}}
					<div>
						<label>用户名：</label>
						<input type="text" value="{{$user->mobile}}" disabled>
					</div>
					<div>
						<label>性别：</label>
						<input type="radio" name="sex" value="nan" @if($user->sex=='nan') checked @endif> 男
						<input type="radio" name="sex" value="nv"  @if($user->sex=='nv') checked @endif> 女
						<input type="radio" name="sex" value="bm"  @if($user->sex=='bm') checked @endif> 保密
					</div>
					<div>
						<label>城市：</label>
						<select name="province" id="provinceSelectId" onchange="getData(this.value,'citySelectId')"  >
							<option value="">请选择</option>
						</select>
						<select name="city" id="citySelectId" onchange="getData(this.value,'countySelectId')">
							<option value="">请选择</option>
						</select>
						<select name="county" id="countySelectId" >
							<option value="">请选择</option>
						</select>
					</div>
					<div>
						<label>简介：</label>
						<textarea name="description">{{$user->description}}</textarea>
					</div>
					<div style="float:right;">
						<input type="submit" value="修改" class="btn btn-primary">
					</div>
				</form>
			</div>
			<script>

			var p1 = "{{ $user->province }}";
			var p2 = "{{ $user->city }}";
			var p3 = "{{ $user->county }}";
			
			function getData(parent_id,id)
			{
				var arr = parent_id.split("#");
				var pid = arr[0];
				$.ajax({
					type:"GET",
					url:"{{route('getData')}}",
					data:{pid:pid,r:Math.random()},
					dataType:"json",
					success:function(data)
					{
						var str = "<option value=''>请选择</option>";
						$(data).each(function(k,v){
							if(v.name == p1 || v.name == p2 || v.name == p3)
							{
								str += "<option selected='selected' value="+v.id+"#"+v.name+" >"+v.name+"</option>";
								if(id=='provinceSelectId')
									getData(v.id+'#'+v.name, 'citySelectId');
								else if(id=='citySelectId')
									getData(v.id+'#'+v.name, 'countySelectId');
							}
							else
								str += "<option  value="+v.id+"#"+v.name+" >"+v.name+"</option>";
						});
						$("#"+id).html(str);
						//当第二次选择省的时候，清空原来县的旧数据
						if(id=='citySelectId')
						{
							$("#countySelectId").html("<option>请选择</option>");
						}
					}

				});
			}
			getData("0#fdf",'provinceSelectId');
			</script>
			@endsection