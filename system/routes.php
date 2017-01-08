<?php
    class System_routes{
        function __construct($aUrl)
        {
            if(isset($aUrl[0]) && !empty($aUrl[0])){
                $ctrl = $aUrl[0];
                if(file_exists("controller/$ctrl.php")){
                    include "controller/$ctrl.php";
                    ucfirst($ctrl);
                    if(class_exists($ctrl,false)){
                        $ctrl_obj = new $ctrl();
                        if(isset($aUrl[1]) && !empty($aUrl[1])){
                            $method = $aUrl[1];
                            if(method_exists($ctrl,$method)){
                                if(isset($aUrl[2]) && !empty($aUrl[2])){
                                    $params = array_slice($aUrl,2);
                                    call_user_func_array([$ctrl_obj,$method],$params);
                                }else{
                                    $ctrl_obj->$method();
                                }
                            }
                        }else{
                            $ctrl_obj->index();
                        }
                    }else{
                        include 'controller/home.php';
                        $home = new Home();
                        $home->index();
                    }
                }else{
                    include 'controller/home.php';
                    $home = new Home();
                    $home->index();
                }

            }else{
                include 'controller/home.php';
                $home = new Home();
                $home->index();
            }
        }
    }
?>