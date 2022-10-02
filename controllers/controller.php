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

        }
    }
?>