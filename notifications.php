<?php

/*
Plugin Name: Notifications
Plugin URI: https://github.com/Max93/notifications
Description: Simple and flexible notifications manager.
Version: 0.0.1
Author: Massimo Ruggirello
Author URI: https://github.com/Max93
Text Domain: notifications
License: GPLv2 or later.
Copyright: Massimo Ruggirello
*/

include_once dirname( __FILE__ ) . '/init.php';

register_activation_hook( __FILE__, ['Init', 'activation']);
register_uninstall_hook( __FILE__, ['Init', 'uninstall']);
