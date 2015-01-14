<?php $this->load->view("page_header");?>
<div class="content-wrapper">
<div class="bd">
	<div class="content fl-clr">
		<?php $this->load->view("page_left");?>
			<div class="con-rig" id="rigCon"  >
		<div class="company-intro item" id="enterprise_intro">
		    <div class="h2-bg section"><span class="sh1">联系方式</span><a href="#" rel="nofollow" class="more" data-scode="30102">更多<span class="gt">&gt;</span></a></div>
		    <div class="rig-bd fl-clr">
		      <table class="tab-item" align="center" cellpadding="0" cellspacing="0" width="656">
				<tbody><tr>
									<th width="119">公司名称</th>
									<td width=""><?php echo config_data('gs_name')?></td>
								</tr>
								<tr>
									<th>联系人</th>
									<td><?php echo config_data('lx_lxr')?></td>
								</tr>
                                <tr><th>电话</th><td><?php echo config_data('lx_tel')?></td></tr><tr><th>传真</th><td><?php echo config_data('lx_fax')?></td></tr><tr><th>手机</th><td><?php echo config_data('lx_mobile')?></td></tr>                                <tr>
									<th>地址</th>
									<td><?php echo config_data('lx_address')?></td>
								</tr>
                                <tr><th>邮编</th><td>201807</td></tr>							</tbody></table>
		    </div>
		</div> <!-- company-intro end -->										 
		<div class="new-supply item" id="new_sup">
		    <div class="h2-bg section"><h2>最新供应</h2></div>
		    <div class="rig-bd fl-clr">
	           <ul class="pro-sup fl-clr">
	             <li>
		                <dl class="wrap-product">
		                    <dt class="vertical-img">
		                        <a href="#" title="供应快速接头、沟槽管件" rel="nofollow" data-scode="30103">
		                            <img src="http://my.cn.china.cn/image/no_pic.gif" alt="供应快速接头、沟槽管件" width="100">
		                        </a>
		                    </dt>
		                    <dd class="desc">
		                        <a href="#" title="供应快速接头、沟槽管件" data-scode="30103">供应快速接头、沟槽管件 </a>
		                    </dd>
		                </dl>
	            </li>
               </ul>
		    </div>
		</div>		
		</div> <!-- cont-right end -->
	</div> <!-- content end -->
</div>
</div>
<?php $this->load->view("page_footer");?>
