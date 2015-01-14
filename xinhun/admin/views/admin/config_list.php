<form id="pagerForm" method="post" action="<?php echo site_url($this->uri->segment(1))?>">
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="<?php echo $page_size?>" />
	
</form>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="<?php echo site_url($this->uri->segment(1).'/add')?>" target="navTab" rel="edit"><span>添加</span></a></li>
			<li><a class="delete" href="<?php echo site_url($this->uri->segment(1).'/del')?>/{sid_user}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="<?php echo site_url($this->uri->segment(1).'/edit')?>/{sid_user}" target="navTab"  rel="edit"><span>修改</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="120">键名</th>
				<th>描述</th>
				<th>键值</th>
				<th width="80">建档日期</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($list as $v):?>
			<tr target="sid_user" rel="<?php echo $v['id']?>">
				<td><?php echo $v['config_key']?></td>
				<td><?php echo $v['key_name']?></td>
				<td><?php echo $v['config_value']?></td>
				<td><?php echo $v['create_time']?></td>
				<td><?php echo anchor('/config/edit/'.$v['id'],'编辑','target="navTab" rel="edit" class="btnEdit"')?></td>
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
