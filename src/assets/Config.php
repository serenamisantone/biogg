<?php

require_once("./assets/php/smarty/libs/Smarty.class.php");

class Config extends Smarty
{

    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir("./templates");
        //$this->setCacheDir('./cache');
        $this->cache_lifetime = 1;
        $this->assign('app_name', 'BioGG');
       // $this->assign('icon_file_name', 'favicon.png');
       // $this->assign('logo_file_name', 'logo.png');
        $this->assign('current_view', 'home.tpl');
        $this->assign('default_currency',"€");
    }

    public function assignCartVariables($smarty, $cartService) {
        if (!isset($_SESSION['cart'])) {
            $cartService->createShoppingCart();
        }
    
        if (isset($_SESSION['auth']['cart'])) {
            $smarty->assign('cart', $_SESSION['auth']['cart']);
        } else {
            $smarty->assign('cart', $_SESSION['cart']);
        }
    
        $smarty->assign('cartProducts', $cartService->getCartProducts());
        $smarty->assign("totalPrice", number_format($cartService->getTotalPrice(),2, ',', ''));
        $smarty->assign("totalPricePlusShipmentCost", number_format($cartService->getTotalPrice()+7,2, ',', ''));
    }
}