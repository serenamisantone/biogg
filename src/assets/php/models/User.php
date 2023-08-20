<?php
class User{
    private $userId;
    private $name;
    private $surname;
    private $username;
    private $password;
    private $email;
    private $group ;
    private $services;
    public function __construct()
    {
      
    }


	public function getUserId() {
		return $this->userId;
	}

	public function setUserId($userId) {
		$this->userId = $userId;
	}


  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }


  public function getSurname() {
    return $this->surname;
  }

  public function setSurname($surname) {
    $this->surname = $surname;
  }


  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }


  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  
  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getGroup() {
    return $this->group;
  }

  public function setGroup($group) {
    $this->group = $group;
  }
  public function getServices() {
    return $this->services;
  }

  public function setServices($services) {
    $this->services = $services;
  }

}
