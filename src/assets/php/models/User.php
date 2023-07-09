<?php
class User{
    private $userId;
    private $name;
    private $surname;
    private $username;
    private $password;
    private $email;

    
    public function __construct($userId, $name, $surname, $username, $password, $email)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->surname = $surname;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
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

}
