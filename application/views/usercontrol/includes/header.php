<!DOCTYPE html>
<?php 
  $db =& get_instance();
  $userdetails = $db->Product_model->userdetails('user', true); 
  $SiteSetting = $db->Product_model->getSiteSetting();
  $MembershipSetting =$db->Product_model->getSettings('membership');
  
  if($userdetails['reg_approved'] != 1 && !isset($notcheckapproval)){
    redirect('usercontrol/approval_status');die;
  }

  if($MembershipSetting['status']){
    
    $user = App\User::auth();
    if((int)$user->plan_id == 0){
    
      if(!isset($notcheckmember)){
        redirect('usercontrol/purchase_plan');die;
      }
    
    } else if($user->plan_id == -1){

    } else if($user){
      
      $plan = $user->plan();
      if(!$plan){

        if(!isset($notcheckmember)){
          redirect('usercontrol/purchase_plan');die;
        }

      } else if($plan->isExpire() || !$plan->strToTimeRemains() > 0){

        $lifetime = ($plan->is_lifetime && $plan->status_id) ? true : false;
        if(!isset($notcheckmember) && !$lifetime){
          redirect('usercontrol/purchase_plan_expire');
          die;
        }

      }

    }

  }
?>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title><?= $SiteSetting['name'] ?> - <?= __('user.top_title') ?></title>

    <meta content="<?= $SiteSetting['meta_description'] ?>" name="description" />

    <meta content="<?= $SiteSetting['meta_author'] ?>" name="author" />

    <meta content="<?= $SiteSetting['meta_keywords'] ?>" name="keywords" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="<?= base_url('assets/vertical/assets/plugins/magnific-popup/magnific-popup.css?v='.av()); ?>" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/js/jquery-confirm.min.css?v='.av()); ?>" rel="stylesheet">

    <link href="<?= base_url('assets/vertical/assets/plugins/morris/morris.css?v='.av()); ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

    <link href="<?= base_url('assets/vertical/assets/css/bootstrap.min.css?v='.av()); ?>" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/vertical/assets/css/icons.css?v='.av()); ?>" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/vertical/assets/css/style.css?v='.av()); ?>" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/template/css/user.style.css?v='.av()); ?>" rel="stylesheet">

    <link href="<?= base_url('assets/template/css/user.responsive.css?v='.av()); ?>" rel="stylesheet">

    <link href="<?= base_url('assets/vertical/assets/plugins/chartist/css/chartist.min.css?v='.av()); ?>" rel="stylesheet" type="text/css">

    <link href="<?= base_url('assets/vertical/assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css?v='.av()); ?>" rel="stylesheet" type="text/css" media="screen">

    <?php if($SiteSetting['favicon']){ ?>
        <link rel="icon" href="<?= base_url('assets/images/site/'.$SiteSetting['favicon']) ?>" type="image/*" sizes="16x16">
    <?php } ?>

    <link href="<?= base_url('assets/css/jquery.uploadPreviewer.css?v='.av()); ?>" rel="stylesheet" type="text/css" media="screen">

    <?php if($SiteSetting['google_analytics'] != ''){ ?><?= $SiteSetting['google_analytics'] ?><?php } ?>
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <style>
        #preloader{

            background: #fff !important;

            color: rgba(0,0,0,0.8);

        }

        .lds-roller {

          display: inline-block;

          position: relative;

          width: 80px;

          height: 80px;

        }

        .lds-roller div {

          animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;

          transform-origin: 40px 40px;

        }

        .lds-roller div:after {

          content: " ";

          display: block;

          position: absolute;

          width: 7px;

          height: 7px;

          border-radius: 50%;

          background: #6362bb ;

          margin: -4px 0 0 -4px;

        }

        .lds-roller div:nth-child(1) {

          animation-delay: -0.036s;

        }

        .lds-roller div:nth-child(1):after {

          top: 63px;

          left: 63px;

        }

        .lds-roller div:nth-child(2) {

          animation-delay: -0.072s;

        }

        .lds-roller div:nth-child(2):after {

          top: 68px;

          left: 56px;

        }

        .lds-roller div:nth-child(3) {

          animation-delay: -0.108s;

        }

        .lds-roller div:nth-child(3):after {

          top: 71px;

          left: 48px;

        }

        .lds-roller div:nth-child(4) {

          animation-delay: -0.144s;

        }

        .lds-roller div:nth-child(4):after {

          top: 72px;

          left: 40px;

        }

        .lds-roller div:nth-child(5) {

          animation-delay: -0.18s;

        }

        .lds-roller div:nth-child(5):after {

          top: 71px;

          left: 32px;

        }

        .lds-roller div:nth-child(6) {

          animation-delay: -0.216s;

        }

        .lds-roller div:nth-child(6):after {

          top: 68px;

          left: 24px;

        }

        .lds-roller div:nth-child(7) {

          animation-delay: -0.252s;

        }

        .lds-roller div:nth-child(7):after {

          top: 63px;

          left: 17px;

        }

        .lds-roller div:nth-child(8) {

          animation-delay: -0.288s;

        }

        .lds-roller div:nth-child(8):after {

          top: 56px;

          left: 12px;

        }

        @keyframes lds-roller {

          0% {

            transform: rotate(0deg);

          }

          100% {

            transform: rotate(360deg);

          }

        }

        <?php if($SiteSetting['custom_logo_size']): ?>
              .customLogoClass{
                  width: <?= (int) $SiteSetting['log_custom_height'] ?>px !important;
                  height: <?= (int) $SiteSetting['log_custom_width'] ?>px !important;
              }
      <?php endif ?>
    </style>

    <!-- <script src="<?= base_url(); ?>assets/js/jquery.uploadPreviewer.js"></script> -->

    <link href="<?= base_url('assets/plugins/datetimepicker/jquery.datetimepicker.min.css?v='.av()) ?>" rel="stylesheet" />

    <script src="<?= base_url('assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js') ?>"></script>

    <link href="<?= base_url('assets/plugins/datatable/select2.css?v='.av()) ?>" rel="stylesheet" />

    <script src="<?= base_url('assets/plugins/datatable/select2.min.js') ?>"></script>

    <link rel='stylesheet' href='<?= base_url('assets/css/usercontrol-common.css?v='.av()) ?>' />

    <script type="text/javascript" src='<?= base_url('assets/sweetalert/sweetalert.min.js') ?>'></script>

    <script type="text/javascript">

        (function ($) {

            $.fn.btn = function (action) {

                var self = $(this);

                var tagName = self.prop("tagName");

                if(tagName == 'A'){

                    if (action == 'loading') {

                        $(self).attr('data-text',$(self).text());

                        $(self).text("Loading..");

                    }

                    if (action == 'reset') { $(self).text($(self).attr('data-text')); }

                }

                else {

                    if (action == 'loading') { $(self).addClass("btn-loading"); }

                    if (action == 'reset') { $(self).removeClass("btn-loading"); }

                }

            }

        })(jQuery);

        var formDataFilter = function(formData) {

            if (!(window.FormData && formData instanceof window.FormData)) return formData

            if (!formData.keys) return formData

            var newFormData = new window.FormData()

            Array.from(formData.entries()).forEach(function(entry) {

                var value = entry[1]

                if (value instanceof window.File && value.name === '' && value.size === 0) {

                    newFormData.append(entry[0], new window.Blob([]), '')

                } else {

                    newFormData.append(entry[0], value)

                }

            })

            return newFormData
        }
    </script>

    <?php if (is_rtl()) { ?>
      <!-- place here your RTL css code -->
    <?php } ?>
</head>
<body>
<?php 
  $fbmessager_status = (array)json_decode($SiteSetting['fbmessager_status'],1);
  if(in_array('affiliate', $fbmessager_status)){
    echo $SiteSetting['fbmessager_script'];
  }
?>
<div class="main">
  <div class="overly"></div>
