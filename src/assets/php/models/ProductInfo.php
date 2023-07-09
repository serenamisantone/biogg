<?php
class ProductInfo{
    private $productId;
    private $ingredients;
    private $image1;
    private $image2;

    public function __construct($productId, $ingredients, $image1, $image2)
    {
        $this->productId = $productId;
        $this->ingredients = $ingredients;
        $this->image1 = $image1;
        $this->image2 = $image2;
    }
    

	public function getProductId() {
    	return $this->productId;
  	}

  	public function setProductId($productId) {
    	$this->productId = $productId;
  	}


	public function getIngredients() {
		return $this->ingredients;
	}

	public function setIngredients($ingredients) {
		$this->ingredients = $ingredients;
	}


    public function getImage1() {
		return $this->image1;
	}

	public function setImage1($image1) {
		$this->image1 = $image1;
	}


  	public function getImage2() {
		return $this->image2;
	}

	public function setImage2($image2) {
		$this->image2 = $image2;
	}
}