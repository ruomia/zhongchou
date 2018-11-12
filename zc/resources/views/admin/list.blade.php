<!DOCTYPE html>
<html class=" js csstransforms3d"><head>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>咨询管理－团队</title>
	<link rel="stylesheet" href="/admin/css/base.css">
	<link rel="stylesheet" href="/admin/css/page.css">
	<!--[if lte IE 8]>
	<link href="/admin/css/ie8.css" rel="stylesheet" type="text/css"/>
	<![endif]-->
	<script type="text/javascript" src="/admin/js/jquery.min.js"></script>
	<script type="text/javascript" src="/admin/js/main.js"></script>
	<script type="text/javascript" src="/admin/js/modernizr.js"></script>
	<!--[if IE]>
	<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>

<body style="background: #f6f5fa;">

	<!--content S-->
	<div class="super-content">
		<div class="superCtab">
			<div class="ctab-title clearfix"><h3>类型管理</h3><a href="index.php?p=admin&c=filmtype&a=addType" class="sp-column"><i class="ico-export"></i>添加类型</a></div>
			
			<div class="ctab-Main">
				
				<div class="ctab-Mian-cont">
					<div class="Mian-cont-btn Mian-cont-btn2 clearfix">
						<div class="operateBtn">
							<div class="wd-msg"></div>
						</div>
						<div class="searchBar">
							<input type="text" id="" value="" class="form-control srhTxt" placeholder="输入子站关键字搜索">
							<input type="button" class="srhBtn" value="">
						</div>
					</div>
					
					<div class="Mian-cont-wrap">
						<div class="defaultTab-T">
							<table border="0" cellspacing="0" cellpadding="0" class="defaultTable">
								<tbody><tr><th class="t_1">编号</th><th class="t_2_1">类型名称</th><th class="t_2_1">路径</th><th>操作</th></tr>
							</tbody></table>
						</div>
						<table border="0" cellspacing="0" cellpadding="0" class="defaultTable defaultTable2">
							<tbody>
							<{foreach from=$dataArr item=$v}>
							<tr>
								<td class="t_1"><{$v.id}></td>
								<td class="t_2_1"><a href="zixun_dtl.html" class="team-a"><{$v.name}></a></td>
								<td class="t_1"><{$v.path}></td>
								<td class="alcenter"><a href="index.php?p=admin&c=filmtype&a=deleteType&id=<{$v.id}>" class="export-a">删除</a></td>
							</tr>
							<{/foreach}>

						</tbody></table>
						<!--pages S-->
						
						<!--pages E-->
					</div>
				</div>
			</div>
		</div>
		<!--main-->
		
	</div>
	<!--content E-->




</body></html>