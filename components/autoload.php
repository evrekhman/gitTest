<?php

function __autoload($className)
{
	$array_path = array(
				'/models/',
				'/components/',
	);
	
	foreach($array_path as $val)
	{
		$path = ROOT.$val.$className.'.php';
		if(is_file($path))
		{
			include_once($path);
		}
	}
}