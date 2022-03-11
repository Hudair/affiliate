<?php	
    $db =& get_instance();
    $userdetails=$db->Product_model->userdetails('user',1);
    $store_setting =$db->Product_model->getSettings('store');
    $SiteSetting =$db->Product_model->getSettings('site');
    $refer_status =$db->Product_model->my_refer_status($userdetails['id']);
    $db->Product_model->ping($userdetails['id']);
    $vendor_setting = $db->Product_model->getSettings('vendor');
    $market_vendor = $db->Product_model->getSettings('market_vendor');
    $membership = $db->Product_model->getSettings('membership');
?>
<div class="left-menu">
    <div class="collapse d-block">
      	<ul class="navbar-nav scroll-wrap">

      		<li class="nav-item dropdown l-m-i-1">
        		<a class="nav-link d-flex" href="<?= base_url('usercontrol/dashboard'); ?>">
          			<div><?= __('user.page_title_dashboard') ?></div>
          		</a>
          	</li>

          	 	<li class="nav-item dropdown l-m-i-6">
		         <a class="nav-link d-flex" href="<?= base_url('usercontrol/store_markettools'); ?>">
		         	<?= __('user.page_title_my_links') ?></a>
		        </li>

            
                <li class="nav-item dropdown l-m-i-6">
		         <a class="nav-link d-flex" href="<?= base_url('usercontrol/mywallet'); ?>">
		         	<?= __('user.page_title_my_wallet') ?></a>
		        </li>

          		<li class="nav-item dropdown l-m-i-6">
		         <a class="nav-link d-flex" href="<?= base_url('usercontrol/all_transaction'); ?>">
		         	<?= __('user.page_title_all_trans_user') ?></a>
		        </li>


			    <!--Affiliate Panel Start-->
	          		<li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          			<div><?= __('user.page_title_my_activity') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>

	          		<div class="dropdown-menu">
	          		    <a class="dropdown-item" href="<?= base_url('usercontrol/wallet_requests_list'); ?>"><?= __('user.usercontrol_wallet_requests_list') ?></a>
	          		    <?php if($refer_status) { ?>
	    				<a class="dropdown-item" href="<?= base_url('usercontrol/my_network'); ?>"><?= __('user.page_title_my_network') ?></a>
	    				<?php } ?>
	          			<a class="dropdown-item" href="<?= base_url('usercontrol/store_orders');?>"><?= __('user.page_title_my_orders') ?></a>
	          			<a class="dropdown-item" href="<?= base_url('ReportController/user_reports');?>"><?= __('user.page_title_user_reports') ?></a>
	          			<a class="dropdown-item" href="<?= base_url('usercontrol/store_logs');?>"><?= __('user.page_title_my_logs') ?></a>
	          		</div>
	        	</li>
	        	<!--Affiliate Panel End-->

	        <?php if(($membership['status'] == 1) || (($membership['status'] == 2) && ($userdetails['is_vendor'] == 1)) || (($membership['status'] == 3) && ($userdetails['is_vendor'] == 0))){ ?>
		        	<li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          			<div><?= __('user.page_title_membership') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>
		          		<div class="dropdown-menu">
		          			<a class="dropdown-item" href="<?= base_url('usercontrol/purchase_plan');?>">
		          				<?= __('user.page_title_buy_membership') ?>
		          				</a>
		          			<a class="dropdown-item" href="<?= base_url('usercontrol/purchase_history');?>">
		          				<?= __('user.page_title_purchase_history') ?>
		          			</a>
		          		</div>
        			</li>
		    <?php } ?>


		    <!--Vendor Panel Start-->
	        <?php if((isset($userdetails['is_vendor']) && $userdetails['is_vendor']) && ((int)$market_vendor['marketvendorstatus'] == 1 || ((int)$vendor_setting['storestatus'] == 1 && (int)$store_setting['status'] == 1))) { ?>
			        <li class="nav-item dropdown l-m-i-6">
		        		<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          			<div><?= __('user.page_title_vendor_menu') ?></div>
		          			<div><i class="lni lni-chevron-right"></i></div>
		          		</a>

			        <div class="dropdown-menu"> 
			        	<a class="dropdown-item" href="<?php echo base_url('usercontrol/my_vendor_panel/');?>">
			        	    <?= __('user.page_title_vendor_home') ?>
			            </a>

			            <!-------vendor marketing menu------->
			            <?php if((isset($userdetails['is_vendor']) && $userdetails['is_vendor']) && (int)$market_vendor['marketvendorstatus'] == 1){ ?>
				            <a class="dropdown-item" href="<?php echo base_url('usercontrol/programs/');?>">
		          				<?= __('user.ven_programs') ?>
		          			</a>
							<a class="dropdown-item" href="<?php echo base_url('usercontrol/integration_tools/');?>">
							    <?= __('user.page_title_campaigns') ?>
							</a>
				            <a class="dropdown-item" href="<?php echo base_url('usercontrol/integration/');?>">
						        <?= __('user.page_title_plugins') ?>
						    </a>
		                    <a class="dropdown-item" href="<?php echo base_url('usercontrol/my_deposits/');?>">
			        		    <?= __('user.page_title_my_deposits') ?>
				            </a>
			            <?php } ?>
			            <!-------vendor marketing menu------->

	
                        
                        <!-------vendor store menu------->
            	        <?php if((isset($userdetails['is_vendor']) && $userdetails['is_vendor']) && (int)$vendor_setting['storestatus'] == 1 && (int)$store_setting['status'] == 1){ ?>
	    		        	<a class="dropdown-item" href="<?php echo base_url('usercontrol/store_dashboard/');?>">
	    		        	    <?= __('user.page_title_vendor_store') ?>
	    		        	</a>
            	        <?php } ?>
	                    <!-------vendor store menu------->

	                    <!-------vendor setting menu------->
	                    <?php if((isset($userdetails['is_vendor']) && $userdetails['is_vendor']) && (int)$market_vendor['marketvendorstatus'] == 1){ ?>
	                    	<a class="dropdown-item" href="<?php echo base_url('usercontrol/mlm_levels/');?>">
			        		    <?= __('user.page_title_vendor_setting') ?>
				            </a>
	                    <?php } ?>
	                    <!-------vendor setting menu------->
			        </div>
			      </li>
			 <?php } ?>
			 <!--Vendor Panel End-->


	        <li class="nav-item dropdown l-m-i-7">
        		<a class="nav-link d-flex" href="<?= base_url('usercontrol/contact-us'); ?>">
        			<?= __('user.page_title_contact_admin') ?>
          		</a>
          	</li>

      	</ul>
    </div>
</div>