<?php 
function prepareDataForRequest($paymentGateway,$uncompleted_id,$user,$vendor_deposit){
    $ci = & get_instance();
    
    $gatewayData = [];

    $gatewayData = [];

    switch($paymentGateway){
        case 'bank_transfer':
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['status'] = 7;
            $gatewayData['redirect'] = base_url('usercontrol/my_deposits?vd='.$uncompleted_id);
        break;

        case 'opay':
            $gatewayData['module'] = 2;
            $gatewayData['redirect'] = base_url('usercontrol/my_deposits?vd='.$uncompleted_id);
        break;

        case 'paypal':
            $gatewayData['return_url'] = base_url('usercontrol/payment_gateway/paypal/notify/'.$uncompleted_id);
            $gatewayData['cancel_url'] = base_url('usercontrol/payment_gateway/paypal/cancel/'.$uncompleted_id);

            $Payments = array();

            $Payment = array(
                'amt'          => str_replace(',','',c_format($vendor_deposit['vd_amount'],false)),
                'itemamt'      => str_replace(',','',c_format($vendor_deposit['vd_amount'],false)),
                'currencycode' => $ci->session->userdata('userCurrency'),
            );
            array_push($Payments, $Payment);

            $gatewayData['payments'] = $Payments;
        break;

        case 'paystack':
            $gatewayData['email'] = $user['email'];
            $gatewayData['total'] = str_replace(',','',c_format($vendor_deposit['vd_amount'],false)) * 100;
        break;

        case 'stripe':
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['amount'] = str_replace(',','',c_format($vendor_deposit['vd_amount'],false)) * 100;
            $gatewayData['currency'] = $ci->session->userdata['userCurrency'];
            $gatewayData['description'] = __('user.charge_for_vendor_deposit');
            $gatewayData['metadata'] = array('vendor_deposit_id' => $uncompleted_id);
            $gatewayData['redirect'] = base_url('usercontrol/my_deposits?vd='.$uncompleted_id);
        break;

        case 'yookassa':
            $gatewayData['total'] = str_replace(',','',c_format($vendor_deposit['vd_amount'],false));
            $gatewayData['return_url'] = base_url('usercontrol/payment_gateway/yookassa/confirmation/'.$uncompleted_id);
            $gatewayData['id'] = $uncompleted_id;
        break;

        default:
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['user'] = $user;
            $gatewayData['item'] = $vendor_deposit;
            $gatewayData['info'] = '';
            $gatewayData['return_url'] = base_url('usercontrol/my_deposits?vd='.$uncompleted_id);
            $gatewayData['cancel_url'] = base_url('usercontrol/my_deposits?vdc=1&vd='.$uncompleted_id);
            $gatewayData['callback_url'] = base_url('usercontrol/payment_gateway');
    }

    return $gatewayData;
}
