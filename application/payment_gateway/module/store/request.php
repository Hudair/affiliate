<?php 
function prepareDataForRequest($paymentGateway,$uncompleted_id,$user,$order,$products){
    $ci = & get_instance();

    $gatewayData = [];

    switch($paymentGateway){
        case 'bank_transfer':
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['status'] = 7;
            $gatewayData['redirect'] = base_url('store/thankyou/'.$uncompleted_id);
        break;

        case 'cod':
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['redirect'] = base_url('store/thankyou/'.$uncompleted_id);
        break;

        case 'opay':
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['redirect'] = base_url('store/thankyou/'.$uncompleted_id);
        break;

        case 'paypal':
            $gatewayData['return_url'] = base_url('store/payment_gateway/paypal/notify/'.$uncompleted_id);
            $gatewayData['cancel_url'] = base_url('store/payment_gateway/paypal/cancel/'.$uncompleted_id);

            $Payments = array();

            $PaymentOrderItems = array();
            foreach($products as $key => $product){
                $total = ($key == 0) ? ($product['total'] + $order['shipping_cost'] + $order['tax_cost']) : $product['total'];
                $Item = array(
                    'name'    => $product['product_name'],
                    'desc'    => $product['product_name'],
                    'amt'     => str_replace(',','',c_format($total,false)),
                    'number'  => $product['product_id'],
                    'qty'     => 1,
                    'taxamt'  => 0,
                    'itemurl' => '', 
                );
                array_push($PaymentOrderItems, $Item);
            }
           
            $Payment = array(
                'order_items'  => $PaymentOrderItems,
                'amt'          => str_replace(',','',c_format($order['total'],false)),
                'itemamt'      => str_replace(',','',c_format($order['total'],false)),
                'currencycode' => $ci->session->userdata('userCurrency'),
            );
            array_push($Payments, $Payment);

            $gatewayData['payments'] = $Payments;
        break;

        case 'paystack':
            $gatewayData['email'] = $user['email'];
            $gatewayData['total'] = str_replace(',','',c_format($order['total'],false)) * 100;
        break;

        case 'stripe':
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['amount'] = str_replace(',','',c_format($order['total'],false)) * 100;
            $gatewayData['currency'] = $ci->session->userdata('userCurrency');
            $gatewayData['description'] = __('front.charge_for_order');
            $gatewayData['metadata'] = array('order_id' => $uncompleted_id,'email' => $order['email']);
            $gatewayData['redirect'] = base_url('store/thankyou/'.$uncompleted_id);
        break;

        case 'yookassa':
            $gatewayData['total'] = str_replace(',','',c_format($order['total'],false));
            $gatewayData['return_url'] = base_url('store/payment_gateway/yookassa/confirmation/'.$uncompleted_id);
            $gatewayData['id'] = $uncompleted_id;
        break;

        default:
            $gatewayData['id'] = $uncompleted_id;
            $gatewayData['user'] = $user;
            $gatewayData['item'] = $order;
            $gatewayData['info'] = $products;
            $gatewayData['return_url'] = base_url('store/thankyou/'.$uncompleted_id);
            $gatewayData['cancel_url'] = base_url('store/checkout');
            $gatewayData['callback_url'] = base_url('store/payment_gateway');
    }

    return $gatewayData;
}
