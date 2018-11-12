@extends('layouts.main')
@section('title','首页')
@section('content')

	<!-- 图片轮播 -->
	<div height="337px" id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
  
  <!-- Wrapper for slides -->
  
  
    <div class="carousel-inner" role="listbox" style="height:337px;">
    <div class="item active">
	  <a href="{{route('crowd',['id'=>$top3[1]->id])}}">
      <img src="{{Storage::url($top3[1]->crowfd_img)}}" alt="...">
	  </a>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
	<a href="{{route('crowd',['id'=>$top3[0]->id])}}">
      <img src="{{Storage::url($top3[0]->crowfd_img)}}" alt="...">
	  </a>
      <div class="carousel-caption">
        ...
      </div>
    </div>
	<div class="item">
	<a href="{{route('crowd',['id'=>$top3[2]->id])}}">
      <img src="{{Storage::url($top3[2]->crowfd_img)}}" alt="...">
	  </a>
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>
   

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"><</span> -->
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <!-- <span class="glyphicon glyphicon-chevron-right" aria-hidden="true">></span> -->
    <span class="sr-only">Next</span>
  </a>
</div>
            



	<!-- 众筹列表 -->
	<div class="container zc-section">
		<div class="zc-header">
			<h3>热门推荐</h3>
			<div class="hangye"> 行业筛选：
				<!-- <a href="{{route('crowds.list',array_merge(['type'=>'']))}}" @if(session('type')=='')class="select" @endif>全部</a> -->
				
				<a href="{{route('crowds.list',array_merge(['type'=>'公益']))}}" @if(session('type')=='公益')class="select" @endif>公益</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'农业']))}}" @if(session('type')=='农业')class="select" @endif>农业</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'出版']))}}" @if(session('type')=='出版')class="select" @endif>出版</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'娱乐']))}}" @if(session('type')=='娱乐')class="select" @endif> 娱乐</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'艺术']))}}" @if(session('type')=='艺术')class="select" @endif>艺术</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'其他']))}}" @if(session('type')=='其他')class="select" @endif>其他</a>
			</div>
		<ul class="zc-list">
		@foreach($hot6 as $y)
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
		<!-- <a href="" class="more-btn">浏览更多项目</a> -->
		<div class="more-btn"></div>
	</div>








	<div class="container zc-section">
		<div class="zc-header">
			<h3>娱乐众筹</h3>
			<div class="hangye"> 行业筛选：
				<!-- <a href="{{route('crowds.list',array_merge(['type'=>'']))}}" @if(session('type')=='')class="select" @endif>全部</a> -->
				
				<a href="{{route('crowds.list',array_merge(['type'=>'公益']))}}" @if(session('type')=='公益')class="select" @endif>公益</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'农业']))}}" @if(session('type')=='农业')class="select" @endif>农业</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'出版']))}}" @if(session('type')=='出版')class="select" @endif>出版</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'娱乐']))}}" @if(session('type')=='娱乐')class="select" @endif> 娱乐</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'艺术']))}}" @if(session('type')=='艺术')class="select" @endif>艺术</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'其他']))}}" @if(session('type')=='其他')class="select" @endif>其他</a>
			</div>
		</div>
		<ul class="zc-list">
		    @foreach($crowdsY as $y)
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
		<div class="more-btn"></div>
	</div>



	<div class="container zc-section">
		<div class="zc-header">
			<h3>农业众筹</h3>
			<div class="hangye"> 行业筛选：
				<!-- <a href="{{route('crowds.list',array_merge(['type'=>'']))}}" @if(session('type')=='')class="select" @endif>全部</a> -->
				
				<a href="{{route('crowds.list',array_merge(['type'=>'公益']))}}" @if(session('type')=='公益')class="select" @endif>公益</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'农业']))}}" @if(session('type')=='农业')class="select" @endif>农业</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'出版']))}}" @if(session('type')=='出版')class="select" @endif>出版</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'娱乐']))}}" @if(session('type')=='娱乐')class="select" @endif> 娱乐</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'艺术']))}}" @if(session('type')=='艺术')class="select" @endif>艺术</a>
				<a href="{{route('crowds.list',array_merge(['type'=>'其他']))}}" @if(session('type')=='其他')class="select" @endif>其他</a>
			</div>
		</div>
		<ul class="zc-list">
		@foreach($crowdsN as $y)
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
		<div class="more-btn"></div>
	</div>
	<!-- 页脚 -->
	<div class="footer">
		<div class="container">
			©2017 XXX科技有限公司 版权所有 京ICP证332211号 | 出版物经营许可证编号新出发（京）批字第直123432号 | 食品流通许可证 编号：SP1324534523445 | 京公网安备00011122321311
		</div>
	</div>
	
</body>
</html>
@endsection