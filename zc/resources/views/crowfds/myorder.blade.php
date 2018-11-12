<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>众筹-会员中心-我的发起</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/member.css">
</head>
<body>

@include('layouts.new')
<!-- 主体 -->
<div class="member-body" style="min-height:700px;">
    <div class="container clearfix">
        
        <div class="right">
            <ul class="head">
                <li>我的订单</li>
            </ul>




            <table class="zc-list">
                <thead>
                <tr>
                    <th>项目信息</th>
                    <th>众筹金额</th>
                    <th>众筹目的</th>
                    <th></th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <!-- 项目 -->
                @foreach($myorder as $d)
                    <tr class="space">
                        <td colspan="5"></td>
                    </tr>

                    <tr class="time">
                        <td colspan="4">订单日期:{{$d->updated_at}}</td>
                        <td align="center"><a href="{{route('crowd',['id'=>$d->order->id])}}">查看</a></td>
                    </tr>
                    <tr class="info">
                        <td><a href="{{route('crowd',['id'=>$d->order->id])}}">{{$d->order->title}}<br><img src="{{Storage::url($d->order->crowfd_img)}}"></a></td>


                        <td>

                            目标金额：{{$d->order->target}}元</br>
                            已筹备：{{$d->order->money}}元
                        </td>

                        <td>
                            <a href="">{{$d->order->aim}}</a>
                        </td>
                        <td>
                            {{$d->order->content}}
                        </td>
                        <td>

                        </td>

                    </tr>
                @endforeach
                <!-- 项目 -->

                <!-- 项目 -->

                </tbody>
            </table>
            <!-- 翻页 -->
            <div>

            </div>
        </div>
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