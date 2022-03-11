<?php if($design) { echo str_replace('contenteditable', '', $design); }else{
?>
<?php
$db =& get_instance();
$products = $db->Product_model;

$LanguageHtml = $products->getLanguageHtml('usercontrol');
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?= $title ?></title>
    <meta name="author" content="<?= $meta_author ?>">
    <meta name="keywords" content="<?= $meta_keywords ?>">
    <meta name="description" content="<?= $meta_description ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($SiteSetting['favicon']){ ?>
    <link rel="icon" href="<?php echo base_url('assets/images/site/'.$SiteSetting['favicon']) ?>" type="image/*" sizes="16x16">
    <?php } ?>
    <?php
    $csss = array(
    'bg_left'                  => array('type' => 'background', 'selectotr' => '.login100-more::before'),
    'bg_right'                 => array('type' => 'background', 'selectotr' => '.wrap-login100'),
    'footer_bf'                => array('type' => 'background', 'selectotr' => '.footer'),
    'footer_color'             => array('type' => 'color', 'selectotr' => '.footer'),
    'btn_sendmail_bg'          => array('type' => 'background', 'selectotr' => '.btn_sendmail_bg'),
    'btn_sendmail_color'       => array('type' => 'color', 'selectotr' => ".btn_sendmail_bg"),
    'btn_backlogin_bg'         => array('type' => 'background', 'selectotr' => "[data-type='login']"),
    'btn_backlogin_color'      => array('type' => 'color', 'selectotr' => "[data-type='login']"),
    'btn_forgotlink_bg'        => array('type' => 'background', 'selectotr' => '[data-type="forget"]'),
    'btn_forgotlink_color'     => array('type' => 'color', 'selectotr' => '[data-type="forget"]'),
    'btn_signin_bg'            => array('type' => 'background', 'selectotr' => '.btn_signin_bg'),
    'btn_signin_color'         => array('type' => 'color', 'selectotr' => '.btn_signin_bg'),
    'btn_signup_bg'            => array('type' => 'background', 'selectotr' => '.btn_signup'),
    'btn_signup_color'         => array('type' => 'color', 'selectotr' => '.btn_signup'),
    'btn_registersubmit_bg'    => array('type' => 'background', 'selectotr' => '.reg_form button[type=submit]'),
    'btn_registersubmit_color' => array('type' => 'color', 'selectotr' => '.reg_form button[type=submit]'),
    'heading_color' => array('type' => 'color', 'selectotr' => '.affiliate-description h1'),
    'input_text_color' => array('type' => 'color', 'selectotr' => '.input100'),
    'input_bg_color' => array('type' => 'background', 'selectotr' => '.input100'),
    'input_label_color' => array('type' => 'color', 'selectotr' => '.label-input100'),
    );
    $db =& get_instance();
    $googlerecaptcha =$db->Product_model->getSettings('googlerecaptcha');
    ?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/bootstrap.min.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/font-awesome.min.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/icon-font.min.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/material-design-iconic-font.min.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/animate.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/hamburgers.min.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/animsition.min.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/select2.min.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/daterangepicker.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/util.css?v=<?= av() ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/login/css/') ?>/main.css?v=<?= av() ?>">
    <script src="<?= base_url('assets/login/login/js/jquery-3.2.1.min.js') ?>"></script>
    <script type="text/javascript">
        var action_url = '<?= base_url('auth') ?>';
        var login_screen = '<?= isset($screen) ? $screen : "login" ?>';
        var grecaptcha = undefined;
    </script>
    <?php if($SiteSetting['google_analytics']){ echo $SiteSetting['google_analytics']; } ?>
    <?php if($SiteSetting['faceboook_pixel']){ echo $SiteSetting['faceboook_pixel']; } ?>
    <?php
    $global_script_status = (array)json_decode($SiteSetting['global_script_status'],1);
    if(in_array('front', $global_script_status)){
    echo $SiteSetting['global_script'];
    }
    ?>
    <style type="text/css">
    .login100-form-bgbtn,.login100-more::before{background:#1b6ea8;}
    <?php
    foreach ($csss as $key => $d) {
    if(isset($setting[$key]) && $setting[$key] != ''){
    echo "\n{$d['selectotr']}{";
    echo "\t {$d['type']} : ".$setting[$key]. ";" ;
    echo "}";
    }
    }
    ?>

    <?php if($SiteSetting['front_custom_logo_size']): ?>
        .customLogoClass{
            width: <?= (int) $SiteSetting['front_log_custom_height'] ?>px !important;
            height: <?= (int) $SiteSetting['front_log_custom_width'] ?>px !important;
        }
    <?php endif ?>
    </style>

    <?php if (is_rtl()) { ?>
      <!-- place here your RTL css code -->
    <?php } ?>
</head>
<body style="background-color: #999999;">
    <div class="limiter">
        <div class="container-login100">
            <div class="login100-more">
                <div class="row justify-content-center align-self-center">
                    <div class="col-10 col-sm-6">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <?php
                                $logo = base_url($SiteSetting['front-side-themes-logo'] ? 'assets/images/site/'.$SiteSetting['front-side-themes-logo'] : 'assets/vertical/assets/images/users/avatar-1.jpg');
                                ?>
                                <center><img id="logo" src="<?= $logo ?>" class="img-fluid <?= ($SiteSetting['front_custom_logo_size']) ? 'customLogoClass' : '' ?>"></center>
                            </div>
                        </div>
                        <div class="affiliate-description">
                            <br>
                            <h3><?= $setting['heading'] ?></h3>
                            <br>
                            <?= $setting['content'] ?>
                            <br>
                        </div>
                        <div class="footer">
                            <?= $footer ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <?php  if($store['language_status']){  ?>
                <div class="lang-div">
                    <?= $LanguageHtml ?>
                </div>
                <?php } ?>
                
                <form class="signin-form" >
                    <span class="login100-form-title p-b-59 signin-form-title">
                        <?= __('front.sign_in') ?>
                    </span>
                    <input type="hidden" name="type" value="user">
                    <div class="wrap-input100" data-validate="<?= __('front.username_is_required') ?>">
                        <span class="label-input100"><?= __('front.username') ?></span>
                        <input class="input100" type="text" name="username" placeholder="<?= __('front.username_email') ?>...">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100" data-validate="<?= __('front.password_is_required') ?>">
                        <span class="label-input100"><?= __('front.password') ?></span>
                        <input class="input100" type="password" name="password" placeholder="*************">
                        <span class="focus-input100"></span>
                    </div>
                    <?php if (isset($googlerecaptcha['affiliate_login']) && $googlerecaptcha['affiliate_login']) { ?>
                    <div class="captch mb-3">
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        <div class="g-recaptcha" data-sitekey="<?= $googlerecaptcha['sitekey'] ?>"></div>
                        <input type="hidden" name="captch_response" id="captch_response">
                    </div>
                    <?php } ?>
                    <div class="login-error"></div>
                    <div class="text-center p-b-10">
                        <a href="<?= base_url('forget-password') ?>" class="dis-block txt3 hov1" data-type='forget'><?= __('front.forget_password') ?> ?</a>
                        <br>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="login-buttons">
                            <button class="btn_signin_bg">
                            <?= __('front.sign_in') ?>
                            </button>
                            <?php if($store['registration_status'] && 
                                    ($store['registration_status'] != 2 || $vendor_storestatus['storestatus'])){ ?>
                            <a href="<?= base_url('register') ?>" class="btn_signup" data-type='register'>
                            <?= __('front.sign_up') ?>
                            <i class="fa fa-long-arrow-right m-l-5"></i>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="<?= base_url('assets/login/login/js/animsition.min.js') ?>"></script>
<script src="<?= base_url('assets/login/login/js/popper.js') ?>"></script>
<script src="<?= base_url('assets/login/login/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/login/login/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/login/login/js/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/login/login/js/daterangepicker.js') ?>"></script>
<script src="<?= base_url('assets/login/login/js/countdowntime.js') ?>"></script>
<script src="<?= base_url('assets/login/login/js/main.js?v=1') ?>"></script>
</body>
</html>
<?php }  ?>