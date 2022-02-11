<?php

require_once 'BaseEntity.php';

class Products extends BaseEntity
{
	public function __construct()
	{
		parent::__construct("products");
	}
}