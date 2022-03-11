
<?php
    $db =& get_instance();
    $userdetails = get_object_vars($db->user_info());
    $store_setting =$db->Product_model->getSettings('store');
    $products = $db->Product_model; 
    //$notifications = $products->getnotificationnew('admin',null,5);
    $notifications_count = $products->getnotificationnew_count('admin',null);
?>

<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/vertical/assets/plugins/chartist/css/chartist.min.css') ?>?v=<?= av() ?>">
<script type="text/javascript" src="<?= base_url('assets/vertical/assets/plugins/chartist/js/chartist.min.js') ?>"></script>

<link rel="stylesheet" type="text/css" href="<?= base_url('/assets/vertical/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') ?>?v=<?= av() ?>">
<script src="<?= base_url('assets/vertical/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') ?>"></script>
<script src="<?= base_url('assets/vertical/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/vertical/assets/plugins/jvectormap/gdp-data.js') ?>"></script>
<script src="<?= base_url('assets/vertical/assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') ?>"></script>
<script src="<?= base_url('assets/vertical/assets/plugins/jvectormap/jquery-jvectormap-uk-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/vertical/assets/plugins/jvectormap/jquery-jvectormap-us-il-chicago-mill-en.js') ?>"></script> 

<!-- <script src="<?= base_url('assets/store/d3.min.js') ?>"></script>
<script src="<?= base_url('assets/store/topojson.min.js') ?>"></script> -->


<script src="<?php echo base_url(); ?>assets/vertical/assets/plugins/chartist/js/chartist-plugin-tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vertical/assets/plugins/jquery-knob/excanvas.js"></script>
<script src="<?php echo base_url(); ?>assets/vertical/assets/plugins/jquery-knob/jquery.knob.js"></script>

<?php include(APPPATH.'/views/admincontrol/includes/store.php'); ?>
<br>
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.total_balance') ?></h6>
                        <h4 class="counter mt-0 text-primary ajax-total_balance"><?php echo $totals['full_total_balance'] ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.total_sales' ) ?></h6>
                        <h4 class="counter mt-0 text-primary ajax-total_balance"><?php echo $totals['total_sale_balance'] ?></h4>
                    </div>
                    <button class="btn-sm btn-window" data-log='sale'><i class="fa fa-eye"></i></button>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.clicks_statistic' ) ?></h6>
                        <h4 class="counter mt-0 text-primary ajax-all_clicks_comm"> <?php echo $totals['full_all_clicks_comm'] ?></h4>
                    </div>
                    <button class="btn-sm btn-window" data-log='click'><i class="fa fa-eye"></i></button>
                </div>
            </div>
           
            <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><b><a href="<?= base_url ('admincontrol/listclients')?>"><?php echo __( 'admin.total_clients' ) ?></a></b></h6>
                        <h4 class="counter mt-0 text-primary"><?php echo !empty($client_count) ? count($client_count) : '0'; ?></h4>
                    </div>
                    <button class="btn-sm btn-window" data-log='member'><i class="fa fa-eye"></i></button>
                </div>
            </div>
           
            <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mini-stat-info text-center">
                                <h4 class="mt-0 header-title"><?php echo __('admin.h_orders') ?></h4>
                                <a class="counter mt-0 text-success" href="<?= base_url('admincontrol/listorders') ?>" role="button" data-toggle="tooltip" data-original-title="<?php echo __('admin.h_orders') ?>">
                                    <span class="badge badge-setting badge-danger float-center ajax-hold_orders blink_me"><?= $totals['full_local_store_hold_orders'] ?></span>
                                </a>
                            </div>
                        </div>
                        <button class="btn-sm btn-window" data-log='hold_orders'><i class="fa fa-eye"></i></button>
                    </div>
                </div>
            </div>
            
             <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <span class="badge badge-light">
                            <?php $store_url = base_url('store'); ?>
                            </span>
                        <a class="btn btn-lg btn-default btn-success" href="<?php echo $store_url ?>" target="_blank">
                        <?= __('admin.view_store') ?></a>
                        
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-2">
        <div class="mini-stat clearfix bg-white">
            <div class="mini-stat-info text-center">
                <h6 class="mt-0 header-title"><?php echo __( 'admin.total_products') ?> (<?= (int)$product_count ?>)</h6> 
                <a href="<?= base_url('admincontrol/listproduct') ?>"></a>
                 <!-- <h6 class="mt-0 header-title"><?php echo __( 'admin.total_category') ?> (<?= (int)$category_count ?>)</h6>
                <a href="<?= base_url('admincontrol/store_category') ?>" ></a> -->
            </div>
        </div>
    </div>

    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.total_forms') ?> (<?= $form_count ?>)</h6>
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.total_orders') ?> (<?php echo $ordercount; ?>)</h6>
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.total_products_coupons') ?> (<?= $coupon_count ?>)</h6>
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.total_forms_coupons') ?> (<?= $form_coupon_count ?>)</h6>
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.payment_getaway') ?> (<?= $payment_gateway_count ?>)</h6>
                    </div>
                </div>
    </div>
            
</div>


<div class="row">
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_paypal_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/paypal.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_paytm_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/paytm.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_opay_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/opay.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_skrill_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/skrill.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_stripe_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/stripe.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_bank_transfer_cod') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/bank-transfer.png') ?>">
                    </div>
                </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_yookassa_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/yookassa.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_paystack_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/paystack.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_xendit_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/xendit.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_flutterwave_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/flutterwave.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_razorpay_getaway') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/razorpay.png') ?>">
                    </div>
                </div>
    </div>
    <div class="col-xl-2">
                <div class="mini-stat clearfix bg-white">
                    <div class="mini-stat-info text-center">
                        <h6 class="mt-0 header-title"><?php echo __( 'admin.support_bank_transfer_cod') ?></h6>
                        <img height:100% width:100% src="<?= base_url('assets/payment_gateway/cod.png') ?>">
                    </div>
                </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive b-0" data-pattern="priority-columns">
            <table id="store-dashboard-orders" class="table  table-striped">
                <thead>
                    <tr>
                        <th><?= __('admin.order_id') ?></th>
                        <th><?= __('admin.price') ?></th>
                        <th class="txt-cntr"><?= __('admin.order_status') ?></th>
                        <th><?= __('admin.payment_method') ?></th>
                        <th><?= __('admin.ip') ?></th>
                        <th><?= __('admin.transaction') ?></th>
                        <th><?= __('admin.status') ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
    function getPage(url){
        $this = $(this);

        $.ajax({
            url:url,
            type:'POST',
            dataType:'json',
            data:$("#filter-form").serialize(),
            beforeSend:function(){$this.btn("loading");},
            complete:function(){$this.btn("reset");},
            success:function(json){
                if(json['view']){
                    $("#store-dashboard-orders tbody").html(json['view']);
                    $("#store-dashboard-orders").show();
                } else {
                    $(".empty-div").removeClass("d-none");
                    $("#store-dashboard-orders").hide();
                }
                
                $("#store-dashboard-orders .pagination-td").html(json['pagination']);
            },
        })
    }

    getPage('<?= base_url("admincontrol/store_dashboard_order_list?page=1") ?>');
    $("#store-dashboard-orders").delegate(".pagination-td a","click",function(e){
        e.preventDefault();
        getPage($(this).attr("href"));
        return false;
    })
    </script>
</div>
