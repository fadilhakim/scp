<?php

$path = "app/Libraries/Midtrans/";

// This snippet due to the braintree_php.
if (version_compare(PHP_VERSION, '5.2.1', '<')) {
    throw new Exception('PHP version >= 5.2.1 required');
}

// This snippet (and some of the curl code) due to the Facebook SDK.
if (!function_exists('curl_init')) {
  throw new Exception('Veritrans needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Veritrans needs the JSON PHP extension.');
}

// Configurations
require_once($path.'Veritrans/Config.php');

// Veritrans API Resources
require_once($path.'Veritrans/Transaction.php');

// Plumbing
require_once($path.'Veritrans/ApiRequestor.php');
require_once($path.'Veritrans/SnapApiRequestor.php');
require_once($path.'Veritrans/Notification.php');
require_once($path.'Veritrans/VtDirect.php');
require_once($path.'Veritrans/VtWeb.php');
require_once($path.'Veritrans/Snap.php');

// Sanitization
require_once($path.'Veritrans/Sanitizer.php');
