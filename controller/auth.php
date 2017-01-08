<?php
    class Auth extends System_controller{
        public function login(){
            $this->view->render('login');
            if(isset($_POST['login'])){
                $username =  $_POST['username'];
            }
        }
    }
?>