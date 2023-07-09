<?php
class Category{
    private $id;
    private $name;

    /*public function __construct($categoryId, $name){
        $this->categoryId = $categoryId;
        $this->name = $name;
    }*/
    public function __construct(){
      
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
}