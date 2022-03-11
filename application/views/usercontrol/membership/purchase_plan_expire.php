<div class="row">
	<div class="col-sm-3"></div>
	<div class="col-sm-6">
		<?php if($plan && $plan->status != 1){ ?>
            <div class="alert bg-info text-white border-radius-0 alert-info"><?= __('user.your_plan_status_is') ?> <b><?= strip_tags($plan->status_text) ?></b>. <?= __('user.please_wait_while_your_plan_status_change') ?></div>
        <?php } else if($plan && $plan->remainDay() !== 'lifetime' && $plan->remainDay() <= 0){ ?>
            <div class="alert bg-danger text-white border-radius-0 alert-danger"><?= __('user.your_plan_expire') ?> <a class="text-white font-weight-bold" href="<?= base_url('/usercontrol/purchase_plan/') ?>"><?= __('user.click_here') ?></a> <?= __('user.to_renew_plan') ?>
        </div>
        <?php } ?>

		<div class="new-card pb-3 shadow-sm">
            <div class="card-header">
                <h5 class="card-title"><?= __('user.membership_plan') ?></small></h5>
            </div>
            <?php if (isset($is_lifetime_plan) && $is_lifetime_plan) { ?>
                <div class="card-body">
                    <h4 class="text-center text-success"><?= __('user.lifetime_free_membership') ?></h4>
                    <p class="text-center text-muted"><?= __('user.you_have_a_lifetime') ?></p>
                </div>
            <?php } ?>
            <?php if (isset($plan) && $plan) { ?>
                <?php 
                    $checkDay = max((int)$MembershipSetting['notificationbefore'],1);
                ?>
                
                <div class="card-body">
                    <h4 class="text-success"><span class="text-muted">Plan: </span><?= $plan->plan ? $plan->plan->name : '' ?></h4>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <span><?= __('user.plan_date') ?></span>
                        <span class="text-right pull-right text-primary">
                            <?= dateFormat($plan->started_at,'d F Y') . " to ". $plan->expire_text ?>
                        </span>  
                    </li>
                    <li class="list-group-item p-0 px-3">
                        <span class="d-inline-block my-3">&nbsp;<?= __('user.remain_days') ?></span>
                        <span class=" pull-right text-primary text-right">
                            <?php
                                $remain = $plan->remainDay();
                                if($remain === 'lifetime'){
                                    echo '<span class="font-32">&infin;</span>';
                                } else {
                                    echo "<span class='my-3 d-block'>". $remain ." Days</span>";
                                }
                            ?>
                        </span>  
                    </li>
                    <li class="list-group-item">
                        <span><?= __('user.plan_status') ?></span>
                        <span class="text-right pull-right text-primary">
                            <?= $plan->status_text ?>
                        </span>  
                    </li>
                    <li class="list-group-item">
                        <span><?= __('user.active') ?></span>
                        <span class="text-right pull-right text-primary">
                            <?= $plan->active_text ?>
                        </span>  
                    </li>
                </ul>
                <div class="card-body">
                    <?= $plan->plan ? $plan->plan->description : '' ?>
                </div>
            <?php } ?>
        </div>
        <div class="text-center">
			<a class="btn btn-outline-secondary" href="<?= base_url('usercontrol/purchase_plan') ?>"><?= __('user.buy_new_plan') ?></a>
        </div>
	</div>
</div>