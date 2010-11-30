<?php defined('SYSPATH') or die('No direct script access.');
class Core {
	/**
	 * 当前加载 modules
	 *
	 * @var array()
	 */
	protected static $_modules = array();
	
	public static function autoload($class)
	{
		$file = str_replace('_', '/', strtolower($class));
		if ($path = Core::find_file($file))
		{
			require $path;
			return true;
		}
		return false;
	}
	
	public static function modules(array $modules = null)
	{
		if ($modules === null)
		{
			return Core::$_modules;
		} else {
			Core::$_modules = $modules;
			foreach (Core::$_modules as $path)
			{
				if (is_file($path))
				{
					require_once $path;
				}
			}
		}
		return Core::$_modules;
	}
	
	public static function find_file($file, $ext = null)
	{
		$found = false;
		
		if ($ext === null)
		{
			$ext = EXT;
		} elseif ($ext) {
			$ext = ".{$ext}";
		} else {
			$ext = '';
		}
		
		$path = SYSPATH.$file.$ext;
		if (is_file($path)) {
			$found = $path;
		}
		return $found;
	}
}