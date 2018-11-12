@extends('layouts.main')
@section('title','添加众筹');
@section('content')
	


	
@if($errors->any())

@foreach($errors->all() as $e)

{{$e}}

@endforeach
@endif
	<!-- 表单 -->
	<div class="zc-add">
		<div class="container clearfix">
			<ul class="zc-add-menu clearfix">
				<li class="select">基本信息</li>
				<li>项目信息</li> 
				<li>详细描述</li>
				<li>回报设置</li>
			</ul>
		</div>
		<div class="container zc-add-con">
			<form action="{{route('crowds.doadd')}}" class="form" method="post"  enctype="multipart/form-data">
			{{csrf_field()}}
				<div class="zc-add-con-1">
					<h3>选择你的身份类型</h3>
					<!-- <div>
						<input type="text" placeholder="输入用户名" name="" >
					</div>
					
					<div>
						<input type="text" placeholder="手机号" name="">
					</div> -->
					<!-- <div>
						<select name="" id="">
							<option value="">请选择</option>
						</select>
						<select name="" id="">
							<option value="">请选择</option>
						</select>
					</div> -->
					<div>
						<input type="text" placeholder="输入身份证" name="id_card"  value="{{ old('id_card') }}" >
					</div>
					<div>
						<input type="text" placeholder="客服联系人" name="link_man" value="{{ old('link_man') }}">
					</div>
					<div>
						<input type="text" placeholder="客服联系电话" name="link_phone" value="{{ old('link_phone') }}" >
					</div>
					<h3>选择你要创建的项目类型</h3>
					<div>
						<input type="radio" name="type" id="" value="公益" @if(old('type')=="公益")checked @endif> 公益&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="type" id="" value="农业" @if(old('type')=="农业")checked @endif> 农业&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="type" id="" value="出版" @if(old('type')=="出版")checked @endif> 出版&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="type" id="" value="娱乐" @if(old('type')=="娱乐")checked @endif> 娱乐&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="type" id="" value="艺术" @if(old('type')=="艺术")checked @endif> 艺术&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="type" id="" value="其它" @if(old('type')=="其它")checked @endif> 其它
					</div>
					<h3>上传相关材料</h3>
					<div>
						个人身份证-正面 <input type="file" name="id_imgz" >
					</div>
					<div>
						个人身份证-反面 <input type="file" name="id_imgf" >
					</div>
					<div class="zc-add-btn">
						<ul class="zc-add-menu clearfix">
							<li class="select" style="display:none;"></li>
							<li>下一步 》》》</li>
							<li style="display:none;"></li>
							<li style="display:none;"></li>
						</ul>
					</div>
				</div>

				<div class="zc-add-con-1">
					<h3>创建你的项目信息</h3>
					<div>
						设置封面：<input type="file" name="crowfd_img" >
					</div>
					<div>
						<input type="text" placeholder="项目标题" name="title" value="{{old('title')}}">
					</div>
					<div>
						筹款目的：<textarea name="aim">{{old('aim')}}</textarea>
					</div>
					<!-- <div>
						项目地点：
						<select name="" id="">
							<option value="">请选择</option>
						</select>
						<select name="" id="">
							<option value="">请选择</option>
						</select>
					</div> -->
					<div>
						<input type="text" placeholder="筹资金额" name="target" value="{{old('target')}}">
					</div>
					<div>
						<input type="text" placeholder="筹资天数" name="day" value="{{old('day')}}">
					</div>
					<div>
						<input type="text" placeholder="自定义标签" name="tag" value="{{old('tag')}}">
					</div>
					<div class="zc-add-btn">
						<ul class="zc-add-menu clearfix">
							<li>《《《 上一步</li>
							<li class="select" style="display:none;"></li>
							<li>下一步 》》》</li>	
							<li style="display:none;"></li>
						</ul>
					</div>
				</div>
                 
				<div class="zc-add-con-1">
					<h3>描述你的项目详情</h3>
					<div>
						<input type="text" placeholder="项目视频地址" name="video" value="{{old('video')}}">
					</div>
					<h3>编辑你的项目详情</h3>
					<textarea name="content">{{old('content')}}</textarea>
					<div class="zc-add-btn">
						<ul class="zc-add-menu clearfix">
							<li class="select" style="display:none;"></li>
							<li>《《《 上一步</li>
							
							<li style="display:none;"></li>
							<li>下一步 》》》</li>
						</ul>
					</div>
				</div>

				<div class="zc-add-con-1">
					<h3>设置你的回报信息</h3>
					<div class="warnning">
						TIPS：回报信息是让用户支持你的项目，你给予一定的回报内容，可以是具体实物也可以是虚拟信息，建议设置2-6个回报，如有抽奖内容请选择众筹网官方抽奖回报
					</div>
					<dl class="hb-list">
						<dt>回报1</dt>
						<dd>
							<div>
								<input type="text" placeholder="支持金额" name="re[1][money]" >
							</div>
							<div>
								<input type="text" placeholder="回报标题" name="re[1][title]" >
							</div>
							<div>
								<input type="text" placeholder="回报内容" name="re[1][content]">
							</div>
							<div class="form-tip">
								<input type="text" placeholder="人数上限" name="re[1][people_num]">
								<span>个“0”为不限名额</span>
							</div>
							<!-- <div class="form-tip">
								<input type="text" placeholder="回报时间" name="re[1][day]">
								<span>天“0”为项目结束后立即发送</span>
							</div> -->
							<div>
								上传图片：<input type="file" name="re[1][img]">
							</div>
						</dd>
						
					</dl>
					<div class="hb-add-btn">
						<a href="#">+继续添加新的回报</a>
					</div>
					<div class="zc-add-btn">
						<ul class="zc-add-menu clearfix">
							<li class="select" style="display:none;"></li>
							<li style="display:none;"></li>
							
							<li>《《《 上一步</li>
							<li style="display:none;"></li> 
							
							
						</ul>
					</div>
					<input type="submit" value="提交" style="margin-top:5px;margin-left:10px;">
				</div>
				 
			</form>
		</div>
	</div>

</body>
</html>
<script src="js/jquery.min.js"></script>
<script>

// 显示第一个
$(".zc-add-con-1").first().show();

$(".zc-add-menu li").click(function(){
	$(".zc-add-menu li.select").removeClass("select");
	var i = $(this).index();
	$(".zc-add-con-1").hide();
	$(".zc-add-con-1").eq(i).show();
	$(this).addClass('select');
});
// 添加新的回报
var hb_index = 1;
$(".hb-add-btn a").click(function(){
	if(hb_index<=2){
		$(".hb-list").append('<dt>回报'+(++hb_index)+'</dt> <dd> <div> <input type="text" placeholder="支持金额" name="re['+(hb_index)+'][money]"> </div> <div> <input type="text" placeholder="回报标题" name="re['+(hb_index)+'][title]"> </div> <div> <input type="text" placeholder="回报内容" name="re['+(hb_index)+'][content]"> </div> <div> <input type="text" placeholder="人数上限" name="re['+(hb_index)+'][people_num]"> </div>  <div> 上传图片：<input type="file" name="re['+(hb_index)+'][img]"> </div> </dd>');
		if(hb_index>=3){
	    $('.hb-add-btn').remove(); 
	    } 
	return false;

	}
	
	 
});

</script>

@endsection