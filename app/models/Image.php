<?php
use Jenssegers\Model\Model;

class Image extends Model {

	protected static $folder = 'images/carousel';

	public static function all()
	{
		// Get content files
		$files = File::files(public_path() . '/' . self::$folder);

		// Loop all files
		foreach ($files as &$file)
		{
			// Remove full path
			$file = str_replace(public_path() . '/', '', $file);
		}

		return $files;
	}

}
