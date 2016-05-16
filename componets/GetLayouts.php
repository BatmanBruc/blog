<?php
class Getlayouts{
	public static function layouts($file){
		$path = ROOT.'/views/layouts/';
		$files = scandir($path);
		$file = $file.'.php';
		foreach ($files as $key => $value) {
			if($value == $file){
				include_once($path.$file);
			}
		}

	}	
}
?>