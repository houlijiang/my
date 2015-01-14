<form id="pagerForm" method="post" action="<?php echo site_url($this->uri->segment(1))?>">
	<input type="hidden" name="pageNum" value="1" />
	<input type="hidden" name="numPerPage" value="<?php echo $page_size?>" />
	
</form>


<div class="pageHeader">
	<form onsubmit="return navTabSearch(this);" action="<?php echo site_url($this->uri->segment(1))?>" method="post">
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
				标题：
				<input type="text" name="keyword" value="<?php echo isset($keyword)?$keyword:''?>" />
				</td>
				<td>
				<label>广告位：</label>
				<?php echo form_dropdown('position_id',$position_list, isset($position_id)?$position_id:0,'class="combox"')?>
				</td>
				<td>
				<label>状态：</label>
				<?php echo form_dropdown('state',array(-1=>'状态',0=>'编辑中',1=>'上架','下架'), isset($state)?$state:-1,'class="combox"')?>
				</td>
				<td>
					发布时间：<input name="start_time" type="text" class="date" readonly="true" value="<?php echo isset($start_time)?$start_time:''?>" /> - <input name="end_time" type="text" class="date" readonly="true" value="<?php echo isset($end_time)?$end_time:''?>"/>
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
				<th width="10%">编号</th>
				<th width="20%">名称</th>
				<th width="10%">分类</th>
				<th width="10%">状态</th>
				<th width="10%">发布人</th>
				<th width="10%">时间</th>
				<th width="5%">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($list as $v):?>
			<tr target="sid_user" rel="<?php echo $v['id']?>">
				<td><?php echo $v['id']?></td>
				<td><?php echo $v['ad_name']?></td>
				<td><?php echo $v['position_name']?></td>
				<td><?php echo $this->ad_model->state[$v['state']]?></td>
				<td><?php echo $v['user_name']?></td>
				<td><?php echo $v['create_time']?></td>
				<td><?php echo anchor('/ad/edit/'.$v['id'],'编辑','target="navTab" class="btnEdit"')?></td>
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
