<?php
class ProductInfo
{
	private $productId;
	private $description;
	private $ingredients;
	private $image1;
	private $image2;

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

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getIngredients()
	{
		return $this->ingredients;
	}

	public function setIngredients($ingredients)
	{
		$this->ingredients = $ingredients;
	}


	public function getImage1()
	{
		return $this->image1;
	}

	public function setImage1($image1)
	{
		$this->image1 = $image1;
	}


	public function getImage2()
	{
		return $this->image2;
	}

	public function setImage2($image2)
	{
		$this->image2 = $image2;
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