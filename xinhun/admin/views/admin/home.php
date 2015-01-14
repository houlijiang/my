<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS管理后台</title>

<link href="/js/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/js/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/js/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="/js/dwz/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if IE]>
<link href="themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<!--[if lte IE 9]>
<script src="js/speedup.js" type="text/javascript"></script>
<![endif]-->

<script src="/js/dwz/js/jquery-1.7.2.js" type="text/javascript"></script>
<script src="/js/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/js/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="/js/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>
<script src="/js/dwz/xheditor/xheditor-1.2.1.min.js" type="text/javascript"></script>
<script src="/js/dwz/xheditor/xheditor_lang/zh-cn.js" type="text/javascript"></script>

<script src="/js/dwz/js/dwz.min.js" type="text/javascript"></script>
<script src="/js/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>
<script src="/js/upload.js?v1" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
	DWZ.init("/js/dwz/dwz.frag.xml", {
		loginUrl:"/admin/user/login", loginTitle:"登录",	// 弹出登录对话框
//		loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({themeBase:"/js/dwz/themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});

</script>
</head>

<body scroll="no">
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="#">标志</a>
				<ul class="nav">
<!--					<li id="switchEnvBox"><a href="javascript:">（<span>北京</span>）切换城市</a>-->
<!--						<ul>-->
<!--							<li><a href="sidebar_1.html">北京</a></li>-->
<!--							<li><a href="sidebar_2.html">上海</a></li>-->
<!--							<li><a href="sidebar_2.html">南京</a></li>-->
<!--							<li><a href="sidebar_2.html">深圳</a></li>-->
<!--							<li><a href="sidebar_2.html">广州</a></li>-->
<!--							<li><a href="sidebar_2.html">天津</a></li>-->
<!--							<li><a href="sidebar_2.html">杭州</a></li>-->
<!--						</ul>-->
<!--					</li>-->
					<li><a href="/admin/user/change_pwd" target="dialog" width="600">设置</a></li>
					<li><?php echo anchor("/user/logout",'退出')?></li>
				</ul>
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<!--<li theme="red"><div>红色</div></li>-->
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>
				</ul>
			</div>

			<!-- navMenu -->
			
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>

				<div class="accordion" fillSpace="sidebar">
					<div class="accordionHeader">
						<h2><span>Folder</span>管理菜单</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="<?php echo site_url('goods')?>" target="navTab">商品管理</a>
								<ul>
									<li><a href="<?php echo site_url('goods/add')?>" target="navTab" rel="edit">发布商品</a></li>
									<li><a href="<?php echo site_url('goods')?>" target="navTab" rel="goods">商品列表</a></li>
								</ul>
							</li>
							<li><a href="<?php echo site_url('article')?>" target="navTab">文章管理</a>
								<ul>
									<li><a href="<?php echo site_url('article/add')?>" target="navTab" rel="edit">发布文章</a></li>
									<li><a href="<?php echo site_url('article')?>" target="navTab" rel="article">文章列表</a></li>
								</ul>
							</li>
							<li><a href="<?php echo site_url('ad')?>" target="navTab">广告管理</a>
								<ul>
									<li><a href="<?php echo site_url('ad/add')?>" target="navTab" rel="edit">发布广告</a></li>
									<li><a href="<?php echo site_url('ad')?>" target="navTab" rel="ad">广告列表</a></li>
								</ul>
							</li>
							<li><a href="<?php echo site_url('category')?>" target="navTab">系统管理</a>
								<ul>
									<li><a href="<?php echo site_url('category')?>" target="navTab" rel="category">分类管理</a></li>
									<li><a href="<?php echo site_url('config')?>" target="navTab" rel="config">站点配置</a></li>
								</ul>
							</li>
							<li><a>帐号管理</a>
								<ul>
									<li><a href="<?php echo site_url('user/add')?>" target="navTab" rel="w_panel">我的信息</a></li>
									<li><a href="<?php echo site_url('user/change_pwd')?>" target="navTab" rel="w_tabs">修改密码</a></li>
<!--									<li><a href="/dwz/w_dialog.html" target="navTab" rel="w_dialog">弹出窗口</a></li>-->
<!--									<li><a href="/dwz/w_alert.html" target="navTab" rel="w_alert">提示窗口</a></li>-->
<!--									<li><a href="/dwz/w_list.html" target="navTab" rel="w_list">CSS表格容器</a></li>-->
<!--									<li><a href="/dwz/demo_page1.html" target="navTab" rel="w_table">表格容器</a></li>-->
<!--									<li><a href="/dwz/w_removeSelected.html" target="navTab" rel="w_table">表格数据库排序+批量删除</a></li>-->
<!--									<li><a href="/dwz/w_tree.html" target="navTab" rel="w_tree">树形菜单</a></li>-->
<!--									<li><a href="/dwz/w_accordion.html" target="navTab" rel="w_accordion">滑动菜单</a></li>-->
<!--									<li><a href="/dwz/w_editor.html" target="navTab" rel="w_editor">编辑器</a></li>-->
<!--									<li><a href="/dwz/w_datepicker.html" target="navTab" rel="w_datepicker">日期控件</a></li>-->
<!--									<li><a href="/dwz/demo/database/db_widget.html" target="navTab" rel="db">suggest+lookup+主从结构</a></li>-->
<!--									<li><a href="/dwz/demo/database/treeBringBack.html" target="navTab" rel="db">tree查找带回</a></li>-->
<!--									<li><a href="/dwz/demo/sortDrag/1.html" target="navTab" rel="sortDrag">单个sortDrag示例</a></li>-->
<!--									<li><a href="/dwz/demo/sortDrag/2.html" target="navTab" rel="sortDrag">多个sortDrag示例</a></li>-->
								</ul>
							</li>
									
<!--							<li><a>表单组件</a>-->
<!--								<ul>-->
<!--									<li><a href="/dwz/w_validation.html" target="navTab" rel="w_validation">表单验证</a></li>-->
<!--									<li><a href="/dwz/w_button.html" target="navTab" rel="w_button">按钮</a></li>-->
<!--									<li><a href="/dwz/w_textInput.html" target="navTab" rel="w_textInput">文本框/文本域</a></li>-->
<!--									<li><a href="/dwz/w_combox.html" target="navTab" rel="w_combox">下拉菜单</a></li>-->
<!--									<li><a href="/dwz/w_checkbox.html" target="navTab" rel="w_checkbox">多选框/单选框</a></li>-->
<!--									<li><a href="/dwz/demo_upload.html" target="navTab" rel="demo_upload">iframeCallback表单提交</a></li>-->
<!--									<li><a href="/dwz/w_uploadify.html" target="navTab" rel="w_uploadify">uploadify多文件上传</a></li>-->
<!--								</ul>-->
<!--							</li>-->
<!--							<li><a>组合应用</a>-->
<!--								<ul>-->
<!--									<li><a href="/dwz/demo/pagination/layout1.html" target="navTab" rel="pagination1">局部刷新分页1</a></li>-->
<!--									<li><a href="/dwz/demo/pagination/layout2.html" target="navTab" rel="pagination2">局部刷新分页2</a></li>-->
<!--								</ul>-->
<!--							</li>-->
<!--							<li><a>图表</a>-->
<!--								<ul>-->
<!--									<li><a href="chart/test/barchart.html" target="navTab" rel="chart">柱状图(垂直)</a></li>-->
<!--									<li><a href="chart/test/hbarchart.html" target="navTab" rel="chart">柱状图(水平)</a></li>-->
<!--									<li><a href="chart/test/linechart.html" target="navTab" rel="chart">折线图</a></li>-->
<!--									<li><a href="chart/test/linechart2.html" target="navTab" rel="chart">曲线图</a></li>-->
<!--									<li><a href="chart/test/linechart3.html" target="navTab" rel="chart">曲线图(自定义X坐标)</a></li>-->
<!--									<li><a href="chart/test/piechart.html" target="navTab" rel="chart">饼图</a></li>-->
<!--								</ul>-->
<!--							</li>-->
<!--							<li><a href="dwz.frag.xml" target="navTab" external="true">dwz.frag.xml</a></li>-->
<!--						</ul>-->
					</div>
<!--					<div class="accordionHeader">-->
<!--						<h2><span>Folder</span>典型页面</h2>-->
<!--					</div>-->
<!--					<div class="accordionContent">-->
<!--						<ul class="tree treeFolder treeCheck">-->
<!--							<li><a href="demo_page1.html" target="navTab" rel="demo_page1">查询我的客户</a></li>-->
<!--							<li><a href="demo_page1.html" target="navTab" rel="demo_page2">表单查询页面</a></li>-->
<!--							<li><a href="demo_page4.html" target="navTab" rel="demo_page4">表单录入页面</a></li>-->
<!--							<li><a href="demo_page5.html" target="navTab" rel="demo_page5">有文本输入的表单</a></li>-->
<!--							<li><a href="javascript:;">有提示的表单输入页面</a>-->
<!--								<ul>-->
<!--									<li><a href="javascript:;">页面一</a></li>-->
<!--									<li><a href="javascript:;">页面二</a></li>-->
<!--								</ul>-->
<!--							</li>-->
<!--							<li><a href="javascript:;">选项卡和图形的页面</a>-->
<!--								<ul>-->
<!--									<li><a href="javascript:;">页面一</a></li>-->
<!--									<li><a href="javascript:;">页面二</a></li>-->
<!--								</ul>-->
<!--							</li>-->
<!--							<li><a href="javascript:;">选项卡和图形切换的页面</a></li>-->
<!--							<li><a href="javascript:;">左右两个互动的页面</a></li>-->
<!--							<li><a href="javascript:;">列表输入的页面</a></li>-->
<!--							<li><a href="javascript:;">双层栏目列表的页面</a></li>-->
<!--						</ul>-->
<!--					</div>-->
<!--					<div class="accordionHeader">-->
<!--						<h2><span>Folder</span>流程演示</h2>-->
<!--					</div>-->
<!--					<div class="accordionContent">-->
<!--						<ul class="tree">-->
<!--							<li><a href="newPage1.html" target="dialog" rel="dlg_page">列表</a></li>-->
<!--							<li><a href="newPage1.html" target="dialog" rel="dlg_page2">列表</a></li>-->
<!--						</ul>-->
					</div>
				</div>
			</div>
		</div>
		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:;">我的主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<div class="alertInfo">
								<h2>欢迎管理员：<?php echo $this->session->userdata('user_name')?></h2>
							</div>
							<div class="right">
								<p><a href="doc/dwz-user-guide.zip" target="_blank" style="line-height:19px">DWZ框架使用手册(CHM)</a></p>
								<p><a href="doc/dwz-ajax-develop.swf" target="_blank" style="line-height:19px">DWZ框架Ajax开发视频教材</a></p>
							</div>
							<p><span>新婚网管理后台</span></p>
						</div>
					</div>
					
				</div>
			</div>
		</div>

	</div>

	<div id="footer">Copyright &copy; 2010 <a href="demo_page2.html" target="dialog">DWZ团队</a> 京ICP备05019125号-10</div>

</body>
</html>