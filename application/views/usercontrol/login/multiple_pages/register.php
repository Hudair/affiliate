<?php include(APPPATH.'/views/usercontrol/login/multiple_pages/header.php');
    $reg_content = $theme_settings[0]->reg_content;
    $reg_img = $theme_settings[0]->reg_img;
?>
<?php 
if ($reg_img != '' || !empty($reg_img)) { 
    $image_link =  base_url().'/assets/images/theme_images/'.$reg_img;
}else{ 
    $image_link =  base_url().'assets/login/multiple_pages/img/register-bg.png';
} 
?>
<a href="<?= base_url('/'); ?>" class="btn-orage back-to-home"><?= __('front.back_to_homepage') ?></a>
<div class="login-hero-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 banner-bg" style="background: url(<?= $image_link; ?>);">
                   <div class="register-inner">
                        <div class="login-info text-center">
                            <img src="<?= base_url('assets/login/multiple_pages') ?>/img/exclamation.png" alt="<?= __('front.question') ?>">
                            <h1><?= __('front.i_am_already_a_member') ?></h1>
                            <a href="<?= site_url('/login') ?>"><?= __('front.log_in') ?></a>
                        </div>
                        <div class="register-description text-center" id="scrollbar">
                        <p><?= (!empty($reg_content)) ? $reg_content : __('front.register_content_if_not_exist');?></p>
                        </div>
                    </div>
                </div>
				<div class="col-lg-6 form-gray-bg">
					<div class="form-inner w-100">
                       <div class="row justify-content-center">
                           <div class="col-lg-6">
								<div class="login-form register-form text-center my-4">
                                    <div class="logo">
                                        <img src="<?= $logo; ?>" alt="<?= __('front.logo') ?>" <?= ($site_setting['custom_logo_size'] == 1) ? "style='height:".$site_setting['log_custom_height']."px;max-height:".$site_setting['log_custom_height']."px;min-height:".$site_setting['log_custom_height']."px;width:".$site_setting['log_custom_width']."px;max-width:".$site_setting['log_custom_width']."px;min-width:".$site_setting['log_custom_width']."px;'" : "" ?>>
                                    </div>
                                    <?= $register_fomm; ?>
                                </div>
                           </div>
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

    // $(".reg_form").submit(function(e){
    //     e.preventDefault();
    //     $this = $(this);
    //     var is_valid = true;
    //     if(tel_input){
    //         var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
    //         is_valid = false;
    //         var errorInnerHTML = '';
    //         if ($("#phone").val().trim()) {
    //             if (tel_input.isValidNumber()) {
    //                 is_valid = true;
    //                 $("#phonenumber-input").val("+"+tel_input.selectedCountryData.dialCode + $("#phone").val().trim())
    //             } else {
    //                 var errorCode = tel_input.getValidationError();
    //                 errorInnerHTML = errorMap[errorCode];
    //             }
    //         } else { errorInnerHTML = 'The Mobile Number field is required.'; }

    //         $("#phone").parents(".form-group").removeClass("has-error");
    //         $(".reg_form .text-danger").remove();
    //         if(!is_valid){
    //             $("#phone").parents(".form-group").addClass("has-error");
    //             $("#phone").parents(".form-group").find('> div').after("<span class='text-danger'>"+ errorInnerHTML +"</span>");
    //         }
    //     }
    //     if(is_valid){
    //         var check_captch = true;
    //         if (grecaptcha === undefined) { check_captch = false; }
    //         $("#captch_response").val('')
    //         if(check_captch){
    //             captch_response = grecaptcha.getResponse();
    //             $("#captch_response").val(captch_response)
    //         }

    //         var data = new FormData(this);

    //         $.ajax({
    //             url:'<?= base_url("pagebuilder/register") ?>',
    //             type:'POST',
    //             dataType:'json',
    //             cache: false,
    //             contentType: false,
    //             processData: false,
    //             data:data,
    //             beforeSend:function(){ $this.find(".btn-submit").btn("loading"); },
    //             complete:function(){ $this.find(".btn-submit").btn("reset"); },
    //             success:function(json){
    //                 if(json['redirect']){ window.location.replace(json['redirect']); }
    //                 if(json['warning']){ alert(json['warning']) }

    //                 $this.find(".is-invalid").removeClass("is-invalid");
    //                 $this.find("span.invalid-feedback").remove();

    //                 if(json['errors']){
    //                     $.each(json['errors'], function(i,j){
    //                         if(i == 'captch_response' && grecaptcha){ grecaptcha.reset(); }
    //                         if(i == 'terms'){ $(".reg-agree-label").after("<span class='invalid-feedback'>"+ j +"</span>"); return true; }

    //                         $ele = $this.find('#'+i);
    //                         if($ele){
    //                             $formGroup = $ele.parents(".form-group");
    //                             $ele.addClass("is-invalid");
    //                             if($formGroup.find(".input-group").length){
    //                                 $formGroup.find(".input-group").after("<span class='invalid-feedback'>"+ j +"</span>");
    //                             } else if($ele.hasClass('form-group')){
    //                                 $ele.addClass("has-error");
    //                                 $ele.append("<br><small class='text-danger'>"+ j +"</small>");
    //                             }  else {
    //                                 $ele.parents(".form-group").addClass("has-error");
    //                                 $ele.after("<span class='invalid-feedback'>"+ j +"</span>");
    //                             }
    //                         }
    //                     })
    //                 }
    //             },
    //         })
    //     }
    //     return false;
    // })
</script>