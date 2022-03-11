<div class="payment-list">
	<?php if(!$payment_gateways){ ?>
		<div class="alert alert-info">Warning: No Payment options are available. Please contact the store owner for assistance!</div>
	<?php } ?>
	<?php foreach ($payment_gateways as $key => $value) { ?>
		<div class="payment-gateway-step">
			<label>
				<input type="radio" name="payment_gateway" value="<?= $value['name'] ?>" >
				<div>
					<?php 
						if($value['icon']){ 
							echo '<img src="'. base_url($value['icon']) .'">';
						}
						if(isset($value['title']) && $value['title']){ 
							echo $value['html'];
						} 
					?>
				</div>
			</label>
		</div>
	<?php } ?>
</div>

<script type="text/javascript">
	$(".payment-gateway-step input[type=radio]").eq(0).prop("checked",1)
</script>