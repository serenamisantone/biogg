<?php
class Shipping{
    private $order;
    private $status;
    private $info;

    
    public function __construct($order, $status, $info)
    {
        $this->order = $order;
        $this->status = $status;
        $this->info = $info;
    }


	  public function getOrder() {
		  return $this->order;
	  }

	  public function setOrder($order) {
		  $this->order = $order;
	  }


    public function getStatus() {
      return $this->status;
    }

    public function setStatus($status) {
      $this->status = $status;
    }


    public function getInfo() {
      return $this->info;
    }

    public function setInfo($info) {
      $this->info = $info;
    } 
}
