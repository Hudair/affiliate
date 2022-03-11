<section class="profile-page">
	<div class="container">
		<div class="profile-page-wrapper">
			<div class="profile-sidebar">
				<h3><?= __('store.user_menu') ?></h3>
				<ul>
					<li><a href="<?= $base_url ?>profile"><?= __('store.profile') ?></a></li>
					<li><a class="active" href="<?= $base_url ?>order"><?= __('store.order') ?></a></li>
					<li><a href="<?= $base_url ?>shipping"><?= __('store.shipping') ?></a></li>
					<li><a href="<?= $base_url ?>wishlist"><?= __('store.wishlist') ?></a></li>
					<li><a href="<?= $base_url ?>logout"><?= __('store.logout') ?></a></li>
				</ul>
			</div>

			<div class="profile-main">
				<h2><?= __('store.orders') ?></h2>
				<div class="my-orders">
					<div class="cart-wrapper">
						<ul class="cart-header">
							<li><?= __('store.order_id') ?></li>
							<li class="cart-item-price"><?= __('store.price') ?></li>
							<li><?= __('store.order_status') ?></li>
							<li><?= __('store.payment_method') ?></li>
							<li><?= __('store.transaction') ?></li>
							<li></li>
						</ul>

						<?php if($buyproductlist) {

								$subtotal = 0;
							
								foreach($buyproductlist as $product){ 

									$subtotal = $subtotal + (float)$product['total_sum'];
									
								?>
								<ul class="cart-items-row">
									<li><span class="my-orders-text"><?php echo $product['id'];?></span></li>
									<li><span class="my-orders-text"><?php echo c_format($product['total_sum']); ?></span></li>
									<li><span class="my-orders-text"><?php echo $status[$product['status']]; ?></span></li>
									<li><span class="my-orders-text text-center"><?php echo str_replace("_", " ", $product['payment_method']);?></span></li>
									<li><span class="my-orders-text"><?php echo $product['txn_id'];?></span></li>
									<li><span class="my-orders-text">
										<a href="<?= base_url('store/vieworder/'. $product['id']) ?>" class="btn btn-save-profile"><?= __('store.details') ?></a>
									</span></li>
								</ul>
							<?php } ?>
							<ul class="cart-footer-row">
								<li>
									<span><?= __('store.subtotal') ?></span>		 
									<span><?php echo c_format($subtotal); ?></span>		 
								</li>
								<li>
									<span><?= __('store.total') ?></span>		 
									<span><?php echo c_format($subtotal); ?></span>		 
								</li>
							</ul>
						<?php } else { ?>
							<ul class="cart-items-row">
								<li class="w-100"><span class="my-orders-text"><?= __('store.no_order_found') ?></span></li>		
							</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
