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
                <div class="boxx" id="login">
                    <form method="POST" action="" id="login-form">
                        <div class="logo">
                            <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['front_custom_logo_size']) ? 'class="customLogoClass"' : '' ?> alt="<?= __('front.logo') ?>">
                        </div>
                        <div class="row">
                            <div class="col-12 text-center"><?= $title ?></div>
                        </div>
                        <br>
                        <div class="input-box">
                            <img class="icon" src="<?= base_url('assets/login/index3') ?>/image/user.png" alt="<?= __('front.icon') ?>">
                            <input type="text" class="box" name="username" placeholder="<?= __('front.username_email') ?>"><br>
                        </div>

                        <div class="input-box">
                            <img class="icon" src="<?= base_url('assets/login/index3') ?>/image/padlock.png" alt="<?= __('front.icon') ?>">
                            <input type="password" class="box" name="password" id="loginpassowrd" value="" placeholder="<?= __('front.password') ?>">
                        </div>  

                        <div>
                            <?php if (isset($googlerecaptcha['affiliate_login']) && $googlerecaptcha['affiliate_login']) { ?>
                                <div class="captch  mb-3">
                                    <script src='https://www.google.com/recaptcha/api.js'></script>
                                    <div class="g-recaptcha" data-sitekey="<?= $googlerecaptcha['sitekey'] ?>"></div>
                                </div>
                            <?php } ?>
                        </div>                      

                        <button class="button btn-submit" type="submit" ><?= __('front.login') ?></button>
                        <p class="text forget-text">
                            <a href="<?= base_url('forget-password') ?>"><?= __('front.forget_password') ?>?</a>
                        </p>
                        <?php if($store['registration_status'] && 
                                    ($store['registration_status'] != 2 || $vendor_storestatus['storestatus'])): ?>
                            <p class="text"><?= __('front.dont_have_an_account') ?>
                                <a href="<?= base_url('register') ?>"><?= __('front.register') ?></a> 
                            </p>
                        <?php endif ?>
                    </form>
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
