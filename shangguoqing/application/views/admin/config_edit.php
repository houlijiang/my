<h2 class="contentTitle">编辑器</h2>
<div style="display:block; overflow:hidden; padding:0 10px; line-height:21px;">
	
	<div class="tabs">
		<div class="tabsHeader">
			<div class="tabsHeaderContent">
				<ul>
					<li class="selected"><a href="javascript:;"><span>示例</span></a></li>
					<li><a href="javascript:;"><span>代码</span></a></li>
				</ul>
			</div>
		</div>
		<div class="tabsContent" layoutH="100">
			<div>
				<form method="post" action="/admin/config/update" class="pageForm required-validate" onsubmit="return iframeCallback(this)">
					<div class="pageFormContent" layoutH="158">
					<input name="key" value="<?php echo !empty($info['key'])?$info['key']:""?>" />
					<input name="key_name" value="<?php echo !empty($info['key_name'])?$info['key_name']:""?>" />
						<div class="unit">
							<textarea class="editor" name="value" rows="8" cols="100"
								upLinkUrl="upload.php" upLinkExt="zip,rar,txt" 
								upImgUrl="upload.php" upImgExt="jpg,jpeg,gif,png" 
								upFlashUrl="upload.php" upFlashExt="swf"
								upMediaUrl="upload.php" upMediaExt:"avi"><?php echo $info['value']?></textarea>
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
			
			<div>
<textarea rows="15" cols="90" name="value">
<?php echo $info['value']?>
</textarea>
			</div>
			
		</div>
		<div class="tabsFooter">
			<div class="tabsFooterContent"></div>
		</div>
	</div>

</div>