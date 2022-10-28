<?php
    require_once ("models/model.php");
    session_start();

    class Controller
    {
        public $model;

        public function __construct()
        {
            $this->model = new Model();
        }
        public function invoke()
        {
            if (isset($_SESSION['username']))
            {
                //Tổng số sản phẩm
                $numberrow = $this->model->getnumberrow();
                
                if (isset($_GET["search"])) {
                    $cars = $this->model->Search($_GET["search"]);
                    include "views/carsearch.php";
                    return;
                }

                if(!isset($_GET["carid"])){
                    $cars = $this->model->getcarlistbypage();
                    include "views/home.php";
                }
                else
                {
                    $car = $this->model->getCar($_GET["carid"]);
                    
                    $numberrow = $this->model->getnumberrow();
                    $a = rand(1, $numberrow);
                    $b = rand(1, $numberrow);
                    for( ; ; ){
                        if($a != $b && $a != $_GET["carid"] && $b != $_GET["carid"]){
                            $cartempt1 = $this->model->getCar("$a");
                            $cartempt2 = $this->model->getCar("$b");
                            break;
                        }else{
                            $a = rand(1, $numberrow);
                            $b = rand(1, $numberrow);
                        }
                    }
                    include "views/viewcar.php";
                }
            }   
        }

        public function Login($username, $password)
        {
            $a = $this->model->Login($username, $password);
            if ($a == 1) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
            }
        }

        public  function Register($username, $password)
        {
            return $this->model->Register($username, $password);
        }
        
        public function invokeadmin()
        {
            if (isset($_SESSION['username']))
            {
                if (isset($_GET["search"])) {
                    $cars = $this->model->Search($_GET["search"]);
                    include "views/admin.php";
                    return;
                }

                if(!isset($_GET["carid"])){
                    $cars = $this->model->getcarlistbypage();
                    include "views/admin.php";
                }
                else{
                    $car = $this->model->getCar($_GET["carid"]);
                    $carname = ""; $cartitle = ""; $carprice = ""; $carimage = ""; $carimage1 = ""; $carimage2 = ""; $cardescription = ""; $carnumberofseats = ""; $carstyle = ""; $carfuel = ""; $carorigin = ""; $cargear = "";
                    include "views/updatecar.php";
                    $this->model->getupdatecar($carname, $cartitle, $carprice, $carimage, $carimage1, $carimage2, $cardescription, $carnumberofseats, $carstyle, $carfuel, $carorigin, $cargear, $_GET["carid"]);
                }
            }
        }
    }
?>