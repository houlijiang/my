<div class="pageContent">
		<form method="post" action="/admin/goods/update" class="pageForm required-validate" onsubmit="return validateCallback(this,navTabAjaxDone)">
			
			<div class="pageFormContent" layoutH="56">
			<p>
				<label>商品名称：</label>
				<input name="goods_name" class="required" type="text" size="30" value="<?php echo $info['goods_name']?>" alt="请输入商品名称"/>
			</p>
			<p>
				<label>商品短标题：</label>
				<input name="sub_title" class="required" type="text" size="30" value="<?php echo $info['sub_title']?>" alt="请输入商品短标题"/>
			</p>
			<p>
				<label>商品分类：</label>
				<?php echo form_dropdown('cat_id',$cat_list, $info['cat_id'],'class="combox"')?>
			</p>
			<p>
				<label>市场价：</label>
				<input name="market_price" class="number" type="text" size="30" alt="请输入数字" value="<?php echo $info['market_price']?>"/>
			</p>
			<p>
				<label>当前价：</label>
				<input name="goods_price" class="number" type="text" size="30" alt="请输入数字" value="<?php echo $info['goods_price']?>"/>
			</p>
				<div class="unit">
					<textarea class="editor" name="description" rows="6" cols="100"><?php echo $info['goods_desc']?></textarea>
					<input type="hidden" name="id" value="<?php echo $info['id']?>">
				</div>
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
					<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
				</ul>
			</div>
		</form>
</div>
