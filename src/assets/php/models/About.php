<?php
class About{
    private $id;
    private $slogan;
    private $title;
    private $description;
    private $mission;
    private $vision;
    private $image;

    public function __construct(){
      
    }
  

	  public function getId() {
      return $this->id;
    }

    public function setId($id) {
      $this->id = $id;
    }


	  public function getSlogan() {
		  return $this->slogan;
	  }

	  public function setSlogan($slogan) {
		  $this->slogan = $slogan;
	  }
      public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    public function getMission() {
        return $this->mission;
    }

    public function setMission($mission) {
        return $this->mission = $mission;
    }
    public function getVision(){
       return $this->vision;
    }
    public function setVision($vision){
       return $this->vision = $vision;
    }
    public function getImage(){
       return $this->image;
    }
    public function setImage($image){
       return $this->image = $image;
    }
}