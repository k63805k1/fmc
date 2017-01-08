<?php
    class System_db{
        private $conn;
        private $res;
        public function __construct()
        {
            global $config;
            $this->conn = new mysqli($config['host'],$config['db_user'],$config['db_pwd'],$config['db_name']);
            if($this->conn->connect_errno) {
                echo $this->conn->connect_error;
                exit();
            }
        }
        public function select($sql){
            $this->res = $this->conn->query($sql);
            return $this;
        }
        public function first(){
            $row = $this->res->fetch_assoc();
            return $row;
        }
        public function all()
        {
            $res = array();
            while($row = $this->res->fetch_array()){
                $res[] = $row;
            }
            return $res;
        }
        public function insert($table,$data){
            $keys = array();
            $values = array();
            foreach ($data as $key=>$value){
                $keys[] = $key;
                $values[] = $value;
            }
            $keysin = join(',',$keys);
            $valuesin = join("','",$values);
            $this->conn->query("insert into $table ($keysin) values ('$valuesin')");
        }
        //update test_tbl set f_name=aaa,l_name,other where id=3
        public function update($table,$data,$id){
            $arr1 = array();
            $arr2 = array();
            foreach ($data as $key=>$value){
                $arr1[] = $key."='".$value."'";
            }
            foreach ($id as $key=>$value){
                $arr2[] = $key."=".$value;
            }
            $key_val = join(',',$arr1);
            $ids = join(',',$arr2);
            echo "update $table set $key_val where $ids";
            $this->conn->query("update $table set $key_val where $ids");
        }
        public function delete($table,$id){
            $arr1 = [];
            foreach ($id as $key=>$value){
                $arr1[] = $key."=".$value;
            }
            $ids = join(',',$arr1);
            $this->conn->query("delete from $table where $ids");
        }
    }
?>