<?php

class System_controller{
    protected $view;
    public function __construct()
    {
        $this->view = new System_view();
    }

    public function redirect($url){
        global $config;
        header("Location:".$config['base_url'].$url);
    }
}