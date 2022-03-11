<!-- start subscription plan -->
<!-- start membership plan -->
<div class="row">
   <div class="col-md-12">
      <div class="page-intro" id="subscription_plan">
         <h2 class="page-title">Subscription Plan</h2>
         <p>Admin can create unlimited packages/plans of Time/Price. <br>
            also display your plan history. if you want buy any plan to process set in our web. so you can purchase our plan using our web. here only display our packages and price.
         </p>
      </div>
      <div class="top-content" id="buy_membership_plan">
         <h3 class="page-title">Buy Memebership Plan</h3>
         <p>
            Buy memebership plan request with HTTP GET request.
         </p>
         <p>
            API token is required for the authentication of the calling program to the API.
         </p>
         <p>
            Here display all plan history and all available payment method. also display here your active plan details. 
         </p>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-6">
      <!-- TABLE HOVER -->
      <div class="panel white">
         <div class="panel-heading">
            <h3 class="panel-title">Request :  </h3>
            <br>
            <span class="text-success">GET</span> : <?=base_url();?>Subscription_Plan/get_membership_plan</p>
         </div>
         <div class="panel-body">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>Parameter</th>
                     <th>Type</th>
                     <th>Position</th>
                     <th>Description</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>Authorization</td>
                     <td><code>string</code></td>
                     <td><code>Header</code></td>
                     <td>compolsory pass this authentication token in your header also get from login api</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- END TABLE HOVER -->
   </div>
   <div class="col-md-6">
      <!-- TABLE HOVER -->
      <div class="panel black">
         <div class="panel-heading">
            <h3 class="panel-title">Response</h3>
         </div>
         <div class="panel-body">
            <pre class="response-view"><?= htmlspecialchars('{"status":true,"message":"get membership plan successfully","data":{"notcheckmember":1,"MembershipSetting":{"status":"3","notificationbefore":"6","default_plan_id":"1"},"is_lifetime_plan":1,"plans":[{"id":2,"name":"Base Plan","type":"paid","billing_period":"weekly","price":50,"special":25,"custom_period":0,"have_trail":0,"free_trail":0,"total_day":7,"bonus":10,"status":1,"description":"<p>Some Random Terxt</p>","plan_icon":null,"label_text":"Try First Weak Free","label_background":"#FF0000","label_color":"#FFFFFF","sort_order":0,"updated_at":"2021-06-04 16:32:16","created_at":"2021-06-04 15:51:17"}],"methods":{"bank_transfer":{"title":"Bank Transfer","icon":"'.base_url().'application/membership_payment/logo/bank_transfer.png","website":"","code":"bank_transfer","status":1,"is_install":1,"setting_data":{"is_install":"1","status":"1","bank_details":""}},"paypal":{"title":"Paypal","icon":"'.base_url().'application/membership_payment/logo/paypal.png","website":"","code":"paypal","status":1,"is_install":1,"setting_data":{"is_install":"1","status":"1","api_username":"sb-r9loe2674870_api1.business.example.com","api_password":"2AEETK2NJECMJ6TR","api_signature":"AvxWb6JPLmYjjXpGcxqOPxtX1W.nAZshrBTaHvh-IMUgE6mKkYZIsYxe","payment_currency":"USD","denied_status_id":"3","pending_status_id":"0","processing_status_id":"7","success_status_id":"1","canceled_status_id":"5","payment_mode":"sandbox"}},"stripe_payment":{"title":"Stripe","icon":"'.base_url().'application/membership_payment/logo/stripe_payment.png","website":"https://stripe.com/","code":"stripe_payment","status":1,"is_install":1,"setting_data":{"is_install":"1","status":"1","environment":"0","test_public_key":"pk_test_51HIplPAflMT1sQX0od48Wk2ZSXpFfk9c2Oy19lJBBDTqgla6Q8uzZpWjF39oeNt05ROLbFAOIZnrXEKzZJiqr4g200HSDMgxRR","test_secret_key":"sk_test_51HIplPAflMT1sQX0Vy58Mh9fEIzVJrMxWnRBK2mHnBgafMhO96LEpYDr9ayoEXp1MaJfDnQ1VAI9LsaSjbUJGpir006JxQIE6W","live_public_key":"","live_secret_key":"","order_success_status":"1","order_failed_status":"5"}}}}}') ?></pre>
         </div>
      </div>
      <!-- END TABLE HOVER -->
   </div>
</div>
<!-- end membership plan -->
<!-- start plan history -->
<div class="top-content" id="plan_history">
   <h3 class="page-title">Plan History</h3>
   <p>
      Plan history request with HTTP GET request.
   </p>
   <p>
      API token is required for the authentication of the calling program to the API.
   </p>
   <p>
      Here display all my purchase plan
   </p>
   <p>
      Here product order list data display as pagignation wise. only data get using pass page_id and per_page parameter. <br>
      page_id is index of your page so you can pass your page id. <br>
      Ex. : display on first page pass 1, display on second page pass 2 <br>
      per_page is count of data display of per page. <br>
   </p>
</div>
<div class="row">
   <div class="col-md-6">
      <!-- TABLE HOVER -->
      <div class="panel white">
         <div class="panel-heading">
            <h3 class="panel-title">Request :  </h3>
            <br>
            <span class="text-warning"> POST </span> : <?=base_url();?>Subscription_Plan/purchase_history</p>
         </div>
         <div class="panel-body">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>Parameter</th>
                     <th>Type</th>
                     <th>Position</th>
                     <th>Description</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>page_id</td>
                     <td><code>number</code></td>
                     <td><code>Body</code></td>
                     <td>pass your page number index for data display as pagignation wise</td>
                  </tr>
                  <tr>
                     <td>per_page</td>
                     <td><code>number</code></td>
                     <td><code>Body</code></td>
                     <td>you want to set count for data display</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- END TABLE HOVER -->
   </div>
   <div class="col-md-6">
      <!-- TABLE HOVER -->
      <div class="panel black">
         <div class="panel-heading">
            <h3 class="panel-title">Response</h3>
         </div>
         <div class="panel-body">
            <pre class="response-view">{"status":true,"message":"get purchase plan successfully","data":{"notcheckmember":1,"plans":{"current_page":1,"data":[],"first_page_url":"\/?page=1","from":null,"last_page":1,"last_page_url":"\/?page=1","next_page_url":null,"path":"\/","per_page":"1","prev_page_url":null,"to":null,"total":0}}}</pre>
         </div>
      </div>
      <!-- END TABLE HOVER -->
   </div>
</div>
<!-- end plan history -->
<!-- end subscription plan -->