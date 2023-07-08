<?php

require_once("./assets/php/smarty/libs/Smarty.class.php");

class Config extends Smarty
{

    public function __construct()
    {
        parent::__construct();

        $this->setTemplateDir("templates");
        
        //$this->setCacheDir('./cache');
        $this->cache_lifetime = 1;
        $this->assign('app_name', 'BioGG');
       // $this->assign('icon_file_name', 'favicon.png');
       // $this->assign('logo_file_name', 'logo.png');
        $this->assign('current_view', 'home.tpl');
        $this->assign('default_currency',"€");
    }
}