<form id="pagerForm" method="post" action="/admin/config/index">
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="<?php echo $page_size?>" />
	
</form>


<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="/admin/config" method="post">
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					我的客户：<input type="text" name="keyword" />
				</td>
				<td>
					建档日期：<input type="text" class="date" readonly="true" />
				</td>
			</tr>
		</table>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="/admin/category/add" target="navTab" rel="edit"><span>添加</span></a></li>
			<li><a class="delete" href="/admin/category/del/{sid_user}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="/admin/category/edit/{sid_user}" target="navTab"  rel="edit"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th>编号</th>
				<th>名称</th>
				<th>上级分类</th>
				<th width="80">建档日期</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($list as $v):?>
			<tr target="sid_user" rel="<?php echo $v['id']?>">
				<td><?php echo $v['id']?></td>
				<td><?php echo $v['cat_name']?></td>
				<td><?php echo $v['pname']?></td>
				<td><?php echo $v['create_time']?></td>
				<td><a target="navTab" rel="edit" class="btnEdit" href="<?php echo '/admin/category/edit/'.$v['id']?>" >编辑</a>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<?php echo form_dropdown('numPerPage',array(10=>10,20=>20,50=>50,100=>100,200=>200), $page_size,'class="combox" onchange="navTabPageBreak({numPerPage:this.value})"')?>
			<span>条，共<?php echo $total?>条</span>
		</div>
		
		<div class="pagination" targetType="navTab" totalCount="<?php echo $total?>" numPerPage="<?php echo $page_size?>" pageNumShown="10" currentPage="<?php echo $cur_page?>"></div>

	</div>
</div>
