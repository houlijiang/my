<div class="pageContent">
				<form method="post" action="/admin/user/update" class="pageForm required-validate" onsubmit="return validateCallback(this,navTabAjaxDone)">
					<div class="pageFormContent" layoutH="56">
					<p>
					<label>用户名称：</label><input type="text" class="textInput disabled" disabled="true" name="user_name" value="<?php echo $this->session->userdata('user_name')?>" />
					</p>
					<p>
					<label>邮箱：</label><input class="required email" type="text" name="email" value="<?php echo !empty($info['email'])?$info['email']:""?>" />
					</p>
					<div class="divider"></div>
					<input type="hidden" name="id" value="<?php echo $this->session->userdata('user_id')?>">
				</div>
					<div class="formBar">
						<ul>
							<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
							<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
						</ul>
					</div>
				</form>
</div>