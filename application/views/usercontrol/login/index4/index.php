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
    
    <link href="<?= base_url('assets/login/index4') ?>/css/bootstrap.min.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index4') ?>/css/common.css?v=<?= av() ?>" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/login/index4') ?>/css/theme-06.css?v=<?= av() ?>" rel="stylesheet">

    <script src="<?= base_url('assets/login/index4') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/login/index4') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/login/index4') ?>/js/main.js"></script>
    <script src="<?= base_url('assets/login/index4') ?>/js/demo.js"></script>
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
                <div>
                    <div class="forny-form">
                    	<div class="login-reg-form">
	                        <ul class="nav nav-tabs" role="tablist">
	                            <li class="nav-item">
	                                <a class="nav-link active bg-transparent" href="<?= base_url() ?>">
	                                    <span><?= __('front.login') ?></span>
	                                </a>
	                            </li>
	                            <?php if($store['registration_status'] && 
                                    		($store['registration_status'] != 2 || $vendor_storestatus['storestatus'])): ?>
		                            <li class="nav-item">
		                                <a class="nav-link bg-transparent" href="<?= base_url('register') ?>">
		                                    <span><?= __('front.register') ?></span>
		                                </a>
		                            </li>
		                        <?php endif ?>
	                        </ul>
                            <p class="mt-6 mb-6">
                                <?= __('front.Use_your_credentials_to_login_into_account') ?>
                            </p>
                            <form id="login-form">

                                <div class="form-group">

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
                                                    <g transform="translate(0)">
                                                        <path d="M23.983,101.792a1.3,1.3,0,0,0-1.229-1.347h0l-21.525.032a1.169,1.169,0,0,0-.869.4,1.41,1.41,0,0,0-.359.954L.017,115.1a1.408,1.408,0,0,0,.361.953,1.169,1.169,0,0,0,.868.394h0l21.525-.032A1.3,1.3,0,0,0,24,115.062Zm-2.58,0L12,108.967,2.58,101.824Zm-5.427,8.525,5.577,4.745-19.124.029,5.611-4.774a.719.719,0,0,0,.109-.946.579.579,0,0,0-.862-.12L1.245,114.4,1.23,102.44l10.422,7.9a.57.57,0,0,0,.7,0l10.4-7.934.016,11.986-6.04-5.139a.579.579,0,0,0-.862.12A.719.719,0,0,0,15.977,110.321Z" transform="translate(0 -100.445)"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>

                                        <input required  class="form-control" name="username" placeholder="<?= __('front.username_email') ?>">

                                    </div>
                                </div>


                                <div class="form-group password-field">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" viewBox="0 0 16 24">
                                                    <g transform="translate(0)">
                                                        <g transform="translate(5.457 12.224)">
                                                            <path d="M207.734,276.673a2.543,2.543,0,0,0-1.749,4.389v2.3a1.749,1.749,0,1,0,3.5,0v-2.3a2.543,2.543,0,0,0-1.749-4.389Zm.9,3.5a1.212,1.212,0,0,0-.382.877v2.31a.518.518,0,1,1-1.035,0v-2.31a1.212,1.212,0,0,0-.382-.877,1.3,1.3,0,0,1-.412-.955,1.311,1.311,0,1,1,2.622,0A1.3,1.3,0,0,1,208.633,280.17Z" transform="translate(-205.191 -276.673)"/>
                                                        </g>
                                                        <path d="M84.521,9.838H82.933V5.253a4.841,4.841,0,1,0-9.646,0V9.838H71.7a1.666,1.666,0,0,0-1.589,1.73v10.7A1.666,1.666,0,0,0,71.7,24H84.521a1.666,1.666,0,0,0,1.589-1.73v-10.7A1.666,1.666,0,0,0,84.521,9.838ZM74.346,5.253a3.778,3.778,0,1,1,7.528,0V9.838H74.346ZM85.051,22.27h0a.555.555,0,0,1-.53.577H71.7a.555.555,0,0,1-.53-.577v-10.7a.555.555,0,0,1,.53-.577H84.521a.555.555,0,0,1,.53.577Z" transform="translate(-70.11)"/>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>

                                        <input required  type="password" class="form-control" name="password" id="loginpassowrd" value="" placeholder="<?= __('front.password') ?>">
                                        <div class="input-group-append cursor-pointer">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16">
                                                    <g transform="translate(0 0)">
                                                        <g transform="translate(0 0)">
                                                            <path d="M23.609,117.568a15.656,15.656,0,0,0-5.045-4.859,12.823,12.823,0,0,0-6.38-1.811c-.062,0-.309,0-.371,0a12.823,12.823,0,0,0-6.38,1.811,15.656,15.656,0,0,0-5.045,4.859,2.464,2.464,0,0,0,0,2.658,15.656,15.656,0,0,0,5.045,4.859,12.822,12.822,0,0,0,6.38,1.811c.062,0,.309,0,.371,0a12.823,12.823,0,0,0,6.38-1.811,15.656,15.656,0,0,0,5.045-4.859A2.464,2.464,0,0,0,23.609,117.568Zm-17.74,6.489a14.622,14.622,0,0,1-4.712-4.538,1.155,1.155,0,0,1,0-1.245,14.621,14.621,0,0,1,4.712-4.538,12.747,12.747,0,0,1,1.586-.79,8.964,8.964,0,0,0,0,11.9A12.748,12.748,0,0,1,5.869,124.057ZM12,125.75c-3.213,0-5.827-3.074-5.827-6.853s2.614-6.853,5.827-6.853,5.827,3.074,5.827,6.853S15.211,125.75,12,125.75Zm10.841-6.23a14.621,14.621,0,0,1-4.712,4.538,12.737,12.737,0,0,1-1.585.788,8.964,8.964,0,0,0,0-11.9,12.74,12.74,0,0,1,1.587.791,14.622,14.622,0,0,1,4.712,4.538A1.155,1.155,0,0,1,22.839,119.52Z" transform="translate(0.002 -110.897)"/>
                                                        </g>
                                                        <g transform="translate(9.565 5.565)">
                                                            <path d="M205.24,202.8a2.435,2.435,0,1,0,2.435,2.435A2.438,2.438,0,0,0,205.24,202.8Zm0,3.917a1.482,1.482,0,1,1,1.482-1.482A1.483,1.483,0,0,1,205.24,206.721Z" transform="translate(-202.805 -202.804)"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div>
		                            <?php if (isset($googlerecaptcha['affiliate_login']) && $googlerecaptcha['affiliate_login']) { ?>
		                                <div class="captch mb-3">
		                                    <script src='https://www.google.com/recaptcha/api.js'></script>
		                                    <div class="g-recaptcha" data-sitekey="<?= $googlerecaptcha['sitekey'] ?>"></div>
		                                </div>
		                            <?php } ?>
		                        </div> 

                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary btn-submit btn-block"><?= __('front.login') ?></button>
                                    </div>
                                    <div class="col-6 d-flex align-items-center justify-content-end">
                                        <a href="<?= base_url('forget-password') ?>"><?= __('front.forget_password') ?>?</a>
                                    </div>
                                </div>
                            </form>
	                    </div>
                    </div>
                </div>
                <div class="right-pane">
                    <div class="text-center">
                        <div class="forny-logo">
                            <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['front_custom_logo_size']) ? 'class="customLogoClass"' : '' ?> alt="<?= __('front.logo') ?>">
                        </div>
                        <br>
                        <div class="mt-8">
                            <h4 class="mb-4"><?= $title ?></h4>
                        <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                $formGroup.find(".input-group").after("<span class='bg-white text-left d-block text-danger'>"+ j +"</span>");
                            } else {
                                $ele.after("<span class='bg-white text-left d-block text-danger'>"+ j +"</span>");
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