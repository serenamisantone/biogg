<?php

class ServiceHasGroup{
    private $group;
    private $service;

    
    public function __construct($group, $service)
    {
        $this->group = $group;
        $this->service = $service;
    }


	  public function getGroup() {
		  return $this->group;
	  }

	  public function setGroup($group) {
		  $this->group = $group;
	  }

    
    public function getService() {
      return $this->service;
    }

    public function setService($service) {
      $this->service = $service;
    }
}
