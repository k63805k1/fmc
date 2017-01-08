<?php

    class System_view{
        public function render($file, $nav=true){
            global $config;
            $filename = $file.'.php';
            if(file_exists('view/'.$filename) && $nav){
                include 'header.php';
                include 'view/'.$filename;
                include 'footer.php';
            }else{
                include 'Page not found';
            }
        }
    }
?>