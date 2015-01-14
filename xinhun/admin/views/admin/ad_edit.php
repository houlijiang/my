<style type="text/css">
.fileInput input{
    font-size:30px;
    cursor:pointer;
    filter:alpha(opacity=0);
    opacity:0;
    position:absolute;
    width:100%;
    height:100%;
    z-index:100;
}
.fileInput{
	border:1px solid #ccc;
	overflow:hidden;
	position: relative;
	max-height:100px;
	max-width:100px;
}
.fileInput img{
	position:relative;
	z-index:1;
	max-width:100%;
}
</style>
<div class="pageContent">
		<form method="post" action="<?php echo site_url($this->uri->segment(1)."/update")?>" class="pageForm required-validate" onsubmit="return validateCallback(this,navTabAjaxDone)">
			
			<div class="pageFormContent" layoutH="56">
			<p>
				<label>广告类型：</label>
				<?php echo form_dropdown('position_id',$this->ad_model->position_list(), $info['position_id'],'class="combox"')?>
			</p>
			<p>
				<label>广告名称：</label>
				<input name="ad_name" class="required" type="text" size="30" value="<?php echo $info['ad_name']?>" alt="请输入广告名称"/>
			</p>
			<p>
				<label>广告链接：</label>
				<input name="ad_link"  type="text" class='url' size="30" value="<?php echo $info['ad_link']?>" alt="请输入url地址"/>
			</p>
			<p>
				<label>状态：</label>
				<?php echo form_dropdown('state',$this->ad_model->state, $info['state'],'class="combox"')?>
			</p>
			<p>
				<label>开始时间：</label>
				<input name="start_time" type="text" class="date" readonly="true" datefmt="yyyy-MM-dd HH:mm:ss" value="<?php echo $info['start_time']?>" /> 
			</p>
			<p>
				<label>结束时间：</label>
				<input name="end_time" type="text" class="date" readonly="true" datefmt="yyyy-MM-dd HH:mm:ss" value="<?php echo $info['end_time']?>"/>
			</p>
			<p style="height:auto;clear:both;">
				<label>缩略图：</label>
				<input id="ad_image" type="file" name="ad_image" value="<?php echo $info['ad_image']?>"/>
			</p>
			<div class="divider"></div>
			<dl>
			<dt>代码：</dt>
			<dd><textarea class="editor" name="ad_code" rows="6" cols="100"><?php echo $info['ad_code']?></textarea></dd>
					<input type="hidden" name="id" value="<?php echo $info['id']?>">
			</dl>
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
					<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
				</ul>
			</div>
		</form>
</div>
<script>
$(function(){
	$("#ad_image").upload({img:"<?php echo $info['ad_image']?>"});
});

</script>