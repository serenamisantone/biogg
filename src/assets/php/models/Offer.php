<?php
class Offer
{
  private $id;
  private $name;
  private $startDate;
  private $endDate;
  private $type;

  public function __construct(/*$id, $name, $startDate, $endDate, $type*/)
  {
   /* $this->id = $id;
    $this->name = $name;
    $this->startDate = $startDate;
    $this->endDate = $endDate;
    $this->type = $type;*/
  }


  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }


  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getStartDate()
  {
    return $this->startDate;
  }

  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }


  public function getEndDate()
  {
    return $this->endDate;
  }

  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }


  public function getType()
  {
    return $this->type;
  }
  public function setType($type)
  {
    $this->type = $type;
  }

}


