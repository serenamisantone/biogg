<?php
class UserHasGroup{
    private $user;
    private $groups = [];

    
    public function __construct($user, $group)
    {
        $this->user = $user;
        $this->group = $group;
    }


	  public function getUser() {
		  return $this->user;
	  }

	  public function setUser($user) {
		  $this->user = $user;
	  }

    
    public function getGroup() {
      return $this->groups;
    }

    public function setGroup($group) {      
    array_push($this->group, $group);   
    }
}
