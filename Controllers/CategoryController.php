<?php

namespace App\Controllers;

use App\Entity\Category;

abstract class BaseController
{
	public function __call($name,$args)
	{
		$methods = get_class_methods(__CLASS__);

		foreach ($methods as $method){
			if($method == $name){
				$this->name($args);
			}
		}
		throw new Exception("Could not call the method : ".$name, 1);
	}
}

class CategoryController
{	
	private $category;

	public function __construct()
	{
		$this->category = new Category();
	}

	//api/getAll
	public function getCategories()
	{
		$this->categories = $category->findAll();
		var_dump($categories);
	}

	//api/getById
	public function getById()
	{

	}
}