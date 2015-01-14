<div class="pageContent">
				<form method="post" action="<?php echo site_url($this->uri->segment(1)."/update")?>" class="pageForm required-validate" onsubmit="return validateCallback(this,navTabAjaxDone)">
					<div class="pageFormContent" layoutH="56">
					<p>
					<label>键名：</label><input type="text" name="config_key" value="<?php echo !empty($info['config_key'])?$info['config_key']:""?>" />
					</p>
					<p>
					<label>说明：</label><input type="text" name="key_name" value="<?php echo !empty($info['key_name'])?$info['key_name']:""?>" />
					</p>
					<div class="divider"></div>
				<dl>
					<dt>内容：</dt>
					<dd>
						<textarea class="editor" name="config_value" rows="6" cols="100"><?php echo $info['config_value']?></textarea>
					</dd>
				</dl>
					<input type="hidden" name="id" value="<?php echo $info['id']?>">
				</div>
					<div class="formBar">
						<ul>
							<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
							<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
						</ul>
					</div>
				</form>
</div>
