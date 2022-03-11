<?php
	$db = & get_instance();
	$userdetails = $db->userdetails();
	$store_setting = $db->Product_model->getSettings('store');
?>
<div class="row">
	<div class="col-lg-12 col-md-12">
		<?php if($this->session->flashdata('success')){?>
			<div  class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('success'); ?> </div>
		<?php } ?>
		<?php if($this->session->flashdata('error')){?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('error'); ?> </div>
		<?php } ?>
	</div>
</div>

<form id="setting-form">
	<div class="row">
		<div class="col-sm-12">
		    <div class="card">
		    	<div class="card-header">
		    		<h4 class="card-title"><?= __('admin.payment_gateway') ?> (<?= $payment_gateway['title'] ?>)</h4>
		    	</div>
		    	<div class="card-body">
		    		<?php if($payment_gateway['code'] == 'paystack'){ ?>
		    				<div class="alert alert-info text-center">
		    					<p><?= __('admin.paystack_accept_only_currency'); ?></p>
		    				</div>
		    		<?php } ?>
		    		<?php if($payment_gateway['code'] == 'xendit'){ ?>
		    				<div class="alert alert-info text-center">
		    					<p><?= __('admin.xendit_accept_only_currency'); ?></p>
		    				</div>
		    		<?php } ?>
		    		<?php if($payment_gateway['code'] == 'yookassa'){ ?>
		    				<div class="alert alert-info text-center">
		    					<p><?= __('admin.yookassa_accept_only_currency'); ?></p>
		    				</div>
		    		<?php } ?>
		    		<?= $payment_gateway['setting'] ?>
		    	</div>
		    	<div class="card-footer">
		    		<button type="submit" class="btn btn-submit btn-primary"><?= __('admin.save_settings') ?></button>
		    	</div>
			</div>
	    </div>
	</div>
</form>

<script type="text/javascript">
	$("#setting-form").on('submit',function(){
		let isDirtyForm = false;

		$( ".form-control.required" ).each(function() {
			if($(this).val() == "" || $(this).val() == null){
			  	$(this).parent().addClass('has-error');
			  	$(this).after('<span class="text-danger">'+'<?= __('admin.this_field_is_required') ?>'+'</span>');
			  	isDirtyForm = true;
			}
		});

		if(!isDirtyForm){
			$this = $(this);
			$.ajax({
				type:'POST',
				dataType:'json',
				data:$this.serialize(),
				beforeSend:function(){ $this.find('.btn-submit').btn("loading"); },
				complete:function(){ $this.find('.btn-submit').btn("reset"); },
				success:function(json){
					if(json['redirect'])
						window.location.href = json['redirect'];
				},
			});
		}

		return false;
	})
</script>
