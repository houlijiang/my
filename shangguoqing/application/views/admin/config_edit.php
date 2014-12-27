<div class="pageContent">
				<form method="post" action="/admin/config/update" class="pageForm required-validate" onsubmit="return validateCallback(this,navTabAjaxDone)">
					<div class="pageFormContent" layoutH="56">
					<input name="config_key" value="<?php echo !empty($info['config_key'])?$info['config_key']:""?>" />
					<input name="key_name" value="<?php echo !empty($info['key_name'])?$info['key_name']:""?>" />
						<div class="unit">
							<textarea class="editor" name="config_value" rows="8" cols="100"
								upLinkUrl="upload.php" upLinkExt="zip,rar,txt" 
								upImgUrl="upload.php" upImgExt="jpg,jpeg,gif,png" 
								upFlashUrl="upload.php" upFlashExt="swf"
								upMediaUrl="upload.php" upMediaExt:"avi"><?php echo $info['config_value']?></textarea>
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
