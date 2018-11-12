<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>众筹-支持</title>
	<link rel="stylesheet" href="/css/reset.css">
	<link rel="stylesheet" href="/css/common.css">
	<link rel="stylesheet" href="/css/zc-sup.css">
	
</head>
<style>
       .li{
		   /* color:red; */
	   }
</style>

<body>
@include('layouts.new')
	
	<!-- 表单 -->
	<div class="zc-add">
@if($errors->any())

@foreach($errors->all() as $e)

{{$e}}

@endforeach
@endif
		<div class="container zc-add-con">
			<form action="{{route('crowds.dobuy')}}" class="form"  method="post"  enctype="multipart/form-data"  >
			    {{csrf_field()}}
				<div class="zc-add-con-1">
					<ul class="hb-list">
					    @foreach($orders as $od)
						<li class="li">
						    <input type="radio" name="return_id" id="" style="display:none;" value="{{$od->id}}">
							<div class="price">￥<strong class="money">{{$od->money}}</strong ><i class="people_num">{{$od->people_num}}</i> 人<span class="fr">></span></div>
							<div class="title">{{$od->title}}</div>
							<div class="desc">{{$od->content}}</div>
							<div class="time">预计回报时间：项目结束后3天</div>
						</li>
					    @endforeach
					</ul>
					<div class="fensu">
						<strong>份数</strong>
						<span id="rmv">[-]</span> <input type="text" id="num" name="order_num" value="0"> <span id="add">[+]</span>
					</div>
					<h3>收货信息</h3>
					<div>
						<input type="text" placeholder="输入用户名" name="user_name">
					</div>
					<div>
						<input type="text" placeholder="手机号" name="mobile">
					</div>
					<div>
						<input type="text" placeholder="详细地址" name="adress">
					</div>
					<div>
						<input type="text" placeholder="备注（选填，关于订单的特殊要求等）" name="base">
					</div>
					<div class="total-pay">
						支付 <strong id="money">￥</strong>
						<input type="hidden" name="money" id="ip_money">
					</div>
					<div class="zc-add-btn">
					     <input type="hidden" name="crowfd_id" value="{{$crowfd_id}}">
						 
						<input type="submit" value="提交订单">
					</div>
				</div>
			</form>
		</div>
	</div>

</body>
</html>
<script src="/js/jquery.min.js"></script>
<script>
        $(".li").click( function () {
			 var money = 0;
			 var people_num = 1;

			 $(this).addClass("select");
			 $(this).siblings(".li").removeClass("select");

		     $(this).find('input').attr("checked",'checked'); 
			 $(this).siblings(".li").find('input').removeAttr("checked"); 

			 var money = $(this).find('.money').html()*1;
			//  var people_num = $(this).find('.people_num').html()*1;
			 
			 $('#money').html("￥"+money);
			 $('#ip_money').val(money);
             $('#num').val('1');
             
	    });

		$('#add').click(function(){
				var num = $('#num').val();
				var money = $("li.select .money").html();
				var people_num = $("li.select .people_num").html()*1;

				if(num<people_num){
					var peo_num = num*1+1;
					var money1 = peo_num*1*money;
				    $('#num').val(peo_num);

					$('#money').html("￥"+money1);
					$('#ip_money').val(money1);
				}
		    });
			$('#rmv').click(function(){
				var num = $('#num').val();
				var money = $("li.select .money").html();
				var people_num = $("li.select .people_num").html()*1;

				if(num*1>1){
					var peo_num = num*1-1;
					var money2 = peo_num*1*money;
					$('#num').val(peo_num);

					$('#money').html("￥"+money2);
					$('#ip_money').val(money2);
			    }
			});
			
			$('#num').blur(function(){
				var num = $('#num').val();
				if(num*1>people_num||num*1<0){
				  $('#num').val('1');
				}
				if(!(num*1>=0&&num*1<=people_num)){
				  $('#num').val('1');  
				}
			});
        
</script>