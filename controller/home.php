<?php

class Home extends System_controller{
    public function index(){
        $this->view->render('home',true);

    }
}