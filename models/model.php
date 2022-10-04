<?php
    require_once("models/car.php");
    require_once("models/db_module.php");

    class Model 
    {
        public function getcarlist()
        {
            $link = null;
            taoKetNoi($link);
            $result = chayTruyVanTraVeDL ($link, "select * from tbl_car");
            $data = array ();
            while ($rows = mysqli_fetch_assoc($result)){
                $car = new Car ($rows["id"], $rows["name"], $rows["title"], $rows["price"], $rows["color"], $rows["image"], $rows["description"], $rows["numberofseats"], $rows["style"], $rows["fuel"], $rows["origin"], $rows["gear"]);
                array_push($data, $car);
            }
            giaiPhongBoNho($link, $result);
            return $data;
        }
        public function getcar($id)
        {
            $allcars = $this->getcarlist();
            foreach($allcars as $car){
                if ($car->getid() === $id){
                    return $car;
                }
            }
            return null;
        }
    }
?>