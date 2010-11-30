<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Set the default time zone.
 */
date_default_timezone_set('Asia/Chongqing');

/**
 * Set the default locale.
 */
setlocale(LC_ALL, 'chs');

/*
if ($_SERVER['HTTP_HOST'] && !preg_match('/^www\./', $_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] != 'localhost') {
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: http://www.".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	exit;
}
*/
/**
 * 默认调用
 */
spl_autoload_register(array('Core', 'autoload'));

Core::modules(array(
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	'database'   => MODPATH.'database/db'.EXT,   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	// 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	// 'oauth'      => MODPATH.'oauth',      // OAuth authentication
	'pagination' => MODPATH.'pagination/page'.EXT, // Paging of results
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	// 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
));

Controller::getView();