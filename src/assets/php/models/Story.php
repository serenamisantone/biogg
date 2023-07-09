<?php
class Story{
    private $storyId;
    private $title;
    private $caption;
    private $description;
    private $image;

    
    public function __construct($storyId, $title, $caption, $description, $image)
    {
        $this->storyId = $storyId;
        $this->title = $title;
        $this->caption = $caption;
        $this->description = $description;
        $this->image = $image;
}


	public function getStoryId() {
		return $this->storyId;
	}

	public function setStoryId($storyId) {
		$this->storyId = $storyId;
	}


  public function getTitle() {
    return $this->title;
  }

  public function setTitle($title) {
    $this->title = $title;
  }
  
  public function getCaption() {
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

