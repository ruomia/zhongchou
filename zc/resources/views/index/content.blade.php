<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>众筹-详情</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/common.css">
	<link rel="stylesheet" href="/css/content.css">
</head>
<body>
@include('layouts.new')
	<!-- 基本信息 -->
	<div class="container zc-info">
		<span class="sh-label"></span>
		<div class="head clearfix">
			<div class="info-face"><a href=""><img src="{{Storage::url($data->crowfd_img)}}" alt=""></a></div>
			<div class="info-title">
				<p class="info-title1">{{$data->title}}</p>
				<p class="info-author">发起人 <span>{{$data->user->mobile}}</span></p>
			</div>
		</div>
		<div class="con clearfix">
			<div class="left">
				<img src="{{Storage::url($data->crowfd_img)}}" alt="">
			</div>
			<div class="right">
				<!-- <div class="supnum"><strong>{{$data->zhan}}</strong> 支持数</div> -->
				<div class="money"><strong>￥{{$data->money}}</strong> 已筹款</div>
				<div class="progress-num">{{$data->money/$data->target*100}}%</div>
				<div class="progress"><div></div></div>
				<div> <span class="fr">目标筹资<strong>￥{{$data->target}}</strong></span></div>
				<div class="btn">
					<a href="{{route('crowds.buy',['id'=>$data->id])}}" class="btn-blue" style="margin-right:175px;">立即支持</a>
					<input type="button" value="顶" id="zan" class="btn-blue" >
					<input type="button" value="收藏" class="btn-blue"  name="shoucang" >
				</div>
				
			</div>
		</div>
		<div class="btn-banner">
			<a href="" class="on">项目详情</a>
			<a href="#pl">评论</a>
			<a href="#sup">支持记录</a>
		</div>
		<!-- 众筹详情 -->
		<div class="zc-desc clearfix">
			<div class="left">
				<div class="desc-con">
					<p class="line"></p>
					<h3><span>项目目的</span></h3>
					<div class="desc-con1">
						{{$data->aim}}
					</div>
				</div>
				
				<div class="desc-con">
					<p class="line"></p>
					<h3 id="pl"><span>评论</span></h3>
					<div class="desc-con1">
						<ul class="pl-list">
							
							<li class="clearfix pl-form">
								<div class="pl-l">
										<img src="{{Storage::url(session('smface'))}}" alt="">
									</div>
									<div class="pl-r">
										<form action="">
											{{csrf_field()}}
											<input type="hidden" name="crowd_id" value="{{$data->id}}">
											<textarea name="content"></textarea>
											<input type="button" id="btn-comment" class="btn-blue" value="发布">
										</form>
									</div>
								</li>
						</ul>
						<ul class="pl-list" id="list1">
	
						</ul>
					</div>
				</div>
				<div class="desc-con">
					<p class="line"></p>
					<h3 id="sup"><span>支持记录</span></h3>
					<div class="desc-con1">
						<table class="sup-list">
							<thead>
								<tr>
									<th>订单序号</th>
									<th>支持者</th>
									<th>支持项</th>
									<th>支持时间</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders['data'] as $v)
								<tr>
									<td>4</td>
									<td><a href="">{{$v->user->mobile}}</a></td>
									<td class="money">￥{{$v->money}}</td>
									<td>{{$v->created_at}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						
						<div class="info">
							已筹款：<strong>￥{{$orders['sum']}}</strong>   
							支持数：<strong>{{$orders['count']}}</strong>  
							<!-- 剩余时间：<strong>10天</strong>  -->
							<a href="{{route('crowds.buy',['id'=>$data->id])}}" class="btn-blue">立即支持</a>
						</div>
						<div class="warnning">
							<h3>风险说明</h3>
							<ol>
								<li>众筹不是商品交易。支持者根据自己的判断选择、支持众筹项目，与发起人共同实现梦想并获得发起人承诺的回报，众 筹存在一定风险。</li>
								<li>众筹网平台只提供平台网络空间、技术服务和支持等中介服务。作为居间方，并不是发起人或支持者中的任何一方，众 筹仅存在于发起人和支持者之间，使用众筹平台产生的法律后果由发起人与支持者自行承担。</li>
								<li>众筹项目的回报发放、发票开具及其他后续服务事项均由发起人负责。如果发生发起人无法发放回报、延迟发放回报、 不提供回报后续服务等情形，您需要直接和发起人协商解决，众筹网对此不承担任何责任。</li>
								<li>由于发起人能力和经验不足、市场风险、法律风险等各种因素，众筹可能失败。众筹期限内未达到目标筹资额失败的项 目，您支持的款项会全部原路退还给您；其他情况下，您需要直接和发起人协商解决，众筹网对此不承担任何责任。</li>
								<li>支持纯抽奖档位、无私支持档位，一旦支付成功将不予退款，众筹失败的除外。</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- 回报列表 -->
			<div class="right">
				<ul class="hb-list">
				@foreach($ret as $v)
					<li onclick="location.href='zc-sup.html';">
					    <a href="{{route('crowds.buy',['id'=>$data->id])}}">
						<div class="price"><strong>￥{{$v->money}}</strong> {{$v->people_num}}人 <span class="fr">></span></div>
						<div class="title">{{$v->title}}</div>
						<div class="desc">{{$v->content}}</div>
						<div class="time">预计回报时间：项目结束后3天</div>
						</a>
					</li>
				@endforeach
				</ul>
				<br>
				<a href="{{route('crowds.buy',['id'=>$data->id])}}" class="btn-blue">支持此项目</a>
				<div class="contact">
					<h3>联系我们</h3>
					<p>发起人：{{$data->user->name}}</p>
					<p>联系电话：{{$data->user->mobile}}</p>
				</div>
			</div>
		</div>
	</div>

	<!-- 热门推荐 -->
	<div class="container recommend">
		<div class="head">热门推荐</div>
		<div class="con">
			<ul class="r-list clearfix">
			@foreach($top4 as $t)
				<li>
				   
					<div class="r-img"><a href="{{route('crowd',['id'=>$t->id])}}"><img src="{{Storage::url($t->crowfd_img)}}" alt=""></a></div>
					<p class="r-title"><a href="{{route('crowd',['id'=>$t->id])}}">{{str_limit($t->title,25,'...')}}</a></p>
					<p class="r-txt">已筹资：<strong>￥{{$t->money}}</strong></p>
					<p class="r-txt">剩余时间：<strong>{{$t->day}}天</strong></p>
					
				</li>
			@endforeach
				
			</ul>
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
	function showBtn(gx)
	{
		if(gx=='no')
		{
			$("input[name=shoucang]").attr('id','btn-sc').val('收藏');
		}
		else if(gx=='sc')
		{
			$("input[name=shoucang]").attr('id','btn-no').val('取消收藏');
		}
		//重新绑定事件
		bindEvent();
	}
	showBtn("{{$gx}}");
	function bindEvent()
	{
		//关注
		$("#btn-sc").click(function (){
			$.ajax({
				type:"GET",
				url:"/sc/{{$data->id}}",
				dataType:"json",
				success:function(data){
					if(data.errno==0)
					{
						alert('操作成功！');
						showBtn('sc');
					}
					else
					{
						if(data.errno==1001)
						{
							location.href="/login";
						}
					}
				}
			});
		});
		//取消关注
		$("#btn-no").click(function (){
			$.ajax({
				type:"GET",
				url:"/cancel/{{$data->id}}",
				dataType:"json",
				success:function(data){
					if(data.errno==0)
					{
						alert('操作成功！');
						showBtn('no');
					}
					else
					{
						if(data.errno==1001)
						{
							location.href="/login";
						}
					}
				}
			});
		});
	}
	$("#zan").click(function (){
		$.ajax({
			type:"GET",
			url:"/zan/{{$data->id}}",
			dataType:"json",
			success:function(data){
				if(data.errno!=0)
				{	
					
					//如果已经 点过了就把按钮禁用
					if(data.errno==3)
					{
						$("#zan").attr("disabled",true);
					}
					alert(data.errmsg);
					if(data.errno==1001)
					{
						location.href = '/login';
					}
				}
				else
				{
					$("#zanNum").html( 1*$("#zanNum").html()+1 );
				}
			}
		});
	});
	$("#btn-comment").click(function (){
		var content = $.trim($("textarea[name=content]").val());
		var _token = $("input[name=_token]").val();
		var crowd_id = $("input[name=crowd_id]").val();
		if(content=="")
		{
			alert('评论内容不能为空！');
			return;
		}
		if(content.length < 10)
		{
			alert("评论内容不能少于10个字符");
			return;
		}
		$.ajax({
			type:"POST",
			url:"/comment",
			data:{content:content,_token:_token,crowd_id:crowd_id},
			dataType:"json",
			success:function(data)
			{
				$("textarea[name=content]").val('');
			}
		});
	});
	//过滤内容
	function htmlspecialchars(str)    
    {    
        var s = "";  
        if (str.length == 0) return "";  
        for   (var i=0; i<str.length; i++)  
        {  
            switch (str.substr(i,1))  
            {  
                case "<": s += "&lt;"; break;  
                case ">": s += "&gt;"; break;  
                case "&": s += "&amp;"; break;  
                case " ":  
                    if(str.substr(i + 1, 1) == " "){  
                        s += " &nbsp;";  
                        i++;  
                    } else s += " ";  
                    break;  
                case "\"": s += "&quot;"; break;  
                case "\n": s += "<br>"; break;  
                default: s += str.substr(i,1); break;  
            }  
        }  
        return s;  
    } 
	var ajax_page_url = "{{route('commentList',['crowd_id'=>$data->id])}}";
	function load_data(page)
	{
		$.ajax({
			type:"GET",
			url:ajax_page_url+"?page="+page,
			dataType:"json",
			success:function(data)
			{
				var pages = data.last_page;
				var html = "";
				
				$(data.data).each(function(k,v){
				
					html += '<li class="clearfix"> \
								<div class="pl-l"> \
									<img src="/uploads/'+v.user.smface+'" alt=""> \
								</div> \
								<div class="pl-r"> \
									<p class="author">'+v.user.mobile+'</p>  \
									<p class="content">'+htmlspecialchars(v.content)+'</p> \
									<p class="time">'+v.created_at+'</p> \
								</div> \
							</li>';
				});
				html += '<div class="page">';
				if(page!=1)
				{
					html += " <a onclick='load_data("+(page-1)+")'>上一页</a>  ";
				}
				var start = 1;
				var end = pages;
				if(page<5)
				{
					start =1;
					end = 5;
				}	
				else if(page>=5 && page<pages-3)
				{
					start = page-3;
					end = page+2;
					html += "<a onclick='load_data(1)' >1</a>";
					html += "<a onclick='load_data(2)' >2</a>";
					html += "<a>...</a>";
				}
				else
				{
					start = page-2;
					end = pages;
					html += "<a onclick='load_data(1)' >1</a>";
					html += "<a onclick='load_data(2)' >2</a>";
					html += "<a>...</a>";
				}

				for(var i=start;i<=end;i++)
				{
					if(page==i)
						html += "  <a onclick='load_data("+i+")' class='active'>"+i+"</a>  ";
					else
						html += "  <a onclick='load_data("+i+")'>"+i+"</a>  ";
				}
				if(end<pages)
				{
					html += "<a>...</a>";
				}
				if(page<data.last_page)
				{
					html += " <a onclick='load_data("+(page+1)+")'>下一页</a>  ";
				}

				html += "</div>";
				$("#list1").html(html);
			
			}
		});	
	}
	load_data(1);
	
</script>