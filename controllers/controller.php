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
                $car = $this->model->getcar($_GET["carid"]);
                include "views/viewcar.php";
            }
        }
    }
?>