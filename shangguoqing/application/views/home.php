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
