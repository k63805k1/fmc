<?php
    class System_model{
        public $db;
        public function __construct(){
            $this->db = new System_db();
        }
    }
?>