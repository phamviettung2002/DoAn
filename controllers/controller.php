<?php
    require_once ("models/model.php");

    class Controller
    {
        public $model;

        public function __construct()
        {
            $this->model = new Model();
        }
        public function  invoke()
        {
            if(!isset($_GET["carid"])){
                $cars = $this->model->getcarlist();
                include "views/home.php";
            }else{
                $car = $this->model->getCar($_GET["carid"]);
                
                $a = rand(1, 6);
                $b = rand(1, 6);
                for( ; ; ){
                    if($a != $b && $a != $_GET["carid"] && $b != $_GET["carid"]){
                        $cartempt1 = $this->model->getCar("$a");
                        $cartempt2 = $this->model->getCar("$b");
                        break;
                    }else{
                        $a = rand(1, 6);
                        $b = rand(1, 6);
                    }
                }
                include "views/viewcar.php";
            }
        }
    }
?>