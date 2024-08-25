<?php
    require_once (__DIR__ . '\..\Model.php');

    class ProductModel extends Model{
        public function add($data){
            global $db;
            $values = [];
            $keys = [];

            foreach($data as $key => $value){
                if($value == "Դիտել" || $value == "Մուտք"){
                    continue;
                }else{
                    if($key == "airconditioner" || $key == "heatedseats" || $key == "heatedwheel" || $key == "ventilatedseats" || $key == "cruisecontrol" || $key == "tinted"){
                        array_push($keys, $key);
                        array_push($values, '1');
                    }else{
                        array_push($keys,"`" . $key . "`");
                        array_push($values, "'" . $value . "'");
                    }
                }        
            }

            $sql = "INSERT INTO product (" . join(", ", $keys) . ") VALUES (" . join(", ", $values) . ");";
            mysqli_query($db, $sql);
        }

        public function get($data, $limit = -1) {
            global $db;
            $sql = "SELECT * From `product`";
            $returnValues = [];

            foreach($data as $key => $value){
                if($value == "Դիտել" || $value == "Մուտք"){
                    break;
                }

                if($value == ""){
                    
                }else if(str_contains($value, ",")){
                    $values = explode(", ", $value);
                    $sqlpush = [];

                    if($key == "comfort"){
                        foreach($values as $key => $value){
                            if($value == "Օդորակիչ"){
                                array_push($sqlpush, "`airconditioner` = '1'");
                            }else if($value == "Տաքացվող նստատեղեր"){
                                array_push($sqlpush, "`heatedseats` = '1'");
                            }else if($value == "Տաքացվող ղեկ"){
                                array_push($sqlpush, "`heatedwheel` = '1'");
                            }else if($value == "Օդափոխվող նստատեղեր"){
                                array_push($sqlpush, "`ventilatedseats` = '1'");
                            }else if($value == "Կրուիզ-կոնտրոլ"){
                                array_push($sqlpush, "`cruisecontrol` = '1'");
                            }else if($value == "Մգեցված ապակիներ"){
                                array_push($sqlpush, "`tinted` = '1'");
                            }
                        }
                    }else{
                        foreach($values as $keykey => $valuevalue){
                            array_push($sqlpush, "`$key` = '$valuevalue'");
                        }
                    }
                    array_push($returnValues, "(" . join(" OR ", $sqlpush) . ")");
                }else if(str_contains($key, "min")){
                    array_push($returnValues, "`" . str_replace(array("min"), "", $key) . "` >= '$value'");
                }else if(str_contains($key, "max")){
                    array_push($returnValues, "`" . str_replace(array("max"), "", $key) . "` <= '$value'");
                }else{
                    array_push($returnValues, "`$key` = '$value'");
                }
                
            }

            if($returnValues){
                $sql .= "Where" . join(" AND ", $returnValues);
            }

            if($limit != -1){
                $sql .= " ORDER BY RAND() LIMIT 6";
            }

            $result = mysqli_query($db, $sql);

            return $result;
        }

        public function getInfo(){
            $sql = "SELECT * From `product` Where `id` = '$_GET[id]'";
            $result["result"] = mysqli_query($db, $sql);
            $r = mysqli_fetch_assoc($result);
            
            $sql1 = "SELECT * From `user` Where `id` = '$r[userid]'";
            $result1 = mysqli_query($db, $sql1);
            
            $sql2 = "SELECT * From `product` Where `id` != $r[id] AND `brand` = '$r[brand]' AND `model` = '$r[model]' AND `bodytype` = '$r[bodytype]' AND `engine` = '$r[engine]' AND `gearbox` = '$r[gearbox]' AND `towtruck` = '$r[towtruck]' AND `condition` = '$r[condition]' AND `wheel` = '$r[wheel]' AND `customclear` = '$r[customclear]' AND `luke` = '$r[luke]' ORDER BY RAND() LIMIT 6";
            $result2 = mysqli_query($db, $sql2);
        }
    }
?>