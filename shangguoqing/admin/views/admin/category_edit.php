<div class="pageContent">
		<form method="post" action="<?php echo site_url($this->uri->segment(1)."/update")?>" class="pageForm required-validate" onsubmit="return validateCallback(this,navTabAjaxDone)">
			
			<div class="pageFormContent" layoutH="56">
			<p>
				<label>上级分类：</label>
				<?php echo form_dropdown('parent_id',$cat_list, $info['parent_id'],'class="combox"')?>
			</p>
			<p>
				<label>名称：</label>
				<input name="cat_name" class="required" type="text" size="30" value="<?php echo $info['cat_name']?>" alt="请输入分类名称"/>
			</p><input type="hidden" name="id" value="<?php echo $info['id']?>" />
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
					<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
				</ul>
			</div>
		</form>
</div>
