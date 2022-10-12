<?php
    require_once("models/car.php");
    require_once("models/db_module.php");

    class Model 
    {
        public function getproductofpage(){
            $productofpage = 3;
            return $productofpage;
        }
        public function getpage(){
            $page = isset($_GET['page'])?$_GET['page']:1;
            $page = is_numeric($page)?$page:1;
            return $page;
        }
        public function getfrom(){
            $page = $this->getpage();
            $productofpage = $this->getproductofpage();
            $from = ($page - 1)*$productofpage;
            //$from= 2;
            return $from;
        }

        public function getcarlist()
        {
            $link = null;
            taoKetNoi($link);
            $from = $this->getfrom();
            $productofpage = $this->getproductofpage();
            $result = chayTruyVanTraVeDL ($link, "select * from tbl_car limit ".$from.", ".$productofpage);
            $data = array ();
            while ($rows = mysqli_fetch_assoc($result)){
                $car = new Car ($rows["id"], $rows["name"], $rows["title"], $rows["price"], $rows["color"], $rows["image"], $rows["image1"], $rows["image2"], $rows["description"], $rows["numberofseats"], $rows["style"], $rows["fuel"], $rows["origin"], $rows["gear"]);
                array_push($data, $car);
            }
            giaiPhongBoNho($link, $result);
            return $data;
        }
        public function getcar($id)
        {
            $allcars = $this->getcarlist();
            foreach($allcars as $car){
                if ($car->getid()===$id){
                    return $car;
                }
            }
            return null;   
        }

        //Lấy tổng số sản phẩm
        public function getnumberrow(){
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL ($link, "select count(*) from tbl_car");
            $numberrow = mysqli_fetch_row($result);
            giaiPhongBoNho($link, $result);
            return $numberrow[0];
        }
    }
?>