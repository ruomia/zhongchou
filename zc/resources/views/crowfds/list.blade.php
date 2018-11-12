<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>众筹-搜索</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/common.css">
	<link rel="stylesheet" href="/css/zc-list.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

@include('layouts.new')
	<style>
	         .page .active {
    background-color: #2891f9;
    color: #FFF;
    padding: 0px 0px;
    border-radius: 3px;
}
	</style>
	<!-- 搜索条件 -->
	<div class="search-bar">
		<div class="container">
			<div class="hangye"> 行业筛选：
				<!-- <a href="{{route('crowds.list',array_merge(['type'=>'']))}}" @if(session('type')=='')class="select" @endif>全部</a> -->
				
				<a href="{{route('crowds.list',array_merge(['type'=>'公益']))}}" @if(session('type')=='公益')class="select" @endif>公益</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'农业']))}}" @if(session('type')=='农业')class="select" @endif>农业</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'出版']))}}" @if(session('type')=='出版')class="select" @endif>出版</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'娱乐']))}}" @if(session('type')=='娱乐')class="select" @endif> 娱乐</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'艺术']))}}" @if(session('type')=='艺术')class="select" @endif>艺术</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'其他']))}}" @if(session('type')=='其他')class="select" @endif>其他</a>
			</div>
			<div class="jincheng">项目进程：
				<!-- <a href="{{route('crowds.list',array_merge(['disable'=>'']))}}">全部</a> -->
				<a href="{{route('crowds.list',array_merge(['disable'=>'1']))}}" @if(session('disable')=="1")class="select" @endif>众筹中</a>
				<!-- <a href="{{route('crowds.list',array_merge(['disable'=>'']))}}">将要结束</a> -->
				<a href="{{route('crowds.list',array_merge(['disable'=>'2']))}}" @if(session('disable')=="2")class="select" @endif>成功结束</a>
			</div>
			<div class = "paixu">项目排序：
				<a href="{{route('crowds.list',array_merge(['orderby'=>'id']))}}" @if(session('orderby')=="id")class="select" @endif>默认</a>
				<a href="{{route('crowds.list',array_merge(['orderby'=>'created_at']))}}" @if(session('orderby')=="created_at")class="select" @endif>全新上线</a>
				<a href="{{route('crowds.list',array_merge(['orderby'=>'target']))}}" @if(session('orderby')=="target")class="select" @endif>目标金额</a>
				<a href="{{route('crowds.list',array_merge(['orderby'=>'people_num']))}}" @if(session('orderby')=="people_num")class="select" @endif>支持人数</a>
				<a href="{{route('crowds.list',array_merge(['orderby'=>'money']))}}" @if(session('orderby')=="money")class="select" @endif>筹资额</a>
			</div>
		</div>
	</div>
	<div class="container zc-section">
		<ul class="zc-list clearfix">
		    
			 @foreach($crowds as $y)
			 <li>
				<div class="zc-img"><a href="{{route('crowd',['id'=>$y->id])}}"><img src="{{Storage::url($y->crowfd_img)}}" alt=""></a></div>
				<div class="zc-con">
					<div class="zc-title"><a href="">{{$y->title}}</a></div>
					<p class="zc-desc"></p>
					<div class="zc-label">
						<a href="">{{$y->tag}}</a>
					
					</div>
					<div class="zc-progress"><div></div></div>
					<div class="zc-progress-num">
						<p>
							<span class="price">￥{{$y->money}}</span>
							<span>{{$y->order_num}}</span>
							<span>&nbsp;&nbsp;&nbsp;￥{{$y->target}}</span>
						</p>
						<p>
							<span class="zc-progress-txt">已筹款</span>
							<span class="zc-progress-txt">支持数</span>
							<span class="zc-progress-txt">目标</span>
						</p>
					</div>
				</div>
			</li>
			@endforeach
			
		</ul>
		<div class="page">
	       {{$crowds->links()}}
			<!-- <a href="">上一页</a>
			<a href="" class="active">1</a>
			<a href="">2</a>
			<a href="">3</a>
			<a href="">下一页</a> -->
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
<script src="/js/jquery.min.js"></script>
<script>
	    // $('.hangye a').click(function(){
		// 	$(this).addClass("select");
		// 	$(this).siblings("a").removeClass("select");
		// 	var url = 
		// 	$.ajax({
		// 		  type:"GET",
		// 		  url:url,
		// 		  data:{content:content,blog_id:blog_id,_token:_token},
		// 		  dataType:'json',
		// 		  success:function(data){
                     
		// 			$("textarea[name='content']").val('');
		// 		  }
		// 	  });
		// });
</script>