<?php
class Group{
    private $id;
    private $name;
    private $services = [];

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    

	public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  
	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

  public function getServices() {
		return $this->services;
	}

	public function setServices($services) {
		$this->services = $services;
	}
}