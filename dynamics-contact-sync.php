<?php
/*
Plugin Name: Dynamics Contact Sync
Description: Allow logged-in users to sync and update their contact info with Microsoft Dynamics 365.
Version: 1.0
Author: Lakhan Saini
*/

defined('ABSPATH') || exit;

require_once plugin_dir_path(__FILE__) . 'includes/auth.php';
require_once plugin_dir_path(__FILE__) . 'includes/api.php';
require_once plugin_dir_path(__FILE__) . 'includes/form.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin-settings.php';
