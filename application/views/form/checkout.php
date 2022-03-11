<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="<?php echo base_url('assets/plugins/store/') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/store/') ?>/shop-homepage.css" rel="stylesheet">

  <!--  CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>fonts/fonts.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>fonts/fonts.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/placeholder-loading.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/sweetalert2.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/nouislider.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/style.css" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
    <script src="<?= base_url('assets/store/default/'); ?>js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?= base_url('assets/store/default/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/store/default/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/plugins/store/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/plugins/store/') ?>jquery.star-rating-svg.js"></script>
    <script src="<?= base_url('assets/store/default/') ?>js/nouislider.min.js"></script>
    <script src="<?= base_url('assets/store/default/') ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/plugins/') ?>mustache.js"></script>

    
<script src="<?php echo base_url('assets/plugins/store/') ?>/vendor/jquery/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/builder_layout/font-awesome.min.css') ?>">
<meta name="twitter:card" content="summary_large_image">
<?php if($fevi_icon){ ?>
	<!-- <link rel="icon" href="<?php echo base_url($fevi_icon) ?>" type="image/*" sizes="16x16"> -->
<?php } ?>
<title><?php echo $page ?></title>
<?php if($analytics != ''){ ?>
	<?= $analytics ?>
<?php } ?>

<script type="text/javascript">
  (function ($) {
    $.fn.btn = function (action) {
        var self = $(this);
        if (action == 'loading') {
            if ($(self).attr("disabled") == "disabled") {
                //e.preventDefault();
            }
            $(self).attr("disabled", "disabled");
            $(self).attr('data-btn-text', $(self).html());
            $(self).html('<i class="fa fa-spinner fa-spin"></i> ' + $(self).text());
        }
        if (action == 'reset') {
            $(self).html($(self).attr('data-btn-text'));
            $(self).removeAttr("disabled");
        }
    }
})(jQuery);
</script>
</head>
<body style="padding-top: 0;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<ul class="list-inline float-right mb-0">
					<li class="list-inline-item dropdown">
						<?= $LanguageHtml ?>
					</li>
					<li class="list-inline-item dropdown">
						<?= $CurrencyHtml ?>
					</li>
					<?php if($is_logged) { ?>
					<li class="list-inline-item dropdown login-icon">
						<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
						aria-haspopup="false" aria-expanded="false">
		                    <?php $avatar = $is_logged['avatar'] != '' ? $is_logged['avatar'] : '../no-user_image.jpg' ; ?>
	                    	<img src="<?php echo base_url('assets/images/users/'. $avatar);?>" class="thumbnail user-img" border="0" width="25" height="25">
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
							<div class="dropdown-item noti-title">
								<span><?php echo $is_logged['firstname'] . ' ' . $is_logged['lastname'] ?></span>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="container" id="body-checkout">
		<div class="row ">
			<div class="col-md-12 offset-md-0 col-lg-8 offset-lg-2 box-body dynamic-content-body">
				<h1 class="page_heading text-center"><?php echo $page ?></h1>
				<?php echo $description ?>
			</div>
			<div class="col-md-12 offset-md-0 col-lg-8 offset-lg-2 box-body">
				<div class="clearfix"><br></div>
			    <div class="row">
			        <div class="col-sm-12">
						<div class="checkout-setp cart-step">
							<div class="step-head"><h4> PURCHASE OF DETAILS</h4></div>
							<div class="step-body">
								<div class="cart-loader"></div>
								<div class="cart-body"></div>
							</div>
							<div class="step-footer"></div>
						</div>
						<?php if(!$is_logged){ ?>
						<div class="checkout-setp auth-step">
							<div class="step-head"><h4>PERSONAL DETAILS</h4></div>
							<div class="step-body">
								<div class="row">
									<div class="col-10 offset-1 col-sm-8 offset-sm-2 text-center">
										<ul class="nav nav-pills">
										  	<li class="nav-item login">
										    	<a class="nav-link" data-toggle="pill" href="#login">Log in</a>
										  	</li>
										  	<li class="login-or-register">
										  		Or
										  	</li>
										  	<li class="nav-item register">
										    	<a class="nav-link active" data-toggle="pill" href="#register">Register</a>
										  	</li>
										</ul>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-8 offset-sm-2">
										<div class="tab-content">
										  	<div class="tab-pane container" id="login">
												<h5 class="sub-title">Login With Existing Account</h5>
												<form id="login-form">
													<div class="form-group">
														<!-- <label class="control-label">Username</label> -->
														<input class="form-control" name="username" placeholder="Username" type="text">
													</div>
													<div class="form-group">
														<!-- <label class="control-label">Password</label> -->
														<input class="form-control" name="password" placeholder="Password" type="password">
													</div>
													<div class="form-group text-right">
														<button class="btn btn-primary btn-submit">Login</button>
													</div>
												</form>
										  	</div>
										  	<div class="tab-pane container active" id="register">
												<h5 class="sub-title">Create a new account</h5>
												<form id="register-form">
													<div class="form-group">
														<!-- <label class="control-label">First Name</label> -->
														<input class="form-control" name="f_name" placeholder="First Name" type="text">
													</div>
													<div class="form-group">
														<!-- <label class="control-label">Last Name</label> -->
														<input class="form-control" name="l_name" placeholder="Last Name" type="text">
													</div>
													<div class="form-group">
														<!-- <label class="control-label">Username</label> -->
														<input class="form-control" name="username" placeholder="Username" type="text">
													</div>
													
													<div class="form-group">
														<!-- <label class="control-label">Email</label> -->
														<input class="form-control" name="email" placeholder="Email" type="email">
													</div>
													<div class="form-group">
														<!-- <label class="control-label">Password</label> -->
														<input class="form-control" name="password" placeholder="Password" type="password">
													</div>
													<div class="form-group">
														<!-- <label class="control-label">Confirm Password</label> -->
														<input class="form-control" name="c_password" placeholder="Confirm Password" type="password">
													</div>
													<div class="form-group text-right">
														<button class="btn btn-primary btn-submit">Register</button>
													</div>
												</form>
										  	</div>
										</div>
									</div>
								</div>
							</div>
							<div class="step-footer"></div>
						</div>
						<?php } ?>
						<?php if($is_logged){ ?>

						<div class="non-confirm">
							<?php if($allow_shipping){ ?>
							<div class="checkout-setp shipping-step">
								<div class="step-head"><h4>SHIPPING DETAILS</h4></div>
								<div class="step-body">
									<div class="cart-loader"></div>
									<div class="cart-body"></div>
								</div>
								<div class="step-footer"></div>
							</div>
							<?php } ?>
							<div class="checkout-setp">
								<div class="step-head"><h4>PAYMENT DETAILS</h4></div>
								<div class="step-body">
									<div class="dynamic-payment"></div>
									<br>
									<?php if($allow_upload_file){ ?>
										<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.uploadPreviewer.css') ?>">
										<div class="form-group downloadable_file_div well" style="white-space: inherit;">
											<div class="file-preview-button btn btn-primary">
									            <?= __('store.order_upload_file') ?>
									            <input type="file" class="downloadable_file_input" multiple="">
									        </div>
									        <div id="priview-table" class="table-responsive" style="display: none;">
									            <table class="table table-hover">
									                <tbody></tbody>
									            </table>
									        </div>
									    </div>
									<?php } ?>
									<div class="checkbox">
										<label>
											<input type="checkbox" value="1" name="agree">
											<?= __('store.agree_text') ?>
										</label>
									</div>
									<br><div class="warning-div"></div>
								</div>
								<div class="step-footer">
									<button class="btn btn-info confirm-order"><?= __('store.confirm_and_pay') ?></button>
								</div>
							</div>
						</div>
						<div class="confirm-checkout">
							<div class="checkout-setp confirm-step">
								<div class="step-head">
									<h4><?= __('store.confirm_order') ?></h4>
								</div>
								<div class="step-body">
									<div class="">
										<div id="checkout-confirm"></div>
										
									</div>
								</div>
								<div class="step-footer"></div>
							</div>
						</div>
						<?php } ?>

			        </div>
			    </div>
			</div>
		</div>
	</div>
    <footer class="bg-dark">
      	<div class="container">
        	<p class="m-0 text-center text-white"><?php echo $footer ?></p>
      	</div>
    </footer>
<script type="text/javascript">


		$(".cart-step").delegate(".btn-remove-cart","click",function(){
			$this = $(this);
			$.ajax({
				url:$this.attr("data-href"),
				type:'POST',
				dataType:'json',
				beforeSend:function(){},
				complete:function(){},
				success:function(json){
					getCart($('select[name="country"]').val());			
				},
			})
			return false;
		});
		//$(".cart-step").delegate("#checkout-cart-form","submit",function(){
		var xhr;
		$(".cart-step").delegate(".qty-input","change",function(){
			if(xhr && xhr.readyState != 4) xhr.abort();
			$this = $(this);
			xhr = $.ajax({
				url:'<?= $cart_update_url ?>',
				type:'POST',
				dataType:'json',
				data:$("#checkout-cart-form").serialize(),
				beforeSend:function(){},
				complete:function(){},
				success:function(json){
					getCart($('select[name="country"]').val());
				},
			})
			return false;
		})
		$('[name="payment_gateway"]').on('change',function(){
			if($(this).val() == 'bank_transfer'){
				$('.bank-transfer-instruction').slideDown();
			}else{
				$('.bank-transfer-instruction').slideUp();
			}
		});
		$(".cart-step").delegate(".submit-coupon","click",function(){
			$this = $(this);
			$('.error-coupon-msg').text('');
			$.ajax({
				url:'<?= base_url('form/add_coupon') ?>',
				type:'POST',
				dataType:'json',
				data:{
					coupon_code : $('.coupon_code').val()
				},
				beforeSend:function(){$this.btn("loading");},
				complete:function(){$this.btn("reset");},
				success:function(json){
					if(json.error){
						$('.error-coupon-msg').text(json.error);
						return false;
					}else{
						getCart($('select[name="country"]').val());
					}
				},
			})
			return false;
		})
		function getCart(countryId= null) {
			if(countryId != null) {
				$(".cart-step .cart-body").load('<?= base_url('form/checkout_cart') ?>/'+countryId);
			} else {
				$(".cart-step .cart-body").load('<?= base_url('form/checkout_cart') ?>');
			}
		}


		function getShipping(countryCode = null) {
			if(countryCode != null) {
				$(".shipping-step .cart-body").load('<?= base_url('form/checkout_shipping') ?>/'+countryCode);
			} else {
				$(".shipping-step .cart-body").load('<?= base_url('form/checkout_shipping') ?>');
			}
		}

		function getConfirm() {
			$("#checkout-confirm").load('<?= base_url('form/checkout_confirm') ?>');
		}
		var formDataFilter = function(formData) {
            if (!(window.FormData && formData instanceof window.FormData)) return formData
            if (!formData.keys) return formData
            var newFormData = new window.FormData()
            Array.from(formData.entries()).forEach(function(entry) {
                var value = entry[1]
                if (value instanceof window.File && value.name === '' && value.size === 0) {
                    newFormData.append(entry[0], new window.Blob([]), '')
                } else {
                    newFormData.append(entry[0], value)
                }
            })
            
            return newFormData
        }
        function getPaymentMethods(){
			$.ajax({
				url:'<?= base_url('store/get_payment_mothods') ?>',
				type:'POST',
				dataType:'json',
				data:{
					data:$("#checkout-cart-form").serialize(),
				},
				beforeSend:function(){},
				complete:function(){},
				success:function(json){
					$(".dynamic-payment").html(json['html']);
				},
			})
		}
		$(document).on('ready',function(){
			//getCart();getShipping();getConfirm();getPaymentMethods();
		});

		getCart();getShipping();getConfirm();getPaymentMethods();

		function backCheckout(){
			$("#checkout-confirm").html('');
			$(".confirm-checkout").hide();
			$(".non-confirm").show();
		}
		
		$(".confirm-order").on('click',function(){
			$this = $(this);
			$container = $(".checkout-setp");

			var formData = new FormData();
			$container.find("input[type=text],input[type=file],select,input[type=checkbox]:checked,input[type=radio]:checked,textarea").each(function(i,j){
				
				formData.append($(j).attr("name"),$(j).val());	
			})

			formData.append('is_form',1);	
			if(typeof fileArray != 'undefined'){
				$.each(fileArray, function(i,j){ formData.append("downloadable_file[]", j.rawData); });
			}
			
			formData = formDataFilter(formData);

			$.ajax({
				url:'<?= base_url("store/confirm_order") ?>',
				type:'POST',
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
				beforeSend:function(){$this.btn("loading");},
				complete:function(){$this.btn("reset");},
				success:function(result){
					$container.find(".has-error").removeClass("has-error");
					$container.find("span.text-danger,.alert-danger").remove();
					$('.loading-submit').hide();
                    if(IsJsonString(result)){
                    	var result = $.parseJSON(result);
    					if(result['success']){}
    					if(result['confirm']){
    						$("#checkout-confirm").html(result['confirm']);
    						$(".confirm-checkout").show();
    						$(".non-confirm").hide();
    					}
    					if(result.error){
    						$(".warning-div").html('<div class="alert alert-danger">'+ result['error'] +'</div>');
    					}
    					if(result['errors']){
    					    $.each(result['errors'], function(i,j){
    					        $ele = $container.find('[name="'+ i +'"]');
    					        if($ele){
    					            $ele.parents(".form-group").addClass("has-error");
    					            $ele.after("<span class='text-danger'>"+ j +"</span>");
    					        }
    					    })
    					}
    				} else {
    				    $("#checkout-confirm").html(result);
						$(".confirm-checkout").show();
						$(".non-confirm").hide();
    				}
				},
			})
		});


		function IsJsonString(str) {
            try {
                JSON.parse(str);
            } catch (e) {
                return false;
            }
            return true;
        }
			
		$("#login-form").on('submit',function(){
			$this = $(this);
			$.ajax({
				url:'<?= base_url("form/ajax_login") ?>',
				type:'POST',
				dataType:'json',
				data:$this.serialize(),
				beforeSend:function(){$this.find(".btn-submit").btn("loading");},
				complete:function(){$this.find(".btn-submit").btn("reset");},
				success:function(result){
					$this.find(".has-error").removeClass("has-error");
					$this.find("span.text-danger").remove();
					
					if(result['success']){
						$(".auth-step").remove();
						//getShipping();
						location.reload();
					}
					if(result['errors']){
					
					    $.each(result['errors'], function(i,j){
					        $ele = $this.find('[name="'+ i +'"]');
					        if($ele){
					            $ele.parents(".form-group").addClass("has-error");
					            $ele.after("<span class='text-danger'>"+ j +"</span>");
					        }
					    })
					}
				},
			})
			return false;
		})
		$("#register-form").on('submit',function(){
			$this = $(this);
			$.ajax({
				url:'<?= base_url("form/ajax_register") ?>',
				type:'POST',
				dataType:'json',
				data:$this.serialize(),
				beforeSend:function(){$this.find(".btn-submit").btn("loading");},
				complete:function(){$this.find(".btn-submit").btn("reset");},
				success:function(result){
					$this.find(".has-error").removeClass("has-error");
					$this.find("span.text-danger").remove();
					if(result['success']){
						$(".auth-step").remove();
						location.reload();
					}
					
					if(result['errors']){
					    $.each(result['errors'], function(i,j){
					        $ele = $this.find('[name="'+ i +'"]');
					        if($ele){
					            $ele.parents(".form-group").addClass("has-error");
					            $ele.after("<span class='text-danger'>"+ j +"</span>");
					        }
					    })
					}
				},
			})
			return false;
		})
		$(document).delegate(".number-input div span","click",function(){
            var val = $(this).parents(".number-input").find("input").val();
            if($(this).hasClass("plus")) { val ++ }
            else { val -- }
            if(val <= 0) val = 1;
            $(this).parents(".number-input").find("input").val(val).trigger("change")
        })

		var selected_state = '<?= isset($shipping) ? $shipping->state_id : '' ?>';
		
		$(document).delegate('[name="country"]',"change",function(){
			$this = $(this);
			let countryCode = $(this).val();	
			getShipping(countryCode);
		})

		function renderStateAndCart(countryId) {
			$.ajax({
				url:'<?= base_url('form/getState') ?>',
				type:'POST',
				dataType:'json',
				data:{id:countryId},
				success:function(json){
					var html = '<option value="">Select State</option>';
					$.each(json['states'], function(i,j){
						var s = '';
						if(selected_state && selected_state == j['id']){
							s = 'selected';
						}
						html += "<option "+ s +" value='"+ j['id'] +"'>"+ j['name'] +"</option>";
					})
					$('[name="state"]').html(html);
					getCart(countryId);
				},
			})

		}

		var iframes = $('#body-checkout .dynamic-content-body').find('iframe');
		$.each(iframes, function(i,v){
		   $(v).before($('<div class="videoWrapper">'+ v.outerHTML +'</div>'));
		$(v).remove();
		})
	</script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="<?php echo base_url('assets/plugins/store/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	
	<script>
    <?php
        if(isset($_SESSION['setLocalStorageAffiliateAjax'])) {
            $setLocalStorageAffiliateAjax = json_decode($_SESSION['setLocalStorageAffiliateAjax']);
            $_SESSION['localStorageAffiliate'] = (int) $setLocalStorageAffiliateAjax[0];
            ?>
            var setLocalStorageAffiliateAjax = <?= $_SESSION['setLocalStorageAffiliateAjax'] ?>;
            setWithExpiry("affiliate_id", setLocalStorageAffiliateAjax[0], setLocalStorageAffiliateAjax[1]);
            <?php
            
            unset($_SESSION['setLocalStorageAffiliateAjax']);
        }
    ?>

    function setWithExpiry(key, value, ttl) {
    	const now = new Date()
    	const item = {
    		value: value,
    		expiry: now.getTime() + ttl,
    	}
    	localStorage.setItem(key, JSON.stringify(item))
    }
    
    function getWithExpiry(key) {
    	const itemStr = localStorage.getItem(key)
    
    	if (!itemStr) {
    		return 1
    	}
    
    	const item = JSON.parse(itemStr)
    	const now = new Date()
    
    	if (now.getTime() > item.expiry) {
    		localStorage.removeItem(key)
    		return 1
    	}
    	return item.value
    }
</script>
	</body>
</html>
