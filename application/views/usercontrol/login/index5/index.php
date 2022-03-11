<!doctype html>
<html>

<head>
	<?php 
        if($SiteSetting['google_analytics']){ echo $SiteSetting['google_analytics']; }
        if($SiteSetting['faceboook_pixel']){ echo $SiteSetting['faceboook_pixel']; }
        $logo = ($SiteSetting['front-side-themes-logo'] ? 'assets/images/site/'.$SiteSetting['front-side-themes-logo'] : 'assets/vertical/assets/images/users/avatar-1.jpg');

        if($SiteSetting['favicon']){
            echo '<link rel="icon" href="'. base_url('assets/images/site/'.$SiteSetting['favicon']) .'" type="image/*" sizes="16x16">';
        }

        $global_script_status = (array)json_decode($SiteSetting['global_script_status'],1);
        if(in_array('front', $global_script_status)){ echo $SiteSetting['global_script']; }

        $db =& get_instance(); 
        $products = $db->Product_model; 
        $googlerecaptcha =$db->Product_model->getSettings('googlerecaptcha');
        $tnc =$db->Product_model->getSettings('tnc');
    ?>
    <title><?= $title ?></title>
    <meta name="author" content="<?= $meta_author ?>">
    <meta name="keywords" content="<?= $meta_keywords ?>">
    <meta name="description" content="<?= $meta_description ?>">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="<?= base_url('assets/login/index5') ?>/css/bootstrap.min.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index5') ?>/css/common.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index5') ?>/css/custom.css?v=<?= av() ?>" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/login/index5') ?>/css/theme-06.css?v=<?= av() ?>" rel="stylesheet">

    <script src="<?= base_url('assets/login/index5') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/login/index5') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/login/index5') ?>/js/main.js"></script>
    <script src="<?= base_url('assets/login/index5') ?>/js/demo.js"></script>
    <?php if($SiteSetting['front_custom_logo_size']): ?>
        <style type="text/css">
            .customLogoClass{
                width: <?= (int) $SiteSetting['front_log_custom_height'] ?>px !important;
                height: <?= (int) $SiteSetting['front_log_custom_width'] ?>px !important;
            }
        </style>
    <?php endif ?>
    
    <?php if (is_rtl()) { ?>
      <!-- place here your RTL css code -->
    <?php } ?>
</head>


<body>
	<?php if($store['language_status']){ ?>
        <div class="language-changer"> <?= $LanguageHtml ?></div>
    <?php } ?>

    <div class="forny-container">
        <div class="forny-inner">
            <div class="forny-two-pane">
                <div class="forny-form-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="forny-form col-lg-6">
                            	<div class="login-reg-form">
	                                <div class="forny-logo">
                                        <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['front_custom_logo_size']) ? 'class="customLogoClass"' : '' ?> alt="<?= __('front.logo') ?>">
                                    </div>
	                                <h1 class="card-title"><?= __('front.login') ?></h1>
	                                <p class="subtitle"><?= __('front.Use_your_credentials_to_login_into_account') ?></p>
	                                <form id="login-form">
	                                    
	                                    <input required  class="form-control" name="username" placeholder="<?= __('front.username_email') ?>">
	                                    <input required  class="form-control" type="password" name="password" id="loginpassowrd" value="" placeholder="<?= __('front.password') ?>">
	                                     <div class="d-block text-right my-3">
                                            <a  href="<?= base_url('forget-password') ?>"><?= __('front.forget_password') ?>?</a>
                                        </div>
	                                    <div>
				                            <?php if (isset($googlerecaptcha['affiliate_login']) && $googlerecaptcha['affiliate_login']) { ?>
				                                <div class="captch mb-3">
				                                    <script src='https://www.google.com/recaptcha/api.js'></script>
				                                    <div class="g-recaptcha" data-sitekey="<?= $googlerecaptcha['sitekey'] ?>"></div>
				                                </div>
				                            <?php } ?>
				                        </div> 
				                        <button class="btn btn-primary btn-submit btn-block"><?= __('front.login') ?></button>
	                                </form>
                                    <?php if($store['registration_status'] && 
                                            ($store['registration_status'] != 2 || $vendor_storestatus['storestatus'])): ?>
	                                    <p class="mb-0 subtitle d-block text-center mt-3">
                                            <?= __('front.dont_have_an_account_yet') ?>
                                            <a href="<?= base_url('register') ?>" class="toggle-sign-up"> 
                                                <?= __('front.sign_up') ?>
                                            </a>
                                        </p>
                                    <?php endif ?>
        	                    </div>
                            </div>
                            <div class="affiliate-description col-lg-6 pr-lg-auto pr-0">
                                <div class="w-100 affiliate-description-content">
                                    <br>
                                    <h3><?= $setting['heading'] ?></h3>
                                    <br>
                                    <?= $setting['content'] ?>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background-image"></div>
    </div>
</body>
</html>
<!-- START JS API Scripts -->
<script type="text/javascript">
    var grecaptcha = undefined;

    $('#login-form').on('submit',function(){
        $this = $(this);

        $.ajax({
            url:'<?= base_url('auth/login') ?>',
            type:'POST',
            dataType:'json',
            data: $this.serialize() + '&type=user',
            success:function(json){
                $this.find(".is-valid").removeClass("is-valid");
                $this.find(".has-error").removeClass("has-error");
                $this.find("span.text-danger").remove();
                
                if(json['errors']){
                    $.each(json['errors'], function(i,j){
                        if(i == 'captch_response' && grecaptcha){ grecaptcha.reset(); }

                        $ele = $this.find('[name="'+ i +'"]');
                        if($ele){
                            $formGroup = $ele.parents(".form-group");
                            $formGroup.addClass("has-error");

                            if($formGroup.find(".input-group").length){
                                $formGroup.find(".input-group").after("<span class='error-text'>"+ j +"</span>");
                            } else {
                                $ele.after("<span class='error-text'>"+ j +"</span>");
                            }
                        }
                    })
                }

                if(json['redirect']){ window.location = json['redirect']; }
            },
        })
        return false;
    });
</script>
<!-- END JS API Scripts -->