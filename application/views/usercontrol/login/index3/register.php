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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <meta name="author" content="<?= $meta_author ?>">
    <meta name="keywords" content="<?= $meta_keywords ?>">
    <meta name="description" content="<?= $meta_description ?>">

    
    <link href="<?= base_url('assets/login/index3') ?>/css/bootstrap.min.css?v=<?= av() ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/index3') ?>/css/flags.css?v=<?= av() ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/login/index3') ?>/css/style.css?v=<?= av() ?>">
    <link rel="stylesheet" href="<?= base_url('assets/login/index3') ?>/css/toastr.min.css?v=<?= av() ?>">

    <script src="<?= base_url('assets/login/index2') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/login/index3') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/login/index3') ?>/js/jquery.dd.min.js"></script>
    <script src="<?= base_url('assets/login/index3') ?>/js/toastr.min.js"></script>
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
    <div class="login-box">
        <?php if($store['language_status']){ ?>
            <div class="language-changer"> <?= $LanguageHtml ?></div>
        <?php } ?>

        <div class="left-side">
            <div class="outer" id="outer">
                <div class="boxx" id="register">
                    <div class="logo">
                        <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['custom_logo_size'] == 1) ? "style='height:".$SiteSetting['log_custom_height']."px;max-height:".$SiteSetting['log_custom_height']."px;min-height:".$SiteSetting['log_custom_height']."px;width:".$SiteSetting['log_custom_width']."px;max-width:".$SiteSetting['log_custom_width']."px;min-width:".$SiteSetting['log_custom_width']."px;'" : '' ?> alt="<?= __('front.logo') ?>">
                    </div>
                    <?= $register_fomm ?>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="right-side">
            <img src="<?= base_url('assets/login/index3') ?>/image/group.png" alt="<?= __('front.image') ?>">
            <div class="affiliate-description">
            </div>
        </div>
    </div>
</body>
</html>
