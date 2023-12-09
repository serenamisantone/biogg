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
    private $offers;

    public function __construct()
    {
        $this->offers = [];
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

    public function getOffers()
    {
        return $this->offers;
    }

    public function setOffers($offers)
    { 
        
        if (!empty($offers)) {
            foreach ($offers as $offer) {
                $this->offers[] = $offer;
                    
                }
                
            }
        }

        public function addOffer(Offer $offer)
{
    $this->offers[] = $offer;
}

    
    public function getOffersString()
    {
        if (empty($this->offers)) {
            return null;
        }
    
        $offerString = '';
        foreach ($this->offers as $offer) {
            $offerString .= $offer->getName() . ' ';
        }
        // Rimuovi l'eventuale spazio finale
        $offerString = trim($offerString);
    
        return $offerString;
    }
    

    public function __toString()
    {
        return $this->name;
    }

    public function isInWishlist($productId)
    {
        // Verifica se l'ID del prodotto è presente nella wishlist dell'utente in sessione
        if (isset($_SESSION['wishlist'])) {
            return in_array($productId, $_SESSION['wishlist']);
        }
        return false;
    }
    public function getDetails()
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'category' => $this->getCategory(),
            'stock' => $this->getStock(),
            'isOnline' => $this->getIsOnline(),
            'image' => $this->getImage(),
            'caption' => $this->getCaption(),
        ];
    }
}


