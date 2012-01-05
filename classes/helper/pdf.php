<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Helper PDF
 * 
 * @author		Marcelo Rodrigo <mrodrigow@gmail.com>
 * @license		Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0) 
 * @link		http://creativecommons.org/licenses/by-sa/3.0/
 */
class Helper_PDF {
	
	/**
	 * Serve PDF content do download
	 * 
	 * @author Marcelo Rodrigo
	 * @param type $content Content to save in PDF
	 * @param string $filename Filename
	 * @param array $options Options to send_file
	 */
	public static function download($content, $filename = null, array $options = null)
	{
		// Generating a random filename
		if(!$filename)
			$filename = text::random().'.pdf';
		
		// Send file to download
		Request::$current->response()->body($content);
		Request::$current->response()->send_file(true,$filename,$options);
		
	}
	
	/**
	 * Serve PDF content inline
	 * 
	 * @author Marcelo Rodrigo
	 * @param type $content Content to display as PDF
	 * @param string $filename Filename
	 * @param array $options Options to send_file
	 */
	public static function display($content, $filename = null, array $options = null)
	{
		// Force display inline
		$options['inline'] = 'inline';
		
		self::download($content, $filename, $options);
		
	}
	
}