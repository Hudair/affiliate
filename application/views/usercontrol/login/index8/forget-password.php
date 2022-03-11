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
    
    <link href="<?= base_url('assets/login/index8') ?>/css/bootstrap.min.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index8') ?>/css/common.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index8') ?>/css/custom.css?v=<?= av() ?>" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/login/index8') ?>/css/theme-06.css?v=<?= av() ?>" rel="stylesheet">

    <script src="<?= base_url('assets/login/index8') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/login/index8') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/login/index8') ?>/js/main.js"></script>
    <script src="<?= base_url('assets/login/index8') ?>/js/demo.js"></script>
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
                    <div class="container py-3">
                        <div class="login-card-wrapper shadow-lg">
                            <div class="row bg-white">
                                <div class="affiliate-description col-lg-6 px-0 order-lg-first order-last">
                                    <div class="paragraph-container p-5">
                                        <div class="forny-logo">
                                            <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['front_custom_logo_size']) ? 'class="customLogoClass"' : '' ?> alt="<?= __('front.logo') ?>">
                                        </div>
                                        <br>
                                        <h3><?= $setting['heading'] ?></h3>
                                        <br>
                                        <?= $setting['content'] ?>
                                        <br>
                                    </div>
                                </div>
                                <div class="forny-form col-lg-6">
            	                    <div class="forget-forms">
            		                    <div class="reset-form d-block">
            		                        <form class="reset-password-form">
            		                            <h4 class="mb-5"><?= __('user.reset_password') ?></h4>
            		                            <p class="mb-10">
            		                                <?= __('user.Please_enter_your_email_address_and_we_will_send_you_a_password_password_link') ?>
            		                            </p>
            		                            <div class="form-group">
            		                                <div class="input-group">
            		                                    <input class="form-control" name="email" placeholder="<?= __('user.email') ?>" type="email">
            		                                </div>
            		                            </div> 
            		                            <div class="row">
            		                                <div class="col-md-12">
            		                                    <button class="btn btn-submit btn-primary btn-block"><?= __('user.send_reset_link') ?></button>
            		                                    <button type="button" onclick="window.location='<?= base_url() ?>'" class="btn btn-block"><?= __('user.back_to_login') ?></button>
            		                                </div>
            		                            </div>
            		                        </form>
            		                    </div>
            		                </div>
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

    $('.reset-password-form').on('submit',function(){
        $this = $(this);

        $.ajax({
            url:'<?= base_url('auth/forget') ?>',
            type:'POST',
            dataType:'json',
            data: $this.serialize(),
            success:function(json){
                $this.find(".has-error").removeClass("has-error");
                $this.find("span.text-danger,.success-msg").remove();
                
                if(json['success']){
                    $this.find('[name="email"]').after("<div class='alert success-msg alert-success'> " + json['success'] + "</div>");
                }

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