<?php
class ProductOffer{
    private $offerId;
    private $product;

    public function __construct($offerId, $product)
    {
        $this->offerId = $offerId;
        $this->product = $product;
    }

    
	public function getOfferId() {
		return $this->offerId;
	}

	public function setOfferId($offerId) {
		$this->offerId = $offerId;
	}


    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
    }
}