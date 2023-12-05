<?php
class Slider{
    private $id;
    private $title;
    private $caption;
    private $description;
    private $image;

   
    public function __construct(){
      
    }
  

	  public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }


	  public function getTitle() {
		  return $this->title;
	  }

	  public function setTitle($title) {
		  $this->title = $title;
	  }

      public function getCaption () {
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

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }
}