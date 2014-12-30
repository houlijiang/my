<?php $this->load->view("page_header");?>
<div class="content-wrapper">
<div class="bd">
	<div class="content fl-clr">
		<?php $this->load->view("page_left");?>
		<div class="con-rig" id="rigCon"  >
		<div class="new-supply item" id="new_sup">
		    <div class="h2-bg section"><h2> <?php if($this->uri->segment(2)=='view'):?>产品详情<?php else:?>最新供应<?php endif;?></h2></div>
		    <div class="rig-bd fl-clr">
		    <?php if($this->uri->segment(2)=='view'):?>
		    <?php echo $goods_desc?>
		    <?php else:?>
	           <ul class="pro-sup fl-clr">
	           <?php foreach($list as $v):?>
	             <li>
		                <dl class="wrap-product">
		                    <dt class="vertical-img">
		                        <a href="/goods/view/<?php echo $v['id']?>" title="<?php echo $v['goods_name']?>" rel="nofollow">
		                            <img src="<?php echo img_url($v['goods_thumb'])?>" alt="<?php echo $v['goods_name']?>" width="100">
		                        </a>
		                    </dt>
		                    <dd class="desc">
		                        <a href="/goods/view/<?php echo $v['id']?>" title="<?php echo $v['goods_name']?>"><?php echo $v['goods_name']?> </a>
		                    </dd>
		                </dl>
	            </li>
	            <?php endforeach;?>
               </ul>
               <?php endif;?>
		    </div>
		</div>		
		</div> <!-- cont-right end -->
	</div> <!-- content end -->
</div>
</div>
<?php $this->load->view("page_footer");?>
