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
                <div class="boxx" id="fog-pass">
                    <div class="logo">
                        <img src="<?= base_url($logo) ?>" <?= ($SiteSetting['custom_logo_size'] == 1) ? "style='height:".$SiteSetting['log_custom_height']."px;max-height:".$SiteSetting['log_custom_height']."px;min-height:".$SiteSetting['log_custom_height']."px;width:".$SiteSetting['log_custom_width']."px;max-width:".$SiteSetting['log_custom_width']."px;min-width:".$SiteSetting['log_custom_width']."px;'" : '' ?> alt="<?= __('front.logo') ?>">
                    </div>
                    <form method="POST" action="" class="reset-password-form">
                        <input class="box " name="email" placeholder="<?= __('front.email') ?>" type="email">

                        <button class="button sign-in" type="button" onclick="window.location='<?= base_url() ?>'"><?= __('front.login') ?></button>
                        <button class="button btn-submit submit" type="submit" ><?= __('front.submit') ?></button>
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
                                $formGroup.find(".input-group").after("<span class='bg-white d-block text-danger'>"+ j +"</span>");
                            } else {
                                $ele.after("<span class='bg-white d-block text-danger'>"+ j +"</span>");
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
