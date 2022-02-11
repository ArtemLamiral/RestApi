<?php

namespace App\Entity;

require_once 'BaseEntity.php';

use App\Entity\BaseEntity;

class Category extends BaseEntity
{
	public function __construct()
	{
		parent::__construct("categories");
	}
}