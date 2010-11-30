<?php
error_reporting(E_ALL | E_STRICT);

$system = 'system';
$modules = 'modules';

define('EXT', '.php');
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);
define('SYSPATH', realpath($system).DIRECTORY_SEPARATOR);
define('MODPATH', realpath($modules).DIRECTORY_SEPARATOR);

unset($system,$modules);

require SYSPATH.'core'.EXT;
require SYSPATH.'bootstrap'.EXT;