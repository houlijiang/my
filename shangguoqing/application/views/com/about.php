<?php $this->load->view("page_header");?>
<div class="content-wrapper">
<div class="bd">
	<div class="content fl-clr">
		<?php $this->load->view("page_left");?>
		<div class="con-rig" id="rigCon"  >
		<div class="company-intro item" id="enterprise_intro">
		    <div class="h2-bg section"><span class="sh1">公司简介</span><a href="#" rel="nofollow" class="more" data-scode="30102">更多<span class="gt">&gt;</span></a></div>
		    <div class="rig-bd fl-clr">
		       <div class="company-info"><p><?php echo config_data('gs_jj')?></p></div>
		    </div>
		</div> <!-- company-intro end -->										 
		</div> <!-- cont-right end -->
	</div> <!-- content end -->
</div>
</div>
<?php $this->load->view("page_footer");?>
