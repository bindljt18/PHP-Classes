<?php

class ProductModel extends Model
{
	
	public function getSelectProducts($type)
	{
		//define SQL
		$sql = "SELECT product_type, product_title, product_description, unit_price, image
				FROM `products` WHERE product_type=:type";
		
		//set the SQL property
		$this->setSql($sql);
		
		//bind values to parameters
		$parameters = array(':type'=>$type);
		
		//obtain data and return result
		return $this->getAll($parameters);
	}
	
	public function getAllProducts()
	{
		//define SQL
		$sql = "SELECT product_type, product_title, product_description, unit_price, image
				FROM `products`";
		
		//set the SQL property
		$this->setSql($sql);
		
		//obtain data and return result
		return $this->getAll();
	}
	
}
