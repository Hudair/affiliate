<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-03-11 02:10:17 --> 404 Page Not Found: 
ERROR - 2022-03-11 02:11:51 --> Query error: Table 'affilliate.award_level' doesn't exist - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
ERROR - 2022-03-11 02:21:56 --> Query error: Table 'aff.award_level' doesn't exist - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
ERROR - 2022-03-11 02:26:00 --> Query error: Unknown column 'mp.commission_sale_status' in 'field list' - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
ERROR - 2022-03-11 02:36:45 --> 404 Page Not Found: 
ERROR - 2022-03-11 02:43:02 --> 404 Page Not Found: 
ERROR - 2022-03-11 03:01:26 --> 404 Page Not Found: 
ERROR - 2022-03-11 03:10:20 --> Query error: Table 'affilliate.award_level' doesn't exist - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
ERROR - 2022-03-11 03:11:32 --> Query error: Unknown column 'mp.commission_sale_status' in 'field list' - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
ERROR - 2022-03-11 03:11:35 --> Query error: Unknown column 'mp.commission_sale_status' in 'field list' - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
ERROR - 2022-03-11 03:11:37 --> Query error: Unknown column 'mp.commission_sale_status' in 'field list' - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
ERROR - 2022-03-11 03:11:39 --> Query error: Unknown column 'mp.level_id' in 'where clause' - Invalid query: SELECT
            countries.*,
            users.*,
            up.username as under_affiliate,
            mp.commission_sale_status as user_plan_comission_sale_status,
            (SELECT `level_number` FROM `award_level` WHERE `mp`.`level_id` = `award_level`.`id`) as user_plan_level,
            al.level_number as user_level,
            mp.name as membership_plan,
            mu.id as membership_plan_id
            FROM users
            LEFT JOIN countries ON countries.id = users.Country
            LEFT JOIN users up ON up.id = users.refid
            LEFT JOIN award_level al ON al.id = users.level_id
            LEFT JOIN membership_user mu ON mu.user_id = users.id AND is_active=1
            LEFT JOIN membership_plans mp ON mu.plan_id = mp.id
            WHERE users.TYPE = "user" 
            ORDER BY users.id DESC
         LIMIT 5
