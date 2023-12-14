<?php
class ProductInfo
{
	private $productId;
	private $ingredients;


	private $features = [];

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

	public function getFeatures()
	{
		return $this->features;

	}


	public function addFeatures($title, $description)
	{
		$feature = array(
			"title" => $title,
			"description" => $description
		);
		array_push($this->features, $feature);
		
	}
}