<?php

/**
*  Plugin Name: Sample CPT plugin
* Plugin URI: https://www.my-site.com/
* Description: This will create members CPT
* Version: 0.1
* Author: Bejan Test
* Author URI: https://www.my-site.com/
**/

/* Defines plugin's root folder. */
define('MEMBERS_PATH', plugin_dir_path(__FILE__));

/* Members CPT*/
require_once 'inc/members-posttype.php';

/* Registers metaboxes. */
require_once 'inc/members-metaboxes.php';

/* Register style on initialization */
require_once 'inc/members-styles.php';