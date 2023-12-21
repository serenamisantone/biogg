<?php
class ProductInfo
{
	private $productId;
	private $ingredients;
	private $description;

	public function __construct()
	{

	}

	public function getProductId()
	{
		return $this->productId;
	}

	public function setProductId($productId)
	{
		$this->productId = $productId;
	}

	public function getIngredients()
	{
		return $this->ingredients;
	}

	public function setIngredients($ingredients)
	{
		$this->ingredients = $ingredients;
	}

	public function getDescription()
	{
		return $this->description;

	}

	public function setDescription($description)
	{
		$this->description = $description;

	}
}