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
				<label>商品分类：</label>
				<?php echo form_dropdown('cat_id',$cat_list, $info['cat_id'],'class="combox"')?>
			</p>
			<p>
				<label>商品名称：</label>
				<input name="goods_name" class="required" type="text" size="30" value="<?php echo $info['goods_name']?>" alt="请输入商品名称"/>
			</p>
			<p>
				<label>商品短标题：</label>
				<input name="sub_title"  type="text" size="30" value="<?php echo $info['sub_title']?>" alt="请输入商品短标题"/>
			</p>
			<p>
				<label>商品状态：</label>
				<?php echo form_dropdown('state',array('下架','上架'), $info['state'],'class="combox"')?>
			</p>
			<p>
				<label>市场价格：</label>
				<input name="market_price" class="number" type="text" size="30" alt="请输入数字" value="<?php echo $info['market_price']?>"/>
			</p>
			<p>
				<label>商品售价：</label>
				<input name="goods_price" class="number" type="text" size="30" alt="请输入数字" value="<?php echo $info['goods_price']?>"/>
			</p>
			<p>
				<label>商品销量：</label>
				<input name="goods_price" class="number" type="text" size="30" alt="请输入数字" value="<?php echo $info['sale_number']?>"/>
			</p>
			<p>
				<label>商品链接：</label>
				<input name="url" class="url" type="text" size="30" alt="网址" value="<?php echo $info['url']?>"/>
			</p>
			<p style="height:auto;clear:both;">
				<label>缩略图：</label>
				<input id="goods_thmub" type="file" name="goods_thumb" value="<?php echo $info['goods_thumb']?>"/>
			</p>
			<p style="height:auto;">
				<label>大图：</label>
				<input id="goods_image" type="file" name="goods_image" value="<?php echo $info['goods_image']?>" />
			</p>
			<div class="divider"></div>
				<dl>
				<dt>描述：</dt>
				<dd><textarea class="editor" name="goods_desc" rows="6" cols="100"><?php echo $info['goods_desc']?></textarea>
				</dd>
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
	$("#goods_thmub").upload({img:"<?php echo $info['goods_thumb']?>"});
	$("#goods_image").upload({img:"<?php echo $info['goods_image']?>"});
});

</script>