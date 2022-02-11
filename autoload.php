<?php

// App\Dir\Classname;
// Example: App\Controllers\ProductController

class MyAutoload
{
	public static function autoload($class)
	{
		$class = str_replace("App\\", "", $class);
		$fileClass = $class.".php";

		if(strpos($class,"PDO"))
		{
			return;
		}

		echo $fileClass."<br><br>";

		if(file_exists($fileClass))
		{
			require $fileClass;
		}else{
			throw new Exception("Can not load class: ".$class." with path = ".$fileClass, 1);
		}
	}
}

spl_autoload_register(array("MyAutoload","autoload"));

