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

<div class="plugin-uploader">
	<p class="text-center text-help"><?= __('admin.if_have_plugin_in_zip_format_you_masy_insttall') ?> <br> <?= __('admin.if_want_to_creat_custom_payment_gateway') ?> <a href="<?= base_url('admincontrol/withdrawal_payment_gateways_doc') ?>"><?= __('admin.documentation') ?></a></p>

	<div class="contain">
		<div class="div-input">
			<input type="file" id="plugin-file" name="plugin">
			<div class="bg-danger px-2 py-1 text-left text-light warning d-none"></div>
		</div>
		<div class="div-button">
			<button class="btn btn-primary btn-sm" id="plugin-file-button" disabled=""><?= __('admin.install_now') ?></button>
		</div>
	</div>
	
</div>

<div class="card">
	<div class="card-header">
		<h6 class="card-title m-0 pull-left"><?= __('admin.payments') ?></h6>
		<div class="pull-right">
			<button id="toggle-uploader" class="btn btn-outline-primary btn-sm"><?= __('admin.install_payment_gateway') ?></button>
		</div>
	</div>
	<div class="card-body p-0">
		<div class="table-responsive">
			<table class="table-striped table">
				<thead>
					<tr>
						<th><?= __('admin.payment_method') ?></th>
						<th width="150px"></th>
						<th width="100px"><?= __('admin.status') ?></th>
						<th width="260px" class="text-right"><?= __('admin.action') ?></th>
					</tr>
				</thead>
				<tbody>
					<?php if(count($payment_methods) == 0){ ?>
						<tr>
							<td class="text-center" colspan="100%"><?= __('admin.no_payment_methods_available') ?></td>
						</tr>
					<?php } ?>
					<?php foreach ($payment_methods as $key => $payment) { ?>
						<tr>
							<td><?= __('admin.'.$payment['code']) ?></td>
							<td><img style="width: 70px;" src="<?= base_url($payment['icon']) ?>"></td>
							<td><?= $payment['status'] == '1' ?  __('admin.enabled') :  __('admin.disabled') ?></td>
							<td class="text-right withdrawal_payment_gateways_min_width">
								<?php if($payment['is_install'] == '1'){ ?>
									<a href="<?= base_url('admincontrol/withdrawal_payment_gateways_edit/'. $payment['code']) ?>" class="btn btn-sm btn-info"><?= __('admin.edit') ?></a>
								<?php } ?>
								<a onclick="return confirm('<?= __('admin.are_you_sure') ?>')" href="<?= base_url('admincontrol/withdrawal_payment_gateways_status_change/'. $payment['code']) ?>" class="btn btn-sm btn-<?= $payment['is_install'] == "1" ? "danger" : "success" ?>"><?= $payment['is_install'] == "1" ? __('admin.un_install') : __('admin.install') ?></a>

								<a onclick="return confirm('<?= __('admin.are_you_sure') ?>')" href="<?= base_url('payment/delete_plugin/'.$payment['code']) ?>" class="btn btn-sm btn-danger"><?= __('admin.delete') ?></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	$("#toggle-uploader").on("click",function(){
		$(".plugin-uploader").slideToggle();
	})

	$("#plugin-file").on("change",function(){
		if($(this).val() == ''){
			$("#plugin-file-button").prop("disabled",1)
		} else{
			$("#plugin-file-button").prop("disabled",0)
		}
	})

	$("#plugin-file-button").on("click", function(evt){
		evt.preventDefault();
        $btn = $(this);

        $(".plugin-uploader .warning").addClass('d-none');

        var formData = new FormData();
        formData.append("plugin", $("#plugin-file")[0].files[0]);
       	$btn.btn("loading");
        
        $.ajax({
            url:'<?= base_url('payment/installPayementGateway') ?>',
            type:'POST',
            dataType:'json',
            cache:false,
            contentType: false,
            processData: false,
            data:formData,
            error:function(){ $btn.btn("reset"); },
            success:function(result){            	
            	$btn.btn("reset");
                
                if(result['location']){
                    window.location.reload();
                }
                if(result['warning']){
                    $(".plugin-uploader .warning").html(result['warning']);
                    $(".plugin-uploader .warning").removeClass('d-none');
                }
            },
        });
	})
</script>