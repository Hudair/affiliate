<?php 
include(APPPATH.'/views/usercontrol/login/multiple_pages/header.php');
$login_content = $theme_settings[0]->login_content;
$login_img = $theme_settings[0]->login_img;
?>

<?php 
if ($login_img != '' || !empty($login_img)) { 
    $image_link =  base_url().'assets/images/theme_images/'.$login_img;
}else{ 
    $image_link =  base_url('assets/login/multiple_pages/img/login-bg.jpg');
} 
?>  
 
    <a href="<?= base_url('/'); ?>" class="btn-orage back-to-home"><?= __('front.back_to_homepage') ?></a>


        <div class="login-hero-area d-flex align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 banner-bg" style="background: url('<?php echo  $image_link;?>');">
                    <div class="login-info text-center">
                        <?php if($store['registration_status'] && 
                                ($store['registration_status'] != 2 || $vendor_storestatus['storestatus'])): ?>
                            <img src="<?= base_url('assets/login/multiple_pages/img/question.png'); ?>" 
                                alt="<?= __('front.question') ?>">
                            <h1><?= __('front.dont_have_an_account_yet') ?></h1>
                            <a href="<?= site_url('/register') ?>"><?= __('front.sign_up_new') ?></a>
                        <?php endif ?>
                    </div>
                </div>
                <div class="col-lg-6 form-gray-bg">
                    <div class="form-inner">
                       <div class="row justify-content-center">
                           <div class="col-lg-6">
                                <div class="login-form text-center">
                                    <div class="logo mt-4"><img src="<?= $logo; ?>" alt="<?= __('front.logo') ?>" <?= ($site_setting['custom_logo_size'] == 1) ? "style='height:".$site_setting['log_custom_height']."px;max-height:".$site_setting['log_custom_height']."px;min-height:".$site_setting['log_custom_height']."px;width:".$site_setting['log_custom_width']."px;max-width:".$site_setting['log_custom_width']."px;min-width:".$site_setting['log_custom_width']."px;'" : "" ?>></div>
                                    <form id="login-form" autocomplete="off">
                                        <div class="form-group input-group">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text"><i class="user-icon"></i></div>
                                            </span>
                                            <input class="form-control py-2" type="text" name="username" placeholder="<?= __('front.username_email') ?>" autocomplete="off">
                                        </div>                                    
                                        <div class="form-group input-group">
                                            <span class="input-group-prepend">
                                                <div class="input-group-text"><i class="password-icon"></i></div>
                                            </span>
                                            <input class="form-control py-2" type="password" name="password" placeholder="*************" autocomplete="off">
                                        </div>
                                        <?php if (isset($googlerecaptcha['affiliate_login']) && $googlerecaptcha['affiliate_login']) { ?>
                                        <div class="captch mb-3">
                                            <script src='https://www.google.com/recaptcha/api.js'></script>
                                            <div class="g-recaptcha" data-sitekey="<?= $googlerecaptcha['sitekey'] ?>"></div>
                                        </div>
                                        <?php } ?>
                                        <input class="btn-submit" type="submit" value="<?= __('front.login') ?>">
                                    </form>
                                    <a href="<?= base_url('/forget-password') ?>"><?= __('front.forgot_your_password') ?></a>
                                </div>
                           </div>
                       </div>
                       <div class="form-description text-center" id="scrollbar">
                            <p><?= (!empty($login_content)) ? $login_content : __('front.login_content_if_not_exist');?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include(APPPATH.'/views/usercontrol/login/multiple_pages/footer.php'); ?>
    <script type="text/javascript">
        (function ($) {
    $.fn.btn = function (action) {
    var self = $(this);
    if (action == 'loading') { $(self).addClass("btn-loading"); }
    if (action == 'reset') { $(self).removeClass("btn-loading"); }
    }
    })(jQuery);
    var grecaptcha = undefined;
    $('#login-form').on('submit',function(){
    $this = $(this);
    $.ajax({
    url:'<?= base_url('auth/login') ?>',
    type:'POST',
    dataType:'json',
    data: $this.serialize() + '&type=user',
    beforeSend:function(){ $this.find(".btn-submit").btn("loading"); },
    complete:function(){ $this.find(".btn-submit").btn("reset"); },
    success:function(json){
    $this.find(".is-invalid").removeClass("is-invalid");
    $this.find(".has-error").removeClass("has-error");
    $this.find("span.invalid-feedback").remove();
    if(json['errors']){
    $.each(json['errors'], function(i,j){
    if(i == 'captch_response' && grecaptcha){ grecaptcha.reset(); }
    $ele = $this.find('[name="'+ i +'"]');
    if($ele){
    $formGroup = $ele.parents(".form-group");
    $ele.addClass("is-invalid");
    if($formGroup.find(".input-group").length){
    $formGroup.find(".input-group").after("<span class='invalid-feedback'>"+ j +"</span>");
    } else {
    $ele.after("<span class='invalid-feedback'>"+ j +"</span>");
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