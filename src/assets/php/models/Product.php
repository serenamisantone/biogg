<?php
class Product
{
    private $id;
    private $name;
    private $price;
    private $category;
    private $stock;
    private $isOnline;
    private $image;
    private $caption;

    /* public function __construct($productId, $name, $price, $category, $stock, $isOnline, $image)
     {
         $this->productId = $productId;
         $this->name = $name;
         $this->price = $price;
         $this->category = $category;
         $this->stock = $stock;
         $this->isOnline = $isOnline;
         $this->image = $image;
         
     }*/
    public function __construct()
    {
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


    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }


    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }


    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }


    public function getIsOnline()
    {
        return $this->isOnline;
    }
    public function setIsOnline($isOnline)
    {
        $this->isOnline = $isOnline;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCaption()
    {
        return $this->caption;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

}