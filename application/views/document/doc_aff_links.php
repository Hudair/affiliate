<div class="row">
   <div class="col-md-12">
      <div class="top-content" id="my_affiliate_links">
         <h2 class="page-title">My Affiliate Links</h2>
         <p>
            My affiliate links with HTTP POST request.
         </p>
         <p>
            API token is required for the authentication of the calling program to the API.
         </p>
         <p>
            Here display all affilaite link data. you can filter using below parametr as per your need without filter paramater pass you can get all affiliate link data .
         </p>
         <div class="row">
            <div class="col-md-6">
               <!-- TABLE HOVER -->
               <div class="panel white">
                  <div class="panel-heading">
                     <h3 class="panel-title">Request :  </h3><br>
                     <span class="text-warning">POST</span> : <?=base_url();?>User/my_affiliate_links</p>
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
                              <td>category_id</td>
                              <td><code>number</code></td>
                              <td><code>Body</code></td>
                              <td>this is optional parameter for filter</td>
                           </tr>
                           <tr>
                              <td>ads_name</td>
                              <td><code>string</code></td>
                              <td><code>Body</code></td>
                              <td>this is optional parameter for filter</td>
                           </tr>
                           <tr>
                              <td>market_category_id</td>
                              <td><code>number</code></td>
                              <td><code>Body</code></td>
                              <td>this is optional parameter for filter</td>
                           </tr>
                           <tr>
                              <td>check_vendor</td>
                              <td><code>number</code></td>
                              <td><code>Body</code></td>
                              <td>this is optional parameter for filter this parametr have fixed value false OR true</td>
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
                     <pre class="response-view">
                        { "status": true, "message": "my affiliate links get successfully", "data": { "form_default_commission": { "recaptcha": "", "product_commission_type": "percentage", "product_commission": "15", "product_ppc": "7", "product_noofpercommission": "1", "form_recursion": "", "recursion_custom_time": "0", "recursion_endtime": null }, "default_commition": { "click_allow": "multiple", "product_commission_type": "percentage", "product_commission": "10", "product_ppc": "5", "product_noofpercommission": "1", "product_recursion": "", "recursion_custom_time": "0", "recursion_endtime": null }, "data": [ { "id": "11", "redirectLocation": [ "https://google.com?af_id=blpHNUswNmVNQzViUitDK3IyWDZnZz09-ODgtMjA=" ], "program_id": "4", "name": "Vendor LInk Ads", "vendor_id": "75", "program_name": "vendor program", "target_link": "https://google.com", "status": "1", "action_click": "0", "action_amount": "0", "general_click": "0", "general_amount": "0", "admin_action_click": "0", "admin_action_amount": "0", "admin_general_click": "0", "admin_general_amount": "0", "_tool_type": "program", "type": "Link ads", "_type": "link_ads", "commission_type": "percentage", "commission_sale": "30", "commission_number_of_click": "1", "commission_click_commission": "5", "click_status": "1", "sale_status": "1", "admin_commission_type": "percentage", "admin_commission_sale": "25", "admin_commission_number_of_click": "1", "admin_commission_click_commission": "1", "admin_click_status": "1", "admin_sale_status": "1", "recursion": "", "recursion_custom_time": "0", "username": "aff1", "recursion_endtime": null, "featured_image": "EfdCYkajeqi9lDxMQNTcyK3PBnL4rXZF.png", "total_sale_amount": "$0.00", "total_click_amount": "$0.00", "total_action_click_amount": "$0.00", "total_general_click_amount": "$0.00", "total_sale_count": 0, "total_click_count": 0, "total_action_click_count": 0, "total_general_click_count": 0, "tool_type": "Program", "created_at": "11-06-2021 10:20 AM", "product_created_date": "11-06-2021 10:20 AM", "is_tool": 1, "slug": "", "groups": "" }, { "form_id": "2", "title": "Admin form", "description": "<p>new body</p><p>new body</p><p>new body<br></p>", "seo": "new seo", "fevi_icon": "M9Cqnv2JiD1Y3h6Z7NzLu58xkHKWcsOP.jpg", "sale_commision_type": "default", "sale_commision_value": "0", "click_commision_type": "default", "click_commision_ppc": "0", "click_commision_per": "0", "comment": null, "form_recursion_type": "", "form_recursion": "", "recursion_custom_time": "0", "recursion_endtime": null, "product": null, "coupon": "", "status": "1", "allow_for": "A", "footer_title": "Xiaomi Roborock S5 Max Robot Vacuum Cleaner", "google_analitics": "", "created_at": "2021-06-08 10:11:28", "total_commission": null, "count_commission": "0", "commition_click_count": "0", "commition_click": null, "slug": "", "coupon_name": "", "public_page": "http://localhost/aff/4-0-0-7/form/new_seo/ODg=", "count_coupon": 0, "is_form": 1, "product_created_date": "2021-06-08 10:11:28" }, { "product_id": "3", "product_name": "Admin Product-1", "product_description": "<p><span xss=removed>Short Description</span></p><p><span xss=removed>Short Description</span></p><p><span xss=removed>Short Description</span></p><hr><p><span xss=removed>Short Description</span><span xss=removed><br></span><span xss=removed><br></span><span xss=removed><br></span><br></p>", "product_short_description": "Short Description", "product_tags": "null", "product_msrp": "200", "product_price": "150", "product_sku": "123", "product_slug": "admin-product-1-3", "product_share_count": "", "product_click_count": "0", "product_view_count": "0", "product_sales_count": "0", "product_featured_image": "Jjo2fGr8dOIVYxLgSW6kFbDwHnRMTlpZ.jpg", "product_banner": "", "product_video": "", "product_type": "virtual", "product_commision_type": "default", "product_commision_value": "0", "product_status": "1", "product_ipaddress": "::1", "product_created_date": "2021-06-08 09:18:47", "product_updated_date": "0000-00-00 00:00:00", "product_created_by": "1", "product_updated_by": "0", "product_click_commision_type": "default", "product_click_commision_ppc": "0", "product_click_commision_per": "0", "product_total_commission": "0", "product_recursion_type": "", "product_recursion": "", "recursion_custom_time": "0", "recursion_endtime": null, "view": "100", "on_store": "1", "downloadable_files": "[]", "allow_shipping": "1", "allow_upload_file": "0", "allow_comment": "0", "state_id": "0", "product_avg_rating": "0", "product_variations": "[]", "seller_firstname": null, "seller_lastname": null, "seller_username": null, "seller_id": null, "commission": null, "order_count": "0", "commition_click_count": "0", "commition_click_count_admin": "1", "commition_click": null, "slug": "", "is_product": 1 } ] } }
                     </pre>
                  </div>
               </div>
               <!-- END TABLE HOVER -->
            </div>
         </div>
         <!-- end my affiliate -->
      </div>
   </div>
</div>
<!-- row -->