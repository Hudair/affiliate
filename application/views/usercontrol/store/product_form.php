<?php
	$db =& get_instance();
	$userdetails=$db->userdetails();
?>

<script type="text/javascript" src="<?= base_url('assets/plugins/ui/jquery-ui.min.js') ?>"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/plugins/ui/jquery-ui.min.css") ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url("assets/plugins/select2/select2.min.css") ?>">
<script type="text/javascript" src="<?= base_url('assets/plugins/select2/select2.full.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jscolor.js') ?>"></script>

<style>
	.jscolor-picker-wrap{
		z-index:999999 !important;
	}

	#product-variations.table > tbody > tr > td:first-child {
		max-width:50px;
	}

	#product-variations.table > tbody > tr > td:last-child {
		max-width:50px;
		text-align:right;
	}

	#product-variations.table > tbody > tr > td, #product-variations.table > tfoot > tr > td, #product-variations.table > thead > tr > td {
		padding: 5px 12px;
		vertical-align: middle;
	}
</style>

<?php if($this->session->flashdata('success')){?>
	<div class="alert alert-success alert-dismissable my_alert_css">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php echo $this->session->flashdata('success'); ?> </div>
<?php } ?>
<?php if($this->session->flashdata('error')){?>
	<div class="alert alert-danger alert-dismissable my_alert_css">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<?php echo $this->session->flashdata('error'); ?> </div>
<?php } ?>

<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="form_form">
	<div class="row">
		<div class="col-sm-8">
			<div class="card">
				<div class="card-header">
					<h4 class="header-title"><?= (int)$product->product_id == 0 ? __('user.lbl_create_product') : __('user.lbl_update_product') ?></h4>
				</div>
				<div class="card-body">
					<input type="hidden" name="product_id" value="<?php echo $product->product_id ?>">

					<div class="form-group">
						<label class="col-form-label"><?= __('user.product_name') ?></label>
						<div>
							<input placeholder="<?= __('user.enter_your_product_name') ?>" name="product_name" value="<?php echo $product->product_name; ?>" class="form-control" type="text">
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="form-group">
								<label class="col-form-label"><?= __('user.product_sale_price') ?></label>
								<div>
									<input placeholder="Manufacturer’s Suggested Retail Price for Comparison" name="product_msrp" class="form-control" value="<?php echo $product->product_msrp; ?>" type="number">
								</div>
							</div>
							<div class="form-group">
								<label class="col-form-label"><?= __('user.product_price') ?></label>
								<div>
									<input placeholder="<?= __('user.enter_your_product_price') ?>" name="product_price" class="form-control" value="<?php echo $product->product_price; ?>" type="number">
								</div>
							</div>
							<div class="form-group">
								<label class="col-form-label"><?= __('user.product_sku') ?> </label>
								<div>
									<input placeholder="<?= __('user.enter_your_product_sku') ?>" name="product_sku" id="product_sku" class="form-control" value="<?php echo $product->product_sku; ?>" type="text">
								</div>
							</div>
							<div class="form-group" style="display: none;">
								<label class="col-form-label"><?= __('user.product_video_') ?></label>
								<div>
									<input placeholder="<?= __('user.enter_your_product_video_link{youtube/vimeo}') ?>" name="product_video" id="product_video" class="form-control" value="<?php echo $product->product_video; ?>" type="text">
								</div>
							</div>
							<div class="form-group">
								<label class="col-form-label"><?= __('user.short_description') ?></label>
								<div>
									<textarea rows="3" placeholder="<?= __('user.enter_your_product_short_description') ?>" class="form-control" name="product_short_description"  type="text"><?php echo $product->product_short_description; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-form-label"><?= __('user.categories') ?></label>
								<div class="category-container">
									<input name="category_auto" placeholder="<?= __('user.categories') ?>" id="category_auto" class="form-control" autocomplete="off">
									<ul class="category-selected">
										<?php if(isset($categories)){ ?>
											<?php foreach ($categories as $key => $category) { ?>
												<li>
								            		<i class="fa fa-trash remove-category"></i>
								            		<span><?= $category['name'] ?></span>
								            		<input type="hidden" name="category[]" type="" value="<?= $category['id'] ?>">
								            	</li>
											<?php } ?>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="form-group form-image-group">
								<div>
									<label class="col-form-label"><?= __('user.product_featured_image') ?></label><br>
									<div class="fileUpload btn btn-sm btn-primary">
										<span><?= __('user.choose_file') ?></span>
										<input onchange="readURL(this,'#featureImage')" id="product_featured_image" name="product_featured_image" class="upload" type="file">
									</div>
									<?php $product_featured_image = $product->product_featured_image != '' ? 'assets/images/product/upload/thumb/' . $product->product_featured_image : 'assets/images/no_product_image.png' ; ?>
									<img src="<?php echo base_url($product_featured_image); ?>" id="featureImage" class="thumbnail" border="0" width="220px">
								</div>
							</div>
							
						</div>
					</div>

					<div class="row mb-2">
						<div class="col-md-12">
							<span class="btn btn-primary btn-add-variants"><?= __('user.add_variants') ?></span>
						</div>
					</div>

					<?php
						if(isset($product->product_variations) && !empty($product->product_variations)) {
							$variations = json_decode($product->product_variations);
						}
					?>

					<table id="product-variations" class="table table-stripped border">
						<?php
							foreach($variations as $key => $value) {
								if(!empty($value)) {
									?>
									<tr data-variation-type="<?= strtolower($key); ?>">
										<td><strong><?= ucwords(strtolower($key));  ?> :</strong></td>
										<td>
											<?php
												for ($i=0; $i < sizeof($value); $i++) { 
													$this_price = isset($value[$i]->price) ? $value[$i]->price : 0;
													if($key == 'colors') {
														echo ($i == 0) ? ucwords(strtolower($value[$i]->name)) : ", ".ucwords(strtolower($value[$i]->name));
														echo "<input type='hidden' name='variations[".strtolower($key)."][name][]' value='".$value[$i]->name."'>";
														echo "<input type='hidden' name='variations[".strtolower($key)."][code][]' value='".$value[$i]->code."'>";
														echo "<input type='hidden' name='variations[".strtolower($key)."][price][]' value='".$this_price."'>";
													} else {
														$this_name = isset($value[$i]->name) ? $value[$i]->name : $value[$i];
														echo ($i == 0) ? ucwords(strtolower($this_name)) : ", ".ucwords(strtolower($this_name));
														echo "<input type='hidden' name='variations[".strtolower($key)."][name][]' value='".$this_name."'>";
														echo "<input type='hidden' name='variations[".strtolower($key)."][price][]' value='".$this_price."'>";
													}
												}
											?>
										</td>
										<td>
											<span data-variation-type="<?= strtolower($key); ?>" class="btn btn-md btn-warning btn-edit-variants"><i class="fa fa-edit"></i></span>
											<span data-variation-type="<?= strtolower($key); ?>" class="btn btn-md btn-danger btn-delete-variants"><i class="fa fa-trash"></i></span>
										</td>
									</tr>
									<?php
								}
							}													
						?>
					</table>

					<div class="form-group">
						<label class="control-label"><?= __('user.country_location') ?></label>
						<div class="row">
							<div class="col-sm-3">
								<div class="radio">
	                                <label><input type="radio" name="allow_country" value="0" checked=""> <?= __('user.disable'); ?></label> &nbsp;
	                                <label><input type="radio" name="allow_country" value="1" <?= (int)$product->state_id >= 1 ? 'checked' : '' ?> > <?= __('user.enable'); ?></label>
	                            </div>
							</div>
							<div class="col-sm-9">
								<div class="country-chooser">
									<div class="row">
										<div class="col">
											<select class="form-control" name="country_id" id="country_id">
												<option value="0"><?= __('user.select_country') ?></option>
												<?php foreach ($country_list as $key => $value) { ?>
													<option <?= $product_state->country_id == $value->id ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->name ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col">
											<select class="form-control" name="state_id" id="state_id">
												<option value=""><?= __('user.select_state') ?></option>
												<?php foreach ($states as $key => $value) { ?>
													<option <?= $product_state->id == $value->id ? 'selected' : '' ?> value="<?= $value->id ?>"><?= $value->name ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$("input[name=allow_country]").change(function(){
								if($("input[name=allow_country]:checked").val() == "0"){
									$(".country-chooser").hide();
								} else {
									$(".country-chooser").show();
								}
							})
							$("input[name=allow_country]:checked").trigger('change');

							$("#country_id").on('change',function(){
							    var country = $(this).val();
							    $('#state_id').prop("disabled",true)
							    $.ajax({
							        url: '<?php echo base_url('get_state') ?>',
							        type: 'post',
							        dataType: 'json',
							        data: {country_id : country},
							        success: function (json) {
							        	$('#state_id').prop("disabled",false)
							            if(json){
							                var html = '<option value="">Select State</option>';
							                $.each(json, function(k,v){
							                    html += '<option value="'+v.id+'">'+v.name+'</option>';
							                });
							                $('#state_id').html(html);
							            }
							        }
							    });
							});
						</script>
					</div>

					<div class="form-group">
						<label class="col-form-label"><?= __('user.product_description') ?></label>
						<div>
							<textarea data-height='300px' placeholder="<?= __('user.enter_your_product_description') ?>" class="product_description form-control summernote-img" name="product_description"  type="text"><?php echo $product->product_description; ?></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-form-label"><?= __('user.product_tags') ?></label>
						<select id="product_tags" name="product_tags[]" class="select2" multiple="multiple">
							<?php 
								if(!empty($product->product_tags)) {
									$ptags = json_decode($product->product_tags);
								} else {
									$ptags = [];
								}
								foreach($tags as $tag) {
									$selected = (in_array($tag, $ptags)) ? "selected" : "";
									echo '<option value="'.$tag.'" '.$selected.'>'.$tag.'</option>';
								}
							?>
						</select>
					</div>

					<!-- <div class="row">
						<div class="col-sm-12">
							<fieldset class="custom-design mb-2">
								<legend>Product Recursion</legend>
								<div class="form-group">
									<div>
										<?php
											$product_recursion_type = $product->product_recursion_type;
											$product_recursion = $product->product_recursion;
										?>
										<select name="product_recursion_type" class="form-control">
											<option <?= '' == $product_recursion_type ? 'selected' : '' ?> value=""><?=  __('user.none') ?></option>
											<option <?= 'default' == $product_recursion_type ? 'selected' : '' ?> value="default"><?= __('user.default') ?></option>
											<option <?= 'custom' == $product_recursion_type ? 'selected' : '' ?> value="custom">Custom</option>								
										</select>							
									</div>
									<div class="toggle-container mt-2">
										<div class="d-none default-value">
											<p class="text-muted">
												<?php
													if($setting['product_recursion'] == 'custom_time'){
														echo __('user.default_recursion'). " : " . timetosting($setting['recursion_custom_time']). " | EndTime: " . dateFormat($setting['recursion_endtime']);
													}else{
														echo __('user.default_recursion'). " : " . __('user.'.$setting['product_recursion']). " | EndTime: " . dateFormat($setting['recursion_endtime']);
													}
												?>
											</p>
										</div>

										<div class="d-none custom-value">
											<div class="custom_recursion">
												<div class="form-group">
													<select name="product_recursion" class="form-control" id="recursion_type">
														<option value="">Select recursion</option>
														<option <?php if($product_recursion == 'every_day') { ?> selected <?php } ?> value="every_day"><?=  __('user.every_day') ?></option>
														<option <?php if($product_recursion == 'every_week') { ?> selected <?php } ?>  value="every_week"><?=  __('user.every_week') ?></option>
														<option <?php if($product_recursion == 'every_month') { ?> selected <?php } ?>  value="every_month"><?=  __('user.every_month') ?></option>
														<option <?php if($product_recursion == 'every_year') { ?> selected <?php } ?>  value="every_year"><?=  __('user.every_year') ?></option>
														<option <?php if($product_recursion == 'custom_time') { ?> selected <?php } ?>  value="custom_time"><?=  __('user.custom_time') ?></option>
													</select>
												</div>

												<div class="form-group custom_time">
													<?php
														$minutes = $product->recursion_custom_time;
														$day = floor ($minutes / 1440);
														$hour = floor (($minutes - $day * 1440) / 60);
														$minute = $minutes - ($day * 1440) - ($hour * 60);
													?>

													<input type="hidden" name="recursion_custom_time" value="<?php echo $minutes; ?>">
													<div class="row">
														<div class="col-sm-4">
															<label class="control-label"><?= __('user.days') ?> : </label>
															<input placeholder="Days" type="number" class="form-control" value="<?= $day ? $day : '' ?>" id="recur_day" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');">
														</div>						
														<div class="col-sm-4">
															<label class="control-label"><?= __('user.hours') ?> : </label>
															<select class="form-control" id="recur_hour">
																<?php for ($x = 0; $x <= 23; $x++) {
																	$selected = ($x == $hour ) ? 'selected="selected"' : '';
																	echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
																} ?>
															</select>
														</div>						
														<div class="col-sm-4">
															<label class="control-label"><?= __('user.minutes') ?> : </label>
															<select class="form-control" id="recur_minute">
																<?php for ($x = 0; $x <= 59; $x++) {
																	$selected = ($x == $minute ) ? 'selected="selected"' : '';
																	echo '<option value="'.$x.'" '.$selected.'>'.$x.'</option>';
																} ?>
															</select>
														</div>						
													</div>									
												</div>
												<br>
												<div class="endtime-chooser row">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="control-label d-block"><?= __('user.choose_custom_endtime') ?> <input <?= $product->recursion_endtime ? 'checked' : '' ?>  id='setCustomTime' name='recursion_endtime_status' type="checkbox"> </label>
															<div style="<?= !$product->recursion_endtime ? 'display:none' : '' ?>" class='custom_time_container'>
																<input type="text" class="form-control" value="<?= $product->recursion_endtime ? date("d-m-Y H:i",strtotime($product->recursion_endtime)) : '' ?>" name="recursion_endtime" id="endtime" placeholder="Choose EndTime" >
															</div>
														</div>
													</div>
												</div>
											</div>								
										</div>
									</div>

									<script type="text/javascript">
										$("select[name=product_recursion_type]").on("change",function(){
											$con = $(this).parents(".form-group");
											$con.find(".toggle-container .custom-value, .toggle-container .default-value").addClass('d-none');

											if($(this).val() == 'default'){
												$con.find(".toggle-container .default-value").removeClass("d-none");
											}else if($(this).val() == 'custom'){
												$con.find(".toggle-container .custom-value").removeClass("d-none");
											}
										})
										$("select[name=product_recursion_type]").trigger("change");


										$("select[name=product_recursion]").on("change",function(){
											$con = $(this).parents(".custom_recursion");
											$con.find(".custom_time").addClass('d-none');

											if($(this).val() == 'custom_time'){
												$con.find(".custom_time").removeClass("d-none");
											}
										})
										$("select[name=product_recursion]").trigger("change");
									</script>
								</div>
							</fieldset>
						</div>
					</div> -->

					<fieldset class="custom-design mb-2">
						<legend><?= __('user.product_type'); ?></legend>
						<div class="form-group">
	                        <div>
	                            <label class="radio-inline">
	                                <input type="radio" name="product_type" value="virtual" <?= ($product->product_type == 'virtual' || $product->product_type == '') ? 'checked="checked"' : '' ?> > <?= __('user.virtual_product'); ?>
	                            </label>
	                            &nbsp;
	                            <label class="radio-inline">
	                                <input type="radio" name="product_type" value="downloadable" <?= ($product->product_type == 'downloadable') ? 'checked="checked"' : '' ?> > <?= __('user.downloadable_product'); ?>
	                            </label>
	                            <div class="form-group downloadable_file_div well" style="display: none;">
	                                <div class="file-preview-button btn btn-primary">
	                                    <?= __('user.downloadable_file'); ?>
	                                    <input type="file" class="downloadable_file_input" name="downloadable_files" multiple="">
	                                </div>

	                                <div id="priview-table" class="table-responsive">
	                                    <table class="table table-hover">
	                                        <thead>
	                                            <?php foreach ($downloads as $key => $value) { ?>
	                                                <tr>
	                                                    <td width="70px"> <div class="upload-priview up-<?= $value['type'] ?>" ></div></td>
	                                                    <td>
	                                                        <?= $value['mask'] ?>
	                                                        <input type="hidden" name="keep_files[]" value="<?= $key ?>">
	                                                    </td>
	                                                    <td width="70px"><button type="button" class="btn btn-danger btn-sm remove-priview-server" data-id="'+ i +'" ><?= __('user.remove') ?></button></td>
	                                                </tr>
	                                            <?php } ?>
	                                        </thead>
	                                        <tbody>
	                                            
	                                        </tbody>
	                                    </table>
	                                </div>
	                            </div>
	                        </div>
                		</div>
                   	</fieldset>
					
					<div class="row mt-4">
						<!-- <div class="col-sm-3">
							<div class="form-group mb-0">
								<label class="control-label"><?= __('user.allow_comment'); ?></label>
	                            <div class="radio">
	                                <label><input type="radio" name="allow_comment" value="0" checked=""> <?= __('user.disable'); ?></label> &nbsp;
	                                <label><input type="radio" name="allow_comment" value="1" <?= $product->allow_comment ? 'checked' : '' ?> > <?= __('user.enable'); ?></label>
	                            </div>
		                    </div>
						</div> -->
						<div class="col-sm-3">
							<div class="form-group mb-0 ">
								<label class="control-label"><?= __('user.allow_upload_file'); ?></label>
	                            <div class="radio">
	                                <label><input type="radio" name="allow_upload_file" value="0" checked=""> <?= __('user.disable'); ?></label> &nbsp;
	                                <label><input type="radio" name="allow_upload_file" value="1" <?= $product->allow_upload_file ? 'checked' : '' ?> > <?= __('user.enable'); ?></label>
	                            </div>
		                    </div>
						</div>
						<div class="col-sm-3">
							<div class="form-group mb-0 ">
								<label class="control-label"><?= __('user.show_on_store'); ?></label>
	                            <div class="radio">
	                                <label><input type="radio" name="on_store" value="0" checked=""> <?= __('user.no'); ?></label> &nbsp;
	                                <label><input type="radio" name="on_store" value="1" <?= (int)$product->on_store ? 'checked' : '' ?> > <?= __('user.yes'); ?></label>
	                            </div>
		                    </div>
						</div>
						<div class="col-sm-3">
							<div class="form-group mb-0 ">
								<label class="control-label"><?= __('user.enable_shipping'); ?></label>
	                            <div class="radio">
	                                <label><input type="radio" name="allow_shipping" value="0" checked=""> <?= __('user.disable'); ?></label> &nbsp;
	                                <label><input type="radio" name="allow_shipping" value="1" <?= $product->allow_shipping ? 'checked' : '' ?> > <?= __('user.enable'); ?></label>
	                            </div>
		                    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="card commission-setting">
				<div class="card-header"><h4 class="header-title"><?= __('user.commission') ?></h4></div>

				<div class="card-body">

					<div class="form-group">
                        <label class="control-label"><?= __('user.status'); ?> : </label>
                        <?= product_status($product->product_status) ?>	
                    </div>

                 
                    <fieldset class="custom-design mb-2">
						<legend><?= __('admin.commission_for_affiliate'); ?></legend>
						<div class="form-group">
							<label class="control-label"><?= __('admin.click_commission'); ?></label>
							<div>
								<?php
									$commission_type= array(
										'default'    => 'Default',
										'fixed'      => 'Fixed',
									);
								?>
								<select name="affiliate_click_commission_type" class="form-control">
									<?php foreach ($commission_type as $key => $value) { ?>
										<option <?= $seller->affiliate_click_commission_type == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="toggle-container">
								<div class="default-value d-none">
									<small class="text-muted d-block">
										<?php
											$commnent_line = "<b>Default Commission: </b>";
											if($seller_setting->affiliate_click_amount && $seller_setting->affiliate_click_count){
												$commnent_line .= c_format($seller_setting->affiliate_click_amount) ." Per ". (int)$seller_setting->affiliate_click_count ." Clicks";
											}
											else{
												$commnent_line .= __('user.not_set');
											}
											echo $commnent_line;
										?>
									</small>
								</div>
								<div class="custom-value d-none">										
									<div class="form-group">
										<div class="comm-group">
											<div>
												<div class="input-group mt-2">
												  	<div class="input-group-prepend"><span class="input-group-text"><?= __('user.click') ?></span></div>
													<input name="affiliate_click_count"  class="form-control" value="<?php echo $seller->affiliate_click_count; ?>" type="text" placeholder='Clicks'>
												</div>
											</div>
											<div>
												<div class="input-group mt-2">
												  	<div class="input-group-prepend"><span class="input-group-text">$</span></div>
													<input name="affiliate_click_amount" class="form-control" value="<?php echo $seller->affiliate_click_amount; ?>" type="text" placeholder='Amount'>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<script type="text/javascript">
								$("select[name=affiliate_click_commission_type]").on("change",function(){
									$con = $(this).parents(".form-group");
									$con.find(".toggle-container .percentage-value, .toggle-container .custom-value").addClass('d-none');

									if($(this).val() == 'default'){
										$con.find(".toggle-container .default-value").removeClass("d-none");
									}else{
										$con.find(".toggle-container .custom-value").removeClass("d-none");
									}
								})
								$("select[name=affiliate_click_commission_type]").trigger("change");
							</script>								
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label class="control-label"><?= __('admin.sale_commission'); ?></label>
									<div>
										<?php
											$commission_type= array(
												'default'    => 'Default',
												'percentage' => 'Percentage (%)',
												'fixed'      => 'Fixed',
											);
										?>
										<select name="affiliate_sale_commission_type" class="form-control">
											<?php foreach ($commission_type as $key => $value) { ?>
												<option <?= $seller->affiliate_sale_commission_type == $key ? 'selected' : '' ?> value="<?= $key ?>"><?= $value ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="toggle-container">
										<div class="default-value d-none">
											<label class="control-label"><?= __('user.default_commission') ?></label>
											<small class="text-muted d-block">
												<?php
													$commnent_line = "";
													if($seller_setting->affiliate_sale_commission_type == ''){
														$commnent_line .= __('user.not_set');
													}
													else if($seller_setting->affiliate_sale_commission_type == 'percentage'){
														$commnent_line .= 'Percentage : '. (float)$seller_setting->affiliate_commission_value .'%';
													}
													else if($seller_setting->affiliate_sale_commission_type == 'fixed'){
														$commnent_line .= 'Fixed : '. c_format($seller_setting->affiliate_commission_value);
													}
													echo $commnent_line;
												?>
											</small>
										</div>
										<div class="percentage-value d-none">										
											<div class="form-group">
												<label class="control-label m-0"><?= __('user.sale_commission') ?></label>
												<input name="affiliate_commission_value" id="affiliate_commission_value" class="form-control mt-2" value="<?php echo $seller->affiliate_commission_value; ?>" type="text" placeholder='Sale'>
											</div>
										</div>
									</div>
								</div>
							</div>


							<script type="text/javascript">
								$("select[name=affiliate_sale_commission_type]").on("change",function(){
									$con = $(this).parents(".form-group");
									$con.find(".toggle-container .percentage-value, .toggle-container .default-value").addClass('d-none');

									if($(this).val() == 'default'){
										$con.find(".toggle-container .default-value").removeClass("d-none");
									}else{
										$con.find(".toggle-container .percentage-value").removeClass("d-none");
									}
								})
								$("select[name=affiliate_sale_commission_type]").trigger("change");
							</script>
						</div>
					</fieldset>

					<fieldset class="custom-design mb-2">
						<legend><?= __('admin.commission_for_admin'); ?></legend>

						<div class="form-group mb-1">
							<label class="control-label"><?= __('admin.click_commission'); ?> : </label> 
							<span>
								<?php 
									if((int)$product->product_id == 0 || $seller->admin_click_commission_type == '' || $seller->admin_click_commission_type == 'default'){
										echo c_format($vendor_setting['admin_click_amount']) ." Per ". (int)$vendor_setting['admin_click_count'] ." Clicks";
									} else{ 
										echo c_format($seller->admin_click_amount) ." Per ". (int)$seller->admin_click_count ." Clicks";
									} 
								?>
							</span>
						</div>

						<div class="form-group mb-1">
							<label class="control-label"><?= __('admin.sale_commission'); ?> : </label> 
							<span>
								<?php 
									$commnent_line = "";
									
									if((int)$product->product_id == 0 || $seller->admin_sale_commission_type == '' || $seller->admin_sale_commission_type == 'default'){ 
										if($vendor_setting['admin_sale_commission_type'] == ''){
											$commnent_line .= __('user.not_set');
										}
										else if($vendor_setting['admin_sale_commission_type'] == 'percentage'){
											$commnent_line .= 'Percentage : '. (float)$vendor_setting['admin_commission_value'] .'%';
										}
										else if($vendor_setting['admin_sale_commission_type'] == 'fixed'){
											$commnent_line .= 'Fixed : '. c_format($vendor_setting['admin_commission_value']);
										}
									} else if($seller->admin_sale_commission_type == 'percentage'){
										$commnent_line .= 'Percentage : '. (float)$seller->admin_commission_value .'%';
									} else if($seller->admin_sale_commission_type == 'fixed'){
										$commnent_line .= 'Fixed : '. c_format($seller->admin_commission_value);
									} else {
										$commnent_line .= __('user.warning') . ":" . __('user.commission_not_set');
									} 

									echo $commnent_line;

								?>
								
							</span>
						</div>
					</fieldset>

					<fieldset class="custom-design mb-2">
						<legend><?= __('user.finalize_commission'); ?></legend>
						<div class="row">
							<div class="col-sm-4">
								<label class="control-label"><?= __('user.vendor') ?>  <span data-toggle='tooltip' title="<?= __('user.info_lbl_product_owner') ?>"></span></label>
								<input type="text" readonly="" value="0" class="form-control" id="ipt-vendor_commission">
							</div>
							<div class="col-sm-4">
								<label class="control-label"><?= __('user.admin') ?> <span data-toggle='tooltip' title="<?= __('user.info_lbl_admin') ?>"></span></label>
								<input type="text" readonly="" value="0" class="form-control" id="ipt-admin_sale_com">
							</div>
							<div class="col-sm-4">
								<label class="control-label"><?= __('user.affiliate') ?> <span data-toggle='tooltip' title="<?= __('admin.info_lbl_product_other_affiliate') ?>"></span></label>
								<input type="text" readonly="" value="0" class="form-control" id="ipt-affiliate_sale_com">
							</div>
						</div>
					</fieldset>
					
				</div>
			</div>

			<div class="card">
				<div class="card-header"><h4 class="header-title"><?= __('user.admin_comments') ?></h4></div>
				<div class="card-body chat-card">
					<?php $comment = json_decode($seller->comment,1); ?>
					<?php if($comment){ ?>
						<ul class="comment-products">
							<?php foreach ($comment as $key => $value) { ?>
								<li class="<?= $value['from'] == 'affiliate' ? 'me' : 'other' ?>"> <div><?= $value['comment'] ?></div> </li>
							<?php } ?>
						</ul>
					<?php } ?>
					<div class="bg-white form-group m-0 p-2">
						<textarea class="form-control" placeholder="Enter message and save product to send" name="admin_comment"></textarea>
					</div>
				</div>
				<div class="card-footer">
					<div class="text-right">
						<span class="loading-submit"></span>
						<?php if((int)$product->product_id > 0){ ?>
							<button type="submit" class="btn btn-lg btn-default btn-submit btn-success" name="ask_to_review"><?= __('user.send_to_review') ?></button
								>
						<?php } ?>
						<button type="submit" class="btn btn-lg btn-default btn-submit btn-success" name="save">
							<?= (int)$product->product_id == 0 ? 'Save & Submit For Review' : __('user.save') ?>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<div id="modal-variants" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('user.add_varaition') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height:70vh; overflow-y:auto;">
		<div class="row">
			<div class="col-5">
				<div class="form-group">
					<label for="variation_type"><?= __('user.varaition_type') ?></label>
					<select class="form-control" id="variation_type">
						<option value="colors"><?= __('user.color') ?></option>
						<option value="other"><?= __('user.other_variation') ?></option>
					</select>
				</div>
			</div>
			<div class="col-7">
				<div class="form-group other_variation_title_input" style="display:none">
					<label for="other_variation_title"><?= __('user.varaition_title') ?></label>
					<input type="text" class="form-control" id="other_variation_title" maxlength="25" placeholder="Variation Title">
				</div>
			</div>
		</div>
		<div class="colors-list">
			
		</div>
		<div class="features-list" style="display:none">
			
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary add-variation-to-form"><?= __('user.add_variants') ?></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= __('user.close') ?></button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

	$("#product_tags").select2({
		tags: true,
		tokenSeparators: [',']
	})

	$(document).on('click', '.btn-add-variants', function(){
		prepareVariationModal();
	});

	
	$(document).on('click', '.btn-delete-variants', function(){
		$(this).closest('tr').remove();
	});

	$(document).on('click', '.btn-edit-variants', function(){
		let options;
		let row = $(this).closest('tr');
		let vType = $(this).data('variation-type');
		if(vType == "colors") {
			$("#variation_type").val('colors');
			options = getOptions("tr[data-variation-type='"+vType+"'] input[name='variations["+vType+"][code][]']","tr[data-variation-type='"+vType+"'] input[name='variations["+vType+"][name][]']", "tr[data-variation-type='"+vType+"'] input[name='variations["+vType+"][price][]']");
		} else {
			$("#variation_type").val('other');
			$('#other_variation_title').val(vType);
			options = getOptions("tr[data-variation-type='"+vType+"'] input[name='variations["+vType+"][name][]']", "tr[data-variation-type='"+vType+"'] input[name='variations["+vType+"][price][]']");
		}
		prepareVariationModal(options);
		$("#variation_type").trigger('change');
	});

	function prepareVariationModal(options = null){
		let colors = "";
		let features = "";
		if(options != null) {
			for (let index = 0; index < options.length; index++) {
				if(options[index].code) {
					colors += `<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label  class="control-label">Color</label>
								<input value="`+options[index].code+`" class="form-control jscolor color-code" data-jscolor type="text">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label">Color Name</label>
								<input value="`+options[index].name+`" class="form-control color-name" type="text">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Additional Price</label>
								<input value="`+options[index].price+`" class="form-control color-price" type="number">
							</div>
						</div>
						<div class="col-md-1 pt-4"><span class="btn btn-danger btn-remove-variation" style="margin-top:6px;"><i class="fa fa-trash"></i></span></div>
					</div>`;
				} else {
					let features_name = options[index].name ? options[index].name : options[index];
					let features_price = options[index].price ? options[index].price : 0;
					features += `<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label  class="control-label">Variation Option</label>
								<input value="`+features_name+`" class="form-control variation-option" type="text">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label class="control-label">Additional Price</label>
								<input value="`+features_price+`" class="form-control variation-price" type="number">
							</div>
						</div>
						<div class="col-md-1 pt-4"><span class="btn btn-danger btn-remove-variation" style="margin-top:6px;"><i class="fa fa-trash"></i></span></div>
					</div>`;
				}			
			}
		}

		$('#modal-variants .colors-list').html(colors+`<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label  class="control-label">Color</label>
					<input value="#FFFFFF" class="form-control jscolor color-code" data-jscolor type="text">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">Color Name</label>
					<input value="" class="form-control color-name" type="text">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Additional Price</label>
					<input value="" class="form-control color-price" type="number">
				</div>
			</div>
			<div class="col-md-1 pt-4"><span class="btn btn-primary btn-add-color" style="margin-top:6px;"><i class="fa fa-plus"></i></span></div>
		</div>`);

		$('#modal-variants .features-list').html(features+`<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					<label  class="control-label">Variation Option</label>
					<input value="" class="form-control variation-option" type="text">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label">Additional Price</label>
					<input value="" class="form-control variation-price" type="number">
				</div>
			</div>
			<div class="col-md-1 pt-4"><span class="btn btn-primary btn-add-feature" style="margin-top:6px;"><i class="fa fa-plus"></i></span></div>
		</div>`);
		jscolor.install();
		$('#modal-variants').modal('show');
	}

	$(document).on('click', '.add-variation-to-form', function(){
		let variation = {
			name : null,
			options : []
		}
		if($('#modal-variants #variation_type').val() == 'colors') {
			variation.name = 'colors';
			variation.options = getOptions("#modal-variants .color-code", "#modal-variants .color-name", "#modal-variants .color-price");
		} else {
			variation.name = $('#modal-variants #other_variation_title').val();
			variation.name = variation.name.replace(/\s+/g, '-').toLowerCase();
			variation.options = getOptions("#modal-variants .variation-option", "#modal-variants .variation-price");
		}

		if(variation.name != null && variation.name != "" && variation.options.length > 0) {
			let row = `<td><strong>`+toTitleCase(variation.name)+` :</strong></td><td>`;
			for (let index = 0; index < variation.options.length; index++) {
				if(variation.name == 'colors') {
					row += (index == 0) ? toTitleCase(variation.options[index]['name']) : ", "+toTitleCase(variation.options[index]['name']);
					row += `<input type='hidden' name='variations[`+variation.name+`][name][]' value='`+variation.options[index]['name']+`'>`;
					row += `<input type='hidden' name='variations[`+variation.name+`][code][]' value='`+variation.options[index]['code']+`'>`;
					row += `<input type='hidden' name='variations[`+variation.name+`][price][]' value='`+variation.options[index]['price']+`'>`;
				} else {
					row += (index == 0) ? toTitleCase(variation.options[index]['name']) : ", "+toTitleCase(variation.options[index]['name']);
					row += `<input type='hidden' name='variations[`+variation.name+`][name][]' value='`+variation.options[index]['name']+`'>`;
					row += `<input type='hidden' name='variations[`+variation.name+`][price][]' value='`+variation.options[index]['price']+`'>`;
				}
			}
			row += `</td>
			<td>
				<span data-variation-type="`+variation.name+`" class="btn btn-md btn-warning btn-edit-variants"><i class="fa fa-edit"></i></span>
				<span class="btn btn-md btn-danger btn-delete-variants"><i class="fa fa-trash"></i></span>
			</td>`;

			if($('#product-variations tr[data-variation-type="'+variation.name+'"]').length != 0){
				$('#product-variations tr[data-variation-type="'+variation.name+'"]').html(row);
			} else {
				$('#product-variations').append(`<tr data-variation-type="`+variation.name+`">`+row+`</tr>`);
			}
		}

		$('#modal-variants').modal('hide');
	});

	$(document).on('click', '.btn-add-color', function(){
		$(this).before(`<span class="btn btn-danger btn-remove-variation" style="margin-top:6px;"><i class="fa fa-trash"></i></span>`);
		$(this).remove();
		$('.colors-list').append(`
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<label  class="control-label">Color</label>
						<input value="#FFFFFF" class="form-control jscolor color-code" data-jscolor type="text">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label">Color Name</label>
						<input value="" class="form-control color-name" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label">Additional Price</label>
						<input value="" class="form-control color-price" type="number">
					</div>
				</div>
				<div class="col-md-1 pt-4"><span class="btn btn-primary btn-add-color" style="margin-top:6px;"><i class="fa fa-plus"></i></span></div>
			</div>
		`);
		jscolor.install();
	});

	$(document).on('click', '.btn-add-feature', function(){
		$(this).before(`<span class="btn btn-danger btn-remove-variation" style="margin-top:6px;"><i class="fa fa-trash"></i></span>`);
		$(this).remove();
		$('.features-list').append(`
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						<label  class="control-label">Variation Option</label>
						<input value="" class="form-control variation-option" type="text">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label">Additional Price</label>
						<input value="" class="form-control variation-price" type="number">
					</div>
				</div>
				<div class="col-md-1 pt-4"><span class="btn btn-primary btn-add-feature" style="margin-top:6px;"><i class="fa fa-plus"></i></span></div>
			</div>
		`)
	});

	$(document).on('click', '.btn-remove-variation', function(){
		$(this).closest(`.row`).remove();
	});

	$(document).on('keypress', '#other_variation_title', function (event) {
		var regex = new RegExp("^[a-zA-Z0-9 ]+$");
		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (!regex.test(key)) {
		event.preventDefault();
		return false;
		}
	});

	$(document).on('change', "#variation_type", function(){
		if($(this).val() == 'other') {
			$('.other_variation_title_input').show();
			$('.colors-list').hide();
			$('.features-list').show();
		} else {
			$('.other_variation_title_input').hide();
			$('.colors-list').show();
			$('.features-list').hide();
		}
	});

	function getOptions(element1, element2, element3 = null) {
		let options = [];
		if(element3 != null) {
			let codes = []
			$(element1).each(function() {
				codes.push($(this).val());
			});
			let names = []
			$(element2).each(function() {
				names.push($(this).val());
			});
			let price = []
			$(element3).each(function() {
				price.push($(this).val());
			});
			for (let index = 0; index < codes.length; index++) {
				if(codes[index] != null && codes[index] != "" && names[index] != null && names[index] != "") {
					options.push({
						code : codes[index],
						name : names[index],
						price : price[index]
					});
				}
			}
		} else {
			let names = []
			$(element1).each(function() {
				names.push($(this).val());
			});
			let price = []
			$(element2).each(function() {
				price.push($(this).val());
			});
			for (let index = 0; index < names.length; index++) {
				if(names[index] != null && names[index] != "") {
					options.push({
						name : names[index],
						price : price[index]
					});
				}
			}
		}
		return options;
	}

	function toTitleCase(str) {
		return str.replace(/(?:^|\s)\w/g, function(match) {
			return match.toUpperCase();
		});
	}


	var cache = {};

	$(".comment-products").animate({ scrollTop: $('.comment-products').prop("scrollHeight")}, 1000);

	$(".commission-setting :input, input[name=product_price]").on("change",calcCommission);
	var xhrCommission;
	function calcCommission(){
		$this = $(this);
		if(xhrCommission && xhrCommission.readyState != 4){
			xhrCommission.abort()
		}

		xhrCommission = $.ajax({
			url:'<?= base_url('usercontrol/calc_commission') ?>',
			type:'POST',
			dataType:'json',
			data:$(".commission-setting :input, input[name=product_price], input[name=product_id]"),
			success:function(json){
				if(json['success']){
					$("#ipt-vendor_commission").val(json['commission']['vendor_commission']);
					$("#ipt-admin_sale_com").val(json['commission']['admin_sale_com']);
					$("#ipt-affiliate_sale_com").val(json['commission']['affiliate_sale_com']);
				}
			},
		})
	}calcCommission();

	$("#category_auto").autocomplete({
        source: function( request, response ) {
	        var term = request.term;
	        if ( term in cache ) {response( cache[ term ] );return;}
	 
	        $.getJSON( '<?= base_url('usercontrol/category_auto') ?>', request, function( data, status, xhr ) {
	          cache[ term ] = data;
	          response( data );
	        });
	    },
        minLength: 0,
        select: function (event, ui) {
            $("#category_auto").blur();
            event.preventDefault();
            if($(".category-selected input[value='"+ ui.item.value +"']").length == 0){
	            $(".category-selected").append('\
	            	<li>\
	            		<i class="fa fa-trash remove-category"></i>\
	            		<span>'+ ui.item.label +'</span>\
	            		<input type="hidden" name="category[]" type="" value="'+ ui.item.value +'">\
	            	</li>\
	        	');
            }
        },
    }).on('focus',function(){
        $(this).data("uiAutocomplete").search($(this).val());
    });

    $(".category-selected").delegate(".remove-category",'click', function(){
    	$(this).parents("li").remove();
    })

	
	/*$(".showonchange").on('change',function(){
		var val = $(this).val();
		$pare = $(this).parents('.row').eq(0);
		$pare.find(".toggle-divs p, .toggle-divs input, .toggle-divs .custom_recursion").hide();
		if(val == 'default'){
			$pare.find(".toggle-divs p").show();
		}else if(val){
			$pare.find(".toggle-divs input").show();
			$pare.find(".toggle-divs .custom_recursion").show();
		}
	})
	$(".showonchange").trigger('change');*/

	function readURLBanner(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#bannerImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$(".btn-submit").on('click',function(evt){
        evt.preventDefault();
        $btn = $(this);
        var formData = new FormData($("#form_form")[0]);

        $.each(fileArray, function(i,j){ formData.append("downloadable_file[]", j.rawData); });
        formData.append("action", $(this).attr("name"));
		
        formData = formDataFilter(formData);
        $this = $("#form_form");	       
        
       	$btn.btn("loading");
        $.ajax({
            url:'<?= base_url('usercontrol/store_save_product') ?>',
            type:'POST',
            dataType:'json',
            cache:false,
            contentType: false,
            processData: false,
            data:formData,
            xhr: function (){
                var jqXHR = null;

                if ( window.ActiveXObject ){
                    jqXHR = new window.ActiveXObject( "Microsoft.XMLHTTP" );
                }else {
                    jqXHR = new window.XMLHttpRequest();
                }
                
                jqXHR.upload.addEventListener( "progress", function ( evt ){
                    if ( evt.lengthComputable ){
                        var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
                        console.log( 'Uploaded percent', percentComplete );
                        $('.loading-submit').text(percentComplete + "% Loading");
                    }
                }, false );

                jqXHR.addEventListener( "progress", function ( evt ){
                    if ( evt.lengthComputable ){
                        var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
                        $('.loading-submit').text("Save");
                    }
                }, false );
                return jqXHR;
            },
            error:function(){ $btn.btn("reset"); },
            success:function(result){            	
            	$btn.btn("reset");
                $('.loading-submit').hide();
                $this.find(".has-error").removeClass("has-error");
                $this.find("span.text-danger").remove();
                
                if(result['location']){
                    window.location = result['location'];
                }
                if(result['errors']){
                    $.each(result['errors'], function(i,j){
                        $ele = $this.find('[name="'+ i +'"]');

                        if($ele.length){
                            $ele.parents(".form-group").addClass("has-error");
                            $ele.after("<span class='text-danger'>"+ j +"</span>");
                        } else {
                        	Swal.fire({
								icon: 'error',
								html: j,
							});
                        }	
                    });
                }
            },
        });
	    
        return false;
    });

    /*$(document).on('change', '#recursion_type', function(){
		var recursion_type = $(this).val();		

		if( recursion_type == 'custom_time' ){
			$('.custom_time').show();
		}else{
			$('.custom_time').hide();
		}

	});*/

	$(document).on('change', '#recur_day, #recur_hour, #recur_minute', function(){
		var days = $('#recur_day').val();
		var hours = $('#recur_hour').val();
		var minutes = $('#recur_minute').val();
		var total_minutes;		
		
		total_hours = parseInt(days*24) + parseInt(hours);
		total_minutes = parseInt(total_hours*60) + parseInt(minutes);
		$('.custom_time').find('input[name="recursion_custom_time"]').val(total_minutes);

	});

	$('#endtime').datetimepicker({
		format:'d-m-Y H:i',
		inline:true,
	});

	$('#setCustomTime').on('change', function(){
		$(".custom_time_container").hide();
		if($(this).prop("checked")){
			$(".custom_time_container").show();
		}
	});

    $(document).on('ready',function() {
        $('input[name="product_type"]:checked').trigger('change');
        $('[name="allow_for"]').trigger("change");
        sumNote($('.summernote-img'));
    });

    var fileArray = [];
    $('.downloadable_file_input').change(function(e){
        $.each(e.target.files, function(index, value){
            var fileReader = new FileReader(); 
            fileReader.readAsDataURL(value);
            fileReader.name = value.name;
            fileReader.rawData = value;
            fileArray.push(fileReader);
        });

        render_priview();
    });

    var getFileTypeCssClass = function(filetype) {
        var fileTypeCssClass;
        fileTypeCssClass = (function() {
            switch (true) {
                case /image/.test(filetype): return 'image';
                case /video/.test(filetype): return 'video';
                case /audio/.test(filetype): return 'audio';
                case /pdf/.test(filetype): return 'pdf';
                case /csv|excel/.test(filetype): return 'spreadsheet';
                case /powerpoint/.test(filetype): return 'powerpoint';
                case /msword|text/.test(filetype): return 'document';
                case /zip/.test(filetype): return 'zip';
                case /rar/.test(filetype): return 'rar';
                default: return 'default-filetype';
            }
        })();
        return fileTypeCssClass;
    };

    function render_priview() {
        var html = '';

        $.each(fileArray, function(i,j){
            html += '<tr>';
            html += '    <td width="70px"> <div class="upload-priview up-'+ getFileTypeCssClass(j.rawData.type) +'" ></div></td>';
            html += '    <td>'+ j.name +'</td>';
            html += '    <td width="70px"><button type="button" class="btn btn-danger btn-sm remove-priview" data-id="'+ i +'" >Remove</button></td>';
            html += '</tr>';
        })

        $("#priview-table tbody").html(html);
    }

    $("#priview-table").delegate('.remove-priview','click', function(){
        if(!confirm('<?= __('user.are_you_sure') ?>')) return false;

        var index = $(this).attr("data-id");
        fileArray.splice(index,1);
        render_priview()
    })

    $(".remove-priview-server").on('click',function(){
        if(!confirm('<?= __('user.are_you_sure') ?>')) return false;
        $(this).parents("tr").remove();
    })

    $('input[name="product_type"]').on('change',function(){
        var val = $(this).val();
        if(val == 'downloadable'){ 
        	$('.downloadable_file_div').show(); 
        	$('.allow_shipping-option').hide(); 
        }
        else{ 
        	$('.downloadable_file_div').hide(); 
        	$('.allow_shipping-option').show(); 
        }
    });
</script>
				