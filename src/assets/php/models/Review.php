<?php
class Review {
   private $reviewId;
   private $rate;
   private $caption;
   private $description;
   private $user;

   public function __construct(/*$reviewId, $rate, $caption, $description, $user*/)
    {
       /* $this->reviewId = $reviewId;
        $this->rate = $rate;
        $this->caption = $caption;
        $this->description = $description;
        $this->user = $user;*/
    }


	public function getReviewId() {
		return $this->reviewId;
	}

	public function setReviewId($reviewId) {
		$this->reviewId = $reviewId;
	}

  public function getRate() {
		return $this->rate;
	}

	public function setRate($rate) {
		$this->rate = $rate;
	}


  public function getCaption() {
    return $this->caption;
  }

  public function setCaption($caption) {
    $this->caption = $caption;
  }
  
  
  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  } 

  
  public function getUser() {
    return $this->user;
  }

  public function setUser($user) {
    $this->user = $user;
  } 
}