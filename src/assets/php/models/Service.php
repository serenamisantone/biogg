<?php
class Service{
   private $code;
   private $name;

   
    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
  }


	public function getCode() {
		return $this->code;
	}

	public function setCode($code) {
		$this->code = $code;
	}


  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
} 
