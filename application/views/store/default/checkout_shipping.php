<?php if($allow_shipping) { ?>

<div class="shipping-warning"></div>
<div class="form-row">
	<div class="form-group">
		<label><?= __('store.country') ?></label>
		<?php $selected =  isset($shipping) ? $shipping->country_id : '' ?>
		<?php $selected =  isset($country_id) ? $country_id : $selected ?>
		<select name="country" class="custom-select form-control">
			<option value="">Select Country</option>
			<?php foreach ($countries as $key => $value) { ?>
				<option <?= $selected == $value->id ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->name ?></option>
			<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label><?= __('store.state') ?></label>
		<select name="state" class="custom-select form-control">
		</select>
	</div>
	<div class="form-group">
		<label><?= __('store.city') ?></label>
		<input type="text" placeholder="<?= __('store.city') ?>" name="city" class="form-control" type="text" value="<?= isset($shipping) ? $shipping->city : '' ?>">
	</div>
</div>
								
<div class="form-row">
	<div class="form-group">
		<label><?= __('store.postal_code') ?></label>
		<input class="form-control" name="zip_code" placeholder="<?= __('store.postal_code') ?>" type="text" value="<?= isset($shipping) ? $shipping->zip_code : '' ?>">
	</div>
	<link rel="stylesheet" href="<?= base_url('assets/plugins/tel/css/intlTelInput.css') ?>?v=<?= av() ?>">
	<script src="<?= base_url('assets/plugins/tel/js/intlTelInput.js') ?>"></script>
	<div class="form-group">
		<label for=""><?= __('store.phone_number') ?></label>
		<div>
			<input id="phone" class="form-control" type="text" name="phone" value="<?= isset($shipping) ? $shipping->phone : '' ?>">
		</div>
	</div>
	<script type="text/javascript">
		var tel_input = intlTelInput(document.querySelector("#phone"), {
			initialCountry: "auto",
			utilsScript: "<?= base_url('/assets/plugins/tel/js/utils.js?1562189064761') ?>",
			separateDialCode:true,
			geoIpLookup: function(success, failure) {
			$.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
				var countryCode = (resp && resp.country) ? resp.country : "";
				success(countryCode);
			});
			},
		});
	</script>
</div>
<div class="form-row">
	<div class="form-group">
		<label><?= __('store.full_address') ?></label>
		<textarea class="form-control" placeholder="<?= __('store.full_address') ?>" name="address"><?= isset($shipping) ? $shipping->address : '' ?></textarea>
	</div>
</div>


<script type="text/javascript">
	var selected_state = '<?= isset($shipping) ? $shipping->state_id : '' ?>';
	//var selected_state = 0;
	// $('[name="country"]').trigger("change");

	renderStateAndCart(<?=$selected;?>);
</script>
<?php } else { ?>
	<?php if($show_blue_message){ ?>
		<div class="alert alert-info"><?= __('store.shipping_not_allows') ?></div>
	<?php } ?>
<?php } ?>