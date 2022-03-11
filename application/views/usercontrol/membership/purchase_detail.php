<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title m-0"><?= __('user.purchase_details') ?></h5>
			</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><b><?= __('user.id') ?>:</b> <?= $plan->id ?></li>
				<li class="list-group-item"><b><?= __('user.plan_name') ?>:</b> <?= ($plan->plan ? $plan->plan->name : '') ?></li>
				<li class="list-group-item"><b><?= __('user.price') ?>:</b> <?= c_format(($plan->plan ? ($plan->plan->special ? $plan->plan->special : $plan->plan->price) : 0)) ?></li>
				<?php 
					$bonus = $plan->bonusData();
					if($bonus){
				?>
				<li class="list-group-item"><b><?= __('user.bonus') ?>:</b> <?= c_format($bonus->amount) ?></li>
				<?php } else { ?>
				<li class="list-group-item"><b><?= __('user.bonus') ?>:</b> <?= __('user.no_bonus') ?></li>
				<?php } ?>
				<li class="list-group-item"><b><?= __('user.type') ?>:</b> <?= ($plan->plan ? $plan->plan->type : '') ?></li>
				<li class="list-group-item"><b><?= __('user.is_active') ?>:</b> <?= $plan->active_text ?></li>
				<li class="list-group-item"><b><?= __('user.plan_status') ?>:</b> <?= $plan->status_text ?></li>
				<li class="list-group-item"><b><?= __('user.payment_method') ?>:</b> <?= $plan->payment_method ?></li>
				<?php if($plan->status_id == 1) { ?>

				<?php if(!$plan->is_lifetime) { ?>

				<li class="list-group-item"><b><?= __('user.remaining_time') ?>:</b> <span data-time-remains="<?= $plan->strToTimeRemains(); ?>"><?= $plan->remainDay() ?></span></li>

				<?php } ?>

				<li class="list-group-item"><b><?= __('user.started_on') ?>:</b> <?= dateFormat($plan->started_at,'d F Y, h:i A'); ?></li>

				<?php if(!$plan->is_lifetime) { ?>

				<li class="list-group-item"><b><?= __('user.ending_on') ?>:</b> <?= dateFormat($plan->expire_at,'d F Y, h:i A'); ?></li>

				<?php } ?>

				<?php } ?>



				<?php if(!empty($plan->payment_details) && $plan->payment_details != "[]") {
					$payment_details = json_decode($plan->payment_details);
						foreach($payment_details as $key => $value) {
							if($key == 'payment_proof') {
								?>
								<li class="list-group-item"><b><?= __('user.payment_proof') ?>:</b> 
									<a target="_blank" href="<?php echo base_url('assets/user_upload/'.$value) ?>"><?php echo $value; ?></a>
								</li>
								<?php
							}
						}
					
				}?>

				<li class="list-group-item"><b><?= __('user.created_at') ?>:</b> <?= dateFormat($plan->created_at, 'd F Y, h:i A') ?></li>

			</ul>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title m-0"><?= __('user.plan_details') ?></h5>
			</div>
    		<ul class="list-group list-group-flush">
                <li class="list-group-item"><b><?= __('user.name') ?>:</b> <?= $plan->plan->name ?></li>
                <li class="list-group-item"><b><?= __('user.type') ?>:</b> <?= $plan->plan->type ?></li>
                <li class="list-group-item"><b><?= __('user.price') ?>:</b> <?= ($plan->plan->special ? $plan->plan->special : $plan->plan->price) ?></li>
                <?php if($plan->commission_sale_status): ?>
                	<li class="list-group-item"><b><?= __('user.level') ?>:</b> <?= ($plan->level_number) ? $plan->level_number : __('user.default') ?></li>
                <?php endif ?>
                <li class="list-group-item"><b><?= __('user.user_type') ?>:</b> <?= ($plan->plan->user_type == 2) ? __('user.vendor') : __('user.affiliate') ?></li>
                <?php if($plan->plan->user_type == 2): ?>
                	<li class="list-group-item"><b><?= __('user.campaign') ?>:</b> <?= isset($plan->plan->campaign) ? $plan->plan->campaign : __('user.unlimited') ?></li>
                	<li class="list-group-item"><b><?= __('user.product') ?>:</b> <?= isset($plan->plan->product) ? $plan->plan->product : __('user.unlimited') ?></li>
                <?php endif ?>
                <li class="list-group-item"><b><?= __('user.description') ?>:</b></li>
            </ul>
            <div class="px-3 mt-2">
            	<?= $plan->plan->description ?>
            </div>
		</div>

		<div class="card mt-3">
			<div class="card-header">
				<h5 class="card-title m-0"><?= __('user.status_history') ?></h5>
			</div>
    		<div class="card-body m-0 p-0">
    			<div class="table-responsive">
    				<table class="table table-striped">
	    				<thead>
	    					<tr>
	    						<td width="100px">Status</td>
	    						<td>Note</td>
	    					</tr>
	    				</thead>
	    				<tbody>
	    					<?php foreach ($history as $key => $value) { ?>
	    						<tr>
	    							<td><?= $value->status_text ?></td>
	    							<td><?= $value->comment ?></td>
	    						</tr>
	    					<?php } ?>
	    				</tbody>
	    			</table>
    			</div>
    		</div>
		</div>
	</div>
	<?php if($this->session->flashdata('success')){?>
		<div class="col-sm-12 m-t-10 text-center">
			<div class="alert alert-success"> <?php echo $this->session->flashdata('success'); ?> </div>
		</div>
	<?php } ?>
	<?php if($this->session->flashdata('error')){?>
		<div class="col-sm-12 m-t-10 text-center">
			<div class="alert alert-danger"> <?php echo $this->session->flashdata('error'); ?> </div>
		</div>
	<?php } ?>
</div>

<script type="text/javascript">
    $(function() {
        start_plan_expiration_timer();
    });
</script>