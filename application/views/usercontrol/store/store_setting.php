<?php include(APPPATH.'/views/usercontrol/includes/store.php'); ?>
<br>
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

<div class="row">
	<div class="col-12">

		<ul class="nav nav-tabs nav-tabs-custom">
		  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#vendor_store_setting"><?= __('user.store_setting') ?></a></li>
		  <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#vendor_vendor_settings"><?= __('user.vendor_setting') ?></a></li>
		</ul>

		<div class="tab-content">
		  	<div id="vendor_vendor_settings" class="tab-pane fade in active show">
			    <div class="card">
					<form class="setting-form">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12">
									<div class=" m-b-30">
										<div class="form-group">
											<label class="control-label"><?= __('user.other_affilite_sell_my_items') ?></label>
											<select class="form-control" name="vendor_status">
												<option value="0"><?= __('user.no') ?></option>
												<option value="1" <?= (int)$setting['vendor_status'] == 1 ? 'selected' : '' ?>><?= __('user.yes') ?></option>
											</select>
										</div>

										<fieldset class="custom-design mb-2">
				                            <legend><?= __('user.product_commission') ?></legend>
											<div class="form-group">
												<label class="control-label"><?= __('user.affiliate_click_commission'); ?></label>
												<div class="form-group">
													<div class="comm-group">
														<div>
															<div class="input-group mt-2">
																<div class="input-group-prepend"><span class="input-group-text"><?= __('user.click') ?></span></div>
																<input name="affiliate_click_count"  class="form-control" value="<?php echo $setting['affiliate_click_count']; ?>" type="text" placeholder='Clicks'>
															</div>
														</div>
														<div>
															<div class="input-group mt-2">
																<div class="input-group-prepend"><span class="input-group-text">$</span></div>
																<input name="affiliate_click_amount" class="form-control" value="<?php echo $setting['affiliate_click_amount']; ?>" type="text" placeholder='Amount'>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label"><?= __('user.affiliate_sale_commission'); ?></label>
												<div class="form-group">
													<div class="comm-group">
														<div>
															<div class="input-group mt-2">
																<?php
																	$commission_type= array(
																		'percentage' => 'Percentage (%)',
																		'fixed'      => 'Fixed',
																	);
																?>
																<select name="affiliate_sale_commission_type" class="form-control affiliate_sale_commission_type">
																	<?php foreach ($commission_type as $key => $value) { ?>
																		<option <?= $setting['affiliate_sale_commission_type'] == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>

														<div>
															<div class="input-group mt-2">
																<?php if ($setting['affiliate_sale_commission_type'] == 'percentage'){ ?>
																	<div class="input-group-prepend"><span class="input-group-text">%</span></div>
																<?php } else { ?>
																	<div class="input-group-prepend"><span class="input-group-text">$</span></div>
																<?php } ?>
																<input name="affiliate_commission_value" id="affiliate_commission_value" class="form-control" value="<?php echo $setting['affiliate_commission_value']; ?>" type="text" placeholder='Sale Commission'>
															</div>
														</div>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary btn-submit"><?= __('user.save_settings') ?></button>
						</div>
					</form>
				</div>
		  	</div>
		  	<div id="vendor_store_setting" class="tab-pane fade in">
			    <div class="card">
					<form class="setting-form" enctype="multipart/form-data">
						<input type="hidden" name="store_page_settings" value="1"/>
						<div class="card-body">
							<?php
								$store_meta = (!empty($store_details['store_meta'])) ? json_decode($store_details['store_meta'], true) : [];

								$store_logo = isset($store_meta['store_logo']) && !empty($store_meta['store_logo']) ? 'assets/user_upload/vendor_store/' . $store_meta['store_logo'] : 'assets/store/default/img/ct-banner-img.png';
								
								$cover_background = isset($store_meta['cover_background']) && !empty($store_meta['cover_background']) ? 'assets/user_upload/vendor_store/' . $store_meta['cover_background'] : 'assets/store/default/img/ctbg.png';
							?>
							
							<div class="row">
								<div class="col-md-9">
									<div class="form-group">
										<label class="control-label"><?= __('user.store_name') ?></label>
										<input type="text" name="store_name" class="form-control" value="<?= ($store_details['store_name']) ?>"/>
									</div>

									<div class="form-group">
										<label  class="control-label"><?= __('user.cover_text_color') ?></label>
										<input  name="cover_text_color" value="<?= isset($store_meta['cover_text_color']) ? $store_meta['cover_text_color'] : ""; ?>" class="form-control jscolor" data-jscolor type="text">
									</div>

									<div class="form-group">
										<label class="control-label"><?= __('user.cover_background_image') ?></label>
										<div>
											<div>
												<div class="fileUpload btn btn-sm btn-primary">
													<span><?= __('admin.choose_file') ?></span>
													<input id="cover_background" name="cover_background" class="upload render-preview" type="file"/>
												</div>
											</div>
											<img id="cover_background_preview" src="<?= base_url($cover_background); ?>" class="thumbnail" border="0" width="100%"/>
										</div>
									</div>
								</div>								

								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label"><?= __('user.store_logo') ?></label>
										<div>
											<div>
												<div class="fileUpload btn btn-sm btn-primary">
													<span><?= __('admin.choose_file') ?></span>
													<input id="store_logo" name="store_logo" class="upload render-preview" type="file"/>
												</div>
											</div>
											<img id="store_logo_preview" src="<?= base_url($store_logo); ?>" class="thumbnail" border="0" width="100%">
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-primary btn-submit"><?= __('user.save_settings') ?></button>
							<?php if(isset($store_details['store_slug']) && !empty($store_details['store_slug'])) { ?>
							<a href="<?= base_url('store/').$store_details['store_slug']; ?>" target="_blank" class="btn btn-info btn-preview"><?= __('user.preview_store_page') ?></a>
							<?php } ?>
						</div>
					</form>
				</div>
		  	</div>
		</div>
	</div>
</div>

<script src="<?= base_url('assets/js/jscolor.js'); ?>"></script>

<script type="text/javascript">

	$(document).on('ready',function() {
		let last_pill = localStorage.getItem("last_pill");
		if(last_pill){ $('[href="'+ last_pill +'"]').click() }
	});

	function readURLStorePage(input, previewer) {
		if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#'+previewer).attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}


	$("select[name='affiliate_sale_commission_type']").on('change',function(){
		let type = $(this).val();

		if(type == 'percentage')
			$('input[name="affiliate_commission_value"]').siblings('.input-group-prepend').find('.input-group-text').text('%');
		else
			$('input[name="affiliate_commission_value"]').siblings('.input-group-prepend').find('.input-group-text').text('$');
		

	})

	$("#cover_background").change(function () {
	    readURLStorePage(this, 'cover_background_preview');
	});

	$("#store_logo").change(function () {
	    readURLStorePage(this, 'store_logo_preview');
	});

	$('.nav-tabs-custom li a').on('shown.bs.tab', function(event){
	    let x = $(event.target).attr('href');
	    localStorage.setItem("last_pill", x);
	});

	$(document).on('keyup', 'input[name="store_name"]', function(){
		let store_name = $(this).val();
		$.ajax({
			url : "<?= base_url('usercontrol/check_duplicate_store'); ?>",
	        type:'POST',
	        dataType:'json',
	        data:{store_name: store_name},
	        success:function(result){
	        	$ele = $('[name="store_name"]');
	            if(!$ele.length){ 
	            	$ele = $('.store_name');
	            }
	        	if(result.error) {
	            	if(!$ele.hasClass("is-invalid")) {
		                $ele.addClass("is-invalid");
		                $ele.parents(".form-group").addClass("has-error");
		                $ele.after("<span class='d-block text-danger'>"+ result.error +"</span>");
		            }
				} else {
	                $ele.removeClass("is-invalid");
	                $ele.parents(".form-group").removeClass("has-error");
	                $ele.parent().find('span.text-danger').remove();
				}
	        },
	    });
	});

	$(".setting-form").on('submit',function(evt){
	    evt.preventDefault();	    
    	var formData = new FormData(this);  

	    $(".btn-submit").btn("loading");
	    formData = formDataFilter(formData);
	    $this = $(this);

	    $.ajax({
	        type:'POST',
	        dataType:'json',
	        cache:false,
	        contentType: false,
	        processData: false,
	        data:formData,
	        success:function(result){
	            $(".btn-submit").btn("reset");
	            $(".alert-dismissable").remove();

	            $this.find(".has-error").removeClass("has-error");
	            $this.find(".is-invalid").removeClass("is-invalid");
	            $this.find("span.text-danger").remove();
	            
	            if(result['location']){
	                window.location = result['location'];
	            }

	            if(result['success']){
	                $this.find(".card-body").prepend('<div class="alert mb-4 alert-info alert-dismissable">'+ result['success'] +'</div>');
	                var body = $("html, body");
					body.stop().animate({scrollTop:0}, 500, 'swing', function() { });
	            }

	            if(result['errors']){
	                $.each(result['errors'], function(i,j){
	                    $ele = $this.find('[name="'+ i +'"]');
	                    if(!$ele.length){ 
	                    	$ele = $this.find('.'+ i);
	                    }
	                    if($ele){
	                        $ele.addClass("is-invalid");
	                        $ele.parents(".form-group").addClass("has-error");
	                        $ele.after("<span class='d-block text-danger'>"+ j +"</span>");
	                    }
	                });

					errors = result['errors'];
					$('.formsetting_error').text(errors['formsetting_recursion_custom_time']);
					$('.productsetting_error').text(errors['productsetting_recursion_custom_time']);
	            }

	            if(result.store_page_url) {
	            	$this.find('.btn-preview').attr('href', result.store_page_url);
	            }
	        },
	    });
		
	    return false;
	});

</script>