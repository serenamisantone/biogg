<?php
class UserHasGroup{
    private $user;
    private $group;

    
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
      return $this->group;
    }

    public function setGroup($group) {
      $this->group = $group;
    }
}
