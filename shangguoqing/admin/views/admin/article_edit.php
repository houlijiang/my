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
				<label>文章类型：</label>
				<?php echo form_dropdown('cat_id',$cat_list, $info['cat_id'],'class="combox"')?>
			</p>
			<p>
				<label>文章标题：</label>
				<input name="title" class="required" type="text" size="30" value="<?php echo $info['title']?>" alt="请输入商品名称"/>
			</p>
			<p>
				<label>文章导读：</label>
				<input name="short_title"  type="text" size="30" value="<?php echo $info['short_title']?>" alt="请输入商品短标题"/>
			</p>
			<p>
				<label>状态：</label>
				<?php echo form_dropdown('state',$this->article_model->state, $info['state'],'class="combox"')?>
			</p>
			<p style="height:auto;clear:both;">
				<label>缩略图：</label>
				<input id="article_thumb" type="file" name="article_thumb" value="<?php echo $info['article_thumb']?>"/>
			</p>
			<div class="divider"></div>
				<dl>
				<dt>文章内容：</dt>
				<dd>
					<textarea class="editor" name="content" rows="6" cols="100"><?php echo $info['content']?></textarea>
					<input type="hidden" name="id" value="<?php echo $info['id']?>">
					</dd>
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
	$("#article_thumb").upload({img:"<?php echo $info['article_thumb']?>"});
});

</script>