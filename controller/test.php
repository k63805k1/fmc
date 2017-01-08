<?php

    class Test extends System_controller{

        public function aa(){
            $this->view->render('home');
        }
        public function www(){
            $a = new System_db();
            $s = $a->select('select * from test_tbl')->all();
            foreach ($s as $d){
                echo $d['f_name'];
            }
        }

    }
?>