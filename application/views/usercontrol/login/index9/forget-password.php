<!DOCTYPE html>
<html lang="en">

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
        $loginclient =$db->Product_model->getSettings('loginclient');
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/login/index9') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/login/index9') ?>/css/style.css">
    <link href="<?= base_url('assets/login/index8') ?>/css/common.css?v=<?= av() ?>" rel="stylesheet">
    <link href="<?= base_url('assets/login/index8') ?>/css/custom.css?v=<?= av() ?>" rel="stylesheet">
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
    <div class="container-fluid ">
        <div class="row h-100 full_height">
            <div class="col-md-6">
                <div class="row justify-content-between mt-4">
                    <a href="<?=base_url();?>" class="logo_area ml-4">
                        <img src="<?= base_url($logo);?>" class="logo_img <?= ($SiteSetting['front_custom_logo_size']) ? 'customLogoClass' : '' ?>" alt="<?= __('front.logo') ?>">
                    </a>
                    <div class="lang_dropdown rounded shadow-sm row px-2 py-1 round_btn mr-4" onclick="toggle_lang()">
                        <img src="<?=base_url().$language_selected['flag'];?>" alt="<?= __('front.flag') ?>" class="lang_img" id="lang_flag">
                        <div class="text-secondary lang_name"><span id="lang_name"><?=$language_selected['name'];?></span> <img src="<?= base_url('assets/login/index9') ?>/img/dropdown.svg" alt="arrow" class="drowdown_arrow"></div>

                        <div class="language_list d-none" id="lang_drop_down">
                            <?php
                            $x = 0;
                                foreach ($language as $language_value) {
                                    ?>
                                    <div class="language_item">
                                        <input class="lang_input language-switch" type="radio" name="lang" id="<?=$language_value['id'];?>" <?php if($language_selected['id'] == $language_value['id']){echo "checked";}?> value="en">
                                        <label for="<?=$language_value['id'];?>" id="<?=$language_value['id'];?>" onclick="cng_lang(this)">
                                            <img src="<?=base_url().$language_value['flag'];?>" alt="<?= __('front.flag') ?>"> <?=$language_value['name'];?>
                                        </label>
                                    </div>
                                    <?php
                                    $x++;
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- login page -->
                <div  class="row justify-content-center align-items-center flex-grow-1 align-items-center flex-strink-1">
                    <div class="col-md-10 form_box_1">
                        <h3 class="text-center"><?= __('front.reset_password') ?></h3>
                        <p class="mb-10">
                            <?= __('front.Please_enter_your_email_address_and_we_will_send_you_a_password_password_link') ?>
                        </p>
                        <form class="reset-password-form">
                            <div class="">
                                <input type="email" class="custom_input" name="email" placeholder="<?= __('front.email') ?>" type="email">
                            </div>
                           
                            <button 
                                class="btn continue_btn px-4 text-white round_btn d-block mx-auto btn-submit"><?= __('front.send_reset_link') ?> <img
                                    src="<?= base_url('assets/login/index9') ?>/img/arrow.svg" class="continue_img" alt="<?= __('front.arrow') ?>"></button>
                
                                    <a href="<?=base_url();?>login" class="link_ text-center"><?= __('front.back_to_login') ?></a>
                
                        </form>
                    </div>
                </div>
                <!-- sign up page -->
            </div>

            <div class="col-md-6 subscribe_box">
                <div class="row justify-content-end">
                    <button class="cross_btn d-none" onclick="show_section('input');hide_cross(this)" id="cross_btn"> &#10006;</button>
                </div>
                <div data-view-section="input"
                    class="row justify-content-center align-items-center flex-grow-1 align-items-center flex-strink-1">
                    <div class="col-md-10 form_box_1 form_box_2 extra_margin mt-2 text-center">
                        <img src="<?= base_url('assets/login/index9') ?>/img/affiliate-image.png" class="img-fluid mt-4" alt="<?= __('front.image') ?>">
                        <h1 class="text-white h3"><?= $setting['heading'] ?></h1>
                        <div class="content_area">
                        <h5 class="text-white h5"><?= $setting['content'] ?></h5>
                    </div>
                    </div>
                </div>
                <div data-view-section="terms_use"
                    class="row justify-content-center align-items-center flex-grow-1 align-items-center flex-strink-1 d-none">
                    <div class="col-md-10 form_box_1 form_box_2">
                        <h3 class="text-center text-light"><?= __('front.temrs_of_use') ?></h3>
                        <div class="content_area">
                        <p class="terms_text"><?= $tnc['content'] ?></p>
                        </div>
                    </div>
                </div>
                <div data-view-section="about"
                    class="row justify-content-center align-items-center flex-grow-1 align-items-center flex-strink-1 d-none">
                    <div class="col-md-10 form_box_1 form_box_2">
                        <h3 class="text-center text-light"><?= __('front.about') ?></h3>
                        <div class="content_area">
                       
                        <p class="terms_text">
                            <?= $loginclient['about_content'] ?>
                        </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer"  id="footer">
        <ul class="nav">
            <li class="nav-item">
                <a class="text-secondary px-2" href="#" onclick="show_section('terms_use')"><?= __('front.temrs_of_use') ?></a>
            </li>
            <li class="nav-item">
                <a class="text-secondary px-2" href="#" onclick="show_section('about')"><?= __('front.about') ?></a>
            </li>
            <?php 
                $store_setting = $this->Product_model->getSettings('store');
                if($store_setting['menu_on_front']){ ?>
            <li class="nav-item <?php if(base_url(uri_string()) == base_url('/store')){ echo 'active'; } ?>">
                <a class="nav-item" href="<?= base_url('/store') ?>" <?= ($store_setting['menu_on_front_blank']) ? 'target="_blank"' : ''; ?>><?= __('front.my_store') ?></a>
            </li>
             <?php } ?>
        </ul>
        <!-- <h6 class="text-center"><?= $footer ?></h6> -->
    </footer>
    <script src="<?= base_url('assets/login/index9') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/login/index1') ?>/js/popper.min.js"></script>
    <script src="<?= base_url('assets/login/index9') ?>/js/script.js"></script>
    <script src="<?= base_url('assets/login/index9') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/login/index8') ?>/js/main.js"></script>
    <script src="<?= base_url('assets/login/index8') ?>/js/demo.js"></script>
</body>

</html>
<script type="text/javascript">
    (function ($) {
      $.fn.btn = function (action) {
          var self = $(this);
          if (action == 'loading') { $(self).addClass("btn-loading"); }
          if (action == 'reset') { $(self).removeClass("btn-loading"); }
      }
    })(jQuery);

    var grecaptcha = undefined;
    $('.reset-password-form').on('submit',function(){
        $this = $(this);

        $.ajax({
            url:'<?= base_url('auth/forget') ?>',
            type:'POST',
            dataType:'json',
            data: $this.serialize(),
            beforeSend:function(){ $this.find(".btn-submit").btn("loading"); },
            complete:function(){ $this.find(".btn-submit").btn("reset"); },
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
                                $('.error-text').remove();
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

    function change_language(id)
    {
        $.ajax({
            url:'<?= base_url('AuthController/changeLanguage') ?>',
            type:'POST',
            dataType:'json',
            data: {language_id:id},
            success:function(data){
                location.reload();
            },
        })
    }
</script>