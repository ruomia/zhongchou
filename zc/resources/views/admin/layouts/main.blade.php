<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理</title>
    <link rel="stylesheet" href="/admin/css/base.css">
    <link rel="stylesheet" href="/admin/css/page.css">
    <!--[if lte IE 8]>
    <link href="/admincss/ie8.css" rel="stylesheet" type="text/css"/>
    <![endif]-->
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/js/main.js"></script>
    <script type="text/javascript" src="/admin/js/modernizr.js"></script>
    <!--[if IE]>
    <script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
</head>
<style>
    .team-a {
        text-overflow: none;
    }
    .pagination{display:inline-block;padding-left:0;margin:20px 0;border-radius:4px}
    .pagination>li{display:inline}
    .pagination>li>a,.pagination>li>span{position:relative;float:left;padding:6px 12px;margin-left:-1px;line-height:1.42857143;color:#428bca;text-decoration:none;background-color:#fff;border:1px solid #ddd}
    .pagination>li:first-child>a,.pagination>li:first-child>span{margin-left:0;border-top-left-radius:4px;border-bottom-left-radius:4px}
    .pagination>li:last-child>a,.pagination>li:last-child>span{border-top-right-radius:4px;border-bottom-right-radius:4px}
    .pagination>li>a:hover,.pagination>li>span:hover,.pagination>li>a:focus,.pagination>li>span:focus{color:#2a6496;background-color:#eee;border-color:#ddd}
    .pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{z-index:2;color:#fff;cursor:default;background-color:#428bca;border-color:#428bca}
    .pagination>.disabled>span,.pagination>.disabled>span:hover,.pagination>.disabled>span:focus,.pagination>.disabled>a,.pagination>.disabled>a:hover,.pagination>.disabled>a:focus{color:#777;cursor:not-allowed;background-color:#fff;border-color:#ddd}
    .pagination-lg>li>a,.pagination-lg>li>span{padding:10px 16px;font-size:18px}
    .pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span{border-top-left-radius:6px;border-bottom-left-radius:6px}
    .pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span{border-top-right-radius:6px;border-bottom-right-radius:6px}
    .pagination-sm>li>a,.pagination-sm>li>span{padding:5px 10px;font-size:12px}
    .pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span{border-top-left-radius:3px;border-bottom-left-radius:3px}
    .pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span{border-top-right-radius:3px;border-bottom-right-radius:3px}

    .time {
        position: relative;
        right: 265px;
        top:-0px;
        line-height:10px;
    }
    .srhTxt {
        position: relative;
        left:300px;
        top:-54px;
    }
</style>
<body>
<div class="super-header clearfix">
    <h2>网站后台管理系统</h2>
    <div class="head-right">
        <i class="ico-user"></i>当前用户：
        <div class="userslideDown">
            <a href="javascript:;" class="superUser">Admin<i class="ico-tri"></i></a>
            <div class="slidedownBox">
                <ul>
                    <li><a href="change_psw.html" target="Mainindex">修改密码</a></li>
                    <li><a href="index.html" target="_parent">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--header-->
<!--side S-->
<div class="super-side-menu">
    <div class="logo"><img src="../../../../Public/images/logo.png"></div>

    <div class="side-menu">
        <ul>
            <li @if(Route::currentRouteName() == 'glUser') class="on" @endif><a href="/admin/user" target="Mainindex"><i class="ico-1"></i>用户管理</a></li>
            <li @if(Route::currentRouteName() == '/admin/user') class="on" @endif><a href="/admin/crowd/" target="Mainindex"><i class="ico-2"></i>众筹管理</a></li>

          
            <li class="on"><a href=""  target="Mainindex"><i class="ico-3"></i>类型管理</a></li>
            <li><a href="tupian_pc_index.html" target="Mainindex"><i class="ico-4"></i>图片管理</a></li>
            <li><a href="{{route('crowd.shenhe')}}" target="Mainindex"><i class="ico-5"></i>审核管理</a></li>
            <li><a href="muban_Guanli.html" target="Mainindex"><i class="ico-6"></i>模板管理</a></li>
            <li><a href="xitong_set.html" target="Mainindex"><i class="ico-7"></i>系统设置</a></li>
        </ul>
    </div>
</div>
<!--side E-->
@yield('content')
<script type="text/javascript">
    $(function(){
        $('.side-menu li').click(function(){
            $(this).addClass('on').siblings().removeClass('on');
        })
    })
</script>

</body></html>