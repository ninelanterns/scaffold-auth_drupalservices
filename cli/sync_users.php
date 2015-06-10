<?php

define('CLI_SCRIPT', true);

require(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');

if (!is_enabled_auth('drupalservices')) {
    error_log('[AUTH DRUPALSERVICES] '.get_string('pluginnotenabled', 'auth_drupalservices'));
    die;
}

@set_time_limit(0);

// ensure errors are well explained
$CFG->debug = DEBUG_NORMAL;

$drupal = get_auth_plugin('drupalservices');
$drupal->sync_users(true);