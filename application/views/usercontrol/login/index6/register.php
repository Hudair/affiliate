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
    
    <link href="<?= base_url('assets/login/index6') ?>/css/bootstrap.min.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index6') ?>/css/common.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index6') ?>/css/custom.css?v=<?= av() ?>" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/login/index6') ?>/css/theme-06.css?v=<?= av() ?>" rel="stylesheet">

    <script src="<?= base_url('assets/login/index6') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/login/index6') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/login/index6') ?>/js/main.js"></script>
    <script src="<?= base_url('assets/login/index6') ?>/js/demo.js"></script>
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
                        <div class="login-card-wrapper">
                            <div class="row">
                                <div class="affiliate-description col-lg-6">
                                    <div class="image-container">
                                        <div class="w-100 paragraph-container">
                                            <div class="forny-logo">
                                                <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['front_custom_logo_size']) ? 'class="customLogoClass"' : '' ?> alt="<?= __('front.logo') ?>">
                                            </div>
                                            <br>
                                            <h3><?= $setting['heading'] ?></h3>
                                            <br>
                                            <?= $setting['content'] ?>
                                            <br>
                                        </div>
                                        <img  src="<?= base_url('assets/login/index6/img/cog.png') ?>" class="cog" alt="<?= __('front.image') ?>"/>
                                    </div>
                                </div>
                                <div class="forny-form col-lg-6">
                                	<div class="login-reg-form">
        	                            <div>
        	                                <h1 class="card-title"><?= __('front.sign_up') ?></h1>
        	                                <p class="subtitle"><?= __('front.enter_your_information_to_setup_a_new_account') ?></p>
        	                                <?= $register_fomm ?>
        	                                <a href="<?= base_url() ?>" class="toggle-sign-in btn btn-light btn-block mt-2">
                                                <?= __('front.back_to_login') ?>
                                            </a>
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
