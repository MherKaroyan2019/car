<?php
    require_once (__DIR__ . '\MainModel.php');


    class ProductModel extends Model{
        public function add($data, $file){
            $name = $file["img"]["name"];
            $tmpname = $file["img"]["tmp_name"];
            $imges = [];
            for($i = 0; $i < count($name); $i++){
                $imgname = explode(".", $name[$i])[0];
                if(file_exists("../assets/addimages/$imgname.jpg")){
                    $j = 1;
                    while (true) {
                        if(!file_exists("../assets/addimages/$imgname($j).jpg")){
                            $imgname = $imgname . "($j)";
                            echo $imgname;
                            array_push($imges, $imgname . ".jpg");
                            move_uploaded_file($tmpname[$i], "../assets/addimages/$imgname.jpg");
                            break;
                        }
                        $j++;
                    }   
                }else{
                    move_uploaded_file($tmpname[$i], "../assets/addimages/$imgname.jpg");
                }
            }

            $imges = join(",", $imges);

            $data += ["imgNames" => $imges];

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
            $this->sql($sql);
        }

        public function get($data, $limit = -1) {
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

            $result = $this->sql($sql);

            return $result;
        }

        public function delete($id, $imgNames){
            $Imges = explode(",",$imgNames);
            foreach($Imges as $key => $value){
                unlink("../assets/addimages/" . $value);
            }

            $sql = "DELETE FROM `product` WHERE `id`='$id'";
            $this->sql($sql);
        }

        public function update($data, $id, $file){
            global $db;

            $sql = "SELECT * From `product` Where `id` = '$id'";
            $result = mysqli_query($db, $sql);
            $r = mysqli_fetch_assoc($result);
            $prevnames = explode(",",$r["imgNames"]);

            for($i = 0; $i < count($prevnames); $i++){
                print_r($prevnames);
                unlink("../assets/addimages/$prevnames[$i].jpg");
            }

            $name = $file["img"]["name"];
            $tmpname = $file["img"]["tmp_name"];
            $imges = [];
            for($i = 0; $i < count($name); $i++){
                $imgname = explode(".", $name[$i])[0];
                if(file_exists("../assets/addimages/$imgname.jpg")){
                    $j = 1;
                    while (true) {
                        if(!file_exists("../assets/addimages/$imgname($j).jpg")){
                            $imgname = $imgname . "($j)";
                            array_push($imges, $imgname . ".jpg");
                            move_uploaded_file($tmpname[$i], "../assets/addimages/$imgname.jpg");
                            break;
                        }
                        $j++;
                    }   
                }else{
                    move_uploaded_file($tmpname[$i], "../assets/addimages/$imgname.jpg");
                }
            }
            $data += ["imgNames" => join(",",$imges)];
            $returnValues = [];

            foreach($data as $key => $value){
                if($value == "Դիտել" || $value == "Մուտք"){
                    continue;
                }else{
                    if($key == "airconditioner" || $key == "heatedseats" || $key == "heatedwheel" || $key == "ventilatedseats" || $key == "cruisecontrol" || $key == "tinted"){
                        array_push($returnValues, "`$key` = '1'");
                    }else{
                        array_push($returnValues, "`$key` = '$value'");
                    }
                }        
            }
            $sql = "UPDATE product SET " . join(", ", $returnValues) . " Where id = '$id';";
            mysqli_query($db, $sql);
        }
    }
?>