<?php
declare(strict_types=1);
namespace Apache\FOP;

/**
 * Entry point for the Apache FOP WordPress plugin.
 *
 * @wordpress-plugin
 * Plugin Name:         Apache FOP PluginLake Chelan Chamber of Commerce Customization
 * Description:         Plugin to support invoking Apache FOP to create PDF files.
 * Version:             1.0.0
 * Requires at least:   6.8.0
 * Requires PHP:        8.2
 */

// If this file is called directly, abort.
defined('ABSPATH') || exit;

const VENDOR_AUTOLOAD_PHP = '/vendor/autoload.php';

if (file_exists(__DIR__.VENDOR_AUTOLOAD_PHP)) {
    $vendorAutoload = __DIR__.VENDOR_AUTOLOAD_PHP;
} else {
    $vendorAutoload = __DIR__.'/..'.VENDOR_AUTOLOAD_PHP;
}

require_once($vendorAutoload);  // NOSONAR

(new ApacheFopPlugin())->init(__FILE__);
