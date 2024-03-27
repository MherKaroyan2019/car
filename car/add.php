<?php 
    session_start();

    $db = mysqli_connect('localhost','root','root','car');
    if (!$db) {
        die("connection failed".mysqli_connect_error($db));
    }

    
    if(isset($_POST['add'])){
        $err = "";
        $Region = $_POST['region'];
        $Brand = $_POST['brand'];
        $Model = $_POST['model'];
        $Bodytype = $_POST['bodytype'];
        $Year = $_POST['year'];
        $Engine = $_POST['engine'];
        $Enginesize = $_POST['enginesize'];
        $Gearbox = $_POST['gearbox'];
        $Towtruck = $_POST['towtruck'];
        $Run = $_POST['run'];
        $Runtype = $_POST['runtype'];
        $Condition = $_POST['condition'];
        $Gasequipment = $_POST['gasequipment'];
        $Wheel = $_POST['wheel'];
        $Customclear = $_POST['customclear'];
        $Color = $_POST['color'];
        $Wheelsize = $_POST['wheelsize'];
        $Headlight = $_POST['headlight'];
        $Salonname = $_POST['salonname'];
        $Luke = $_POST['luke'];
        $Value = $_POST['value'];
        $Currency = $_POST['currency'];
        $Description = $_POST['description'];
        $Image = $_FILES["img"];

        if($Region == "" || $Brand == "" || $Model == "" || $Bodytype == "" || $Year == "" || $Engine == "" || $Enginesize == "" || $Gearbox == "" || $Towtruck == "" || $Run == "" || $Runtype == "" || $Condition == "" || $Gasequipment == "" || $Wheel == "" || $Customclear == "" || $Color == "" || $Wheelsize == "" || $Headlight == "" || $Salonname == "" || $Luke == "" || $Value == "" || $Currency == "" || $Description == "" || !isset($_POST["saletype"]) || !isset($_POST["seller"]) || $_FILES['img']['tmp_name'][0] == ""){
            $err = "Լրացրեք բոլոր դաշտերը";
        }else{
            $err = "";
            $Keys = "`userid`, `saletype`, `seller`, `region`, `brand`, `model`, `bodytype`, `year`, `engine`, `enginesize`, `gearbox`, `towtruck`, `run`, `runtype`, `condition`, `gasequipment`, `wheel`, `customclear`, `color`, `wheelsize`, `headlight`, `salonname`, `luke`, `value`, `currency`, `description`";
            $Values = "'$_SESSION[id]', '$_POST[saletype]', '$_POST[seller]', '$Region', '$Brand', '$Model', '$Bodytype', '$Year', '$Engine', '$Enginesize', '$Gearbox', '$Towtruck', '$Run', '$Runtype', '$Condition', '$Gasequipment', '$Wheel', '$Customclear', '$Color', '$Wheelsize', '$Headlight', '$Salonname', '$Luke', '$Value', '$Currency', '$Description'";
            if(isset($_POST["airconditioner"])){
                $Keys = $Keys . ", `airconditioner`";
                $Values = $Values . ", '1'";
            }
            if(isset($_POST["heatedseats"])){
                $Keys = $Keys . ", `heatedseats`";
                $Values = $Values . ", '1'";
            }
            if(isset($_POST["heatedwheel"])){
                $Keys = $Keys . ", `heatedwheel`";
                $Values = $Values . ", '1'";
            }
            if(isset($_POST["ventilatedseats"])){
                $Keys = $Keys . ", `ventilatedseats`";
                $Values = $Values . ", '1'";
            }
            if(isset($_POST["cruisecontrol"])){
                $Keys = $Keys . ", `cruisecontrol`";
                $Values = $Values . ", '1'";
            }
            if(isset($_POST["tinted"])){
                $Keys = $Keys . ", `tinted`";
                $Values = $Values . ", '1'";
            }
            foreach ($Image["type"] as $key => $type) {
                if($type != "image/jpeg" && $type != "image/jpg"){
                    $err = "Պետք է ուղարկել jpg կամ jpeg ֆայլեր";
                    break;
                }
            }

            if($err == ""){
                $imgNames = [];
                foreach ($Image["name"] as $key => $name) {
                    $tmp_name = $Image["tmp_name"][$key];
                    $path = explode(".", $name);
                    if(file_exists("./addimages/$name")){
                        $n = 1;
                        while(true){
                            if(!file_exists("./addimages/$path[0]($n).$path[1]/")){
                                move_uploaded_file($tmp_name, "./addimages/$path[0]($n).$path[1]/");
                                array_push($imgNames, $name);
                                break;
                            }
                            $n++;                    
                        }
                    }else{
                        move_uploaded_file($tmp_name, "./addimages/$name/");
                        array_push($imgNames, $name);
                    }
                }

                $Keys = $Keys . ", `imgNames`";
                $Values = $Values . ", '" . join(",", $imgNames) . "'";

                

                $sql = "INSERT into `product`($Keys) Values ($Values)";
                $result = mysqli_query($db, $sql);
            } 
        }
    
        // if($Name != "" && $Email != "" && $Password != ""){
        //     $sql = "INSERT into `user`(`name`, `email`, `password`, `date`) Values ('$Name', '$Email' , '$Password' , '$Date')";
        //     $result = mysqli_query($db, $sql);
        //     header("Location: login.php");
        // }else{
        //     echo 'Write all inputs';
        // }
    }
?>

<?php include 'header.php' ?>
    <div class="main-content">
        <p class="path">Տեղադրել հայտարարություն › Տրանսպորտ › Ավտոմեքենաներ › Ավտոմեքենաներ</p>
        <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <div class="parameters">
                <p class="err"><?php if(isset($err)){echo $err;} ?></p>
                <div class="parametr-part">
                    <h2>Հայտարարության տեսակը</h2>
                    <div class="inputs">
                        <div class="input-part">
                            <input type="radio" id="sale" name="saletype" value="sale" <?php if(isset($_POST['saletype']) && $_POST['saletype'] == "sale") echo "checked='checked'"; ?>>
                            <label for="sale">Վաճառք</label>
                        </div>
                        <div class="input-part">
                            <input type="radio" id="lookfor" name="saletype" value="lookfor" <?php if(isset($_POST['saletype']) && $_POST['saletype'] == "lookfor") echo "checked='checked'"; ?>>
                            <label for="lookfor">Փնտրում եմ</label>
                        </div>
                    </div>
                </div>
                <div class="parametr-part">
                    <h2>Ձեր կարգավիճակը</h2>
                    <div class="inputs">
                        <div class="input-part">
                            <input type="radio" id="owner" name="seller" value="owner" <?php if(isset($_POST['seller']) && $_POST['seller'] == "owner") echo "checked='checked'"; ?>>
                            <label for="owner">Սեփականատեր</label>
                            <p>Եթե դուք վաճառում եք ձեր սեփական մեքենան` մեքենայի սեփականատեր</p>
                        </div>
                        <div class="input-part">
                            <input type="radio" id="diller" name="seller" value="diller" <?php if(isset($_POST['seller']) && $_POST['seller'] == "diller") echo "checked='checked'"; ?>>
                            <label for="diller">Դիլեր</label>
                            <p>Եթե դուք միջնորդ եք, ավտոսրահի ներկայացուցիչ կամ վաճառում եք շատ ավտոմեքենաներ</p>
                        </div>
                    </div>
                </div>
                <div class="parametr-part">
                    <h2>Ավտոմեքենայի գտնվելու վայրը</h2>
                    <div class="inputs">
                        <div class="input-part">
                            <input type="radio" id="inArmenia" name="place">
                            <label for="inArmenia">Հայաստանում</label>
                        </div>
                        <div class="input-part">
                            <input type="radio" id="outArmenia" name="place">
                            <label for="outArmenia">Հայաստանից դուրս</label>
                        </div>
                        <div class="input-part">
                            <input type="radio" id="onway" name="place">
                            <label for="onway">Ճանապարհին</label>
                        </div>
                        <div class="input-part">
                            <input type="text" class="openValues" name="region" value="<?= isset($_POST['region']) ? $_POST['region'] : ''; ?>">
                            <div class="value-counts">
                                <div class="all-values">
                                    <div class="value-title">
                                        <label>Երևան</label>
                                    </div>
                                    <div class="value-line" onclick="valueLine(event)">Աջափնյակ</div>
                                    <div class="value-line" onclick="valueLine(event)">Արաբկիր</div>
                                    <div class="value-line" onclick="valueLine(event)">Ավան</div>
                                    <div class="value-line" onclick="valueLine(event)">Դավիթաշեն</div>
                                    <div class="value-line" onclick="valueLine(event)">Էրեբունի</div>
                                    <div class="value-line" onclick="valueLine(event)">Քանաքեռ Զեյթուն</div>
                                    <div class="value-line" onclick="valueLine(event)">Կենտրոն</div>
                                    <div class="value-line" onclick="valueLine(event)">Մալաթիա Սեբաստիա</div>
                                    <div class="value-line" onclick="valueLine(event)">Նոր Նորք</div>
                                    <div class="value-line" onclick="valueLine(event)">Շենգավիթ</div>
                                    <div class="value-line" onclick="valueLine(event)">Նորք Մարաշ</div>
                                    <div class="value-line" onclick="valueLine(event)">Նուբարաշեն</div>
                                    <div class="value-title">
                                        <label>Արմավիր</label>
                                    </div>
                                    <div class="value-line" onclick="valueLine(event)">Արմավիր</div>
                                    <div class="value-line" onclick="valueLine(event)">Էջմիածին</div>
                                    <div class="value-line" onclick="valueLine(event)">Արգավանդ</div>
                                    <div class="value-line" onclick="valueLine(event)">Բաղրամյան</div>
                                    <div class="value-line" onclick="valueLine(event)">Մերձավան</div>
                                    <div class="value-line" onclick="valueLine(event)">Մեծամոր</div>
                                    <div class="value-line" onclick="valueLine(event)">Մրգաշատ</div>
                                    <div class="value-line" onclick="valueLine(event)">Նալբանդյան</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sale">
                    <div class="parametr-part">
                        <h2>Բնութագրեր</h2>
                        <div class="inputs">
                            <div class="input-part">
                                <label>Մակնիշ</label>
                                <input type="text" class="openValues" name="brand" value="<?= isset($_POST['brand']) ? $_POST['brand'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Acura</div>
                                        <div class="value-line" onclick="valueLine(event)">Aito</div>
                                        <div class="value-line" onclick="valueLine(event)">Bugatti</div>
                                        <div class="value-line" onclick="valueLine(event)">Buick</div>
                                        <div class="value-line" onclick="valueLine(event)">BYD</div>
                                        <div class="value-line" onclick="valueLine(event)">ChangFeng</div>
                                        <div class="value-line" onclick="valueLine(event)">Dodge</div>
                                        <div class="value-line" onclick="valueLine(event)">DongFeng</div>
                                        <div class="value-line" onclick="valueLine(event)">ErAZ</div>
                                        <div class="value-line" onclick="valueLine(event)">FAW</div>
                                        <div class="value-line" onclick="valueLine(event)">Ferrari</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Մոդել</label>
                                <input type="text" class="openValues" name="model" value="<?= isset($_POST['model']) ? $_POST['model'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">A1</div>
                                        <div class="value-line" onclick="valueLine(event)">A2</div>
                                        <div class="value-line" onclick="valueLine(event)">A3</div>
                                        <div class="value-line" onclick="valueLine(event)">A4</div>
                                        <div class="value-line" onclick="valueLine(event)">A4 Allroad</div>
                                        <div class="value-line" onclick="valueLine(event)">A5</div>
                                        <div class="value-line" onclick="valueLine(event)">A5 Sportback</div>
                                        <div class="value-line" onclick="valueLine(event)">A6</div>
                                        <div class="value-line" onclick="valueLine(event)">A6 Allroad</div>
                                        <div class="value-line" onclick="valueLine(event)">A7</div>
                                        <div class="value-line" onclick="valueLine(event)">A8</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Թափքի տեսակ</label>
                                <input type="text" class="openValues" name="bodytype" value="<?= isset($_POST['bodytype']) ? $_POST['bodytype'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Սեդան</div>
                                        <div class="value-line" onclick="valueLine(event)">Հետչբեք</div>
                                        <div class="value-line" onclick="valueLine(event)">Ունիվերսալ</div>
                                        <div class="value-line" onclick="valueLine(event)">Կուպե</div>
                                        <div class="value-line" onclick="valueLine(event)">Ամենագնաց / Քրոսսովեր</div>
                                        <div class="value-line" onclick="valueLine(event)">Մինիվեն</div>
                                        <div class="value-line" onclick="valueLine(event)">Փիքափ</div>
                                        <div class="value-line" onclick="valueLine(event)">Միկրոավտոբուս</div>
                                        <div class="value-line" onclick="valueLine(event)">Ֆուրգոն</div>
                                        <div class="value-line" onclick="valueLine(event)">Կաբրիոլետ</div>
                                        <div class="value-line" onclick="valueLine(event)">Լիմուզին</div>
                                        <div class="value-line" onclick="valueLine(event)">Ռոդսթեր</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Տարի</label>
                                <input type="text" class="openValues" name="year" value="<?= isset($_POST['year']) ? $_POST['year'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">2000</div>
                                        <div class="value-line" onclick="valueLine(event)">2001</div>
                                        <div class="value-line" onclick="valueLine(event)">2002</div>
                                        <div class="value-line" onclick="valueLine(event)">2003</div>
                                        <div class="value-line" onclick="valueLine(event)">2004</div>
                                        <div class="value-line" onclick="valueLine(event)">2005</div>
                                        <div class="value-line" onclick="valueLine(event)">2006</div>
                                        <div class="value-line" onclick="valueLine(event)">2007</div>
                                        <div class="value-line" onclick="valueLine(event)">2008</div>
                                        <div class="value-line" onclick="valueLine(event)">2009</div>
                                        <div class="value-line" onclick="valueLine(event)">2010</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Շարժիչ</label>
                                <input type="text" class="openValues" name="engine" value="<?= isset($_POST['engine']) ? $_POST['engine'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Բենզին</div>
                                        <div class="value-line" onclick="valueLine(event)">Դիզել</div>
                                        <div class="value-line" onclick="valueLine(event)">Հիբրիդ</div>
                                        <div class="value-line" onclick="valueLine(event)">էլեկտրական</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Շարժիչի ծավալը</label>
                                <input type="text" class="openValues" name="enginesize" value="<?= isset($_POST['enginesize']) ? $_POST['enginesize'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">1.4 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">1.5 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">1.6 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">1.7 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">1.8 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">1.9 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">2.0 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">2.1 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">2.2 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">2.3 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">2.4 լ</div>
                                        <div class="value-line" onclick="valueLine(event)">2.6 լ</div> 
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Փոխանցման տուփը</label>
                                <input type="text" class="openValues" name="gearbox" value="<?= isset($_POST['gearbox']) ? $_POST['gearbox'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Մեխանիկական</div>
                                        <div class="value-line" onclick="valueLine(event)">Ավտոմատ</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Քարշակ</label>
                                <input type="text" class="openValues" name="towtruck" value="<?= isset($_POST['towtruck']) ? $_POST['towtruck'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Առջևի</div>
                                        <div class="value-line" onclick="valueLine(event)">Ետևի</div>
                                        <div class="value-line" onclick="valueLine(event)">Լիաքարշակ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parametr-part">
                        <h2>Լրացուցիչ տեղեկություններ</h2>
                        <div class="inputs">
                            <div class="input-part">
                                <label>Վազք</label>
                                <input type="number" min="0" name="run" value="<?= isset($_POST['run']) ? $_POST['run'] : ''; ?>">
                                <input type="text" class="openValues" name="runtype" value="<?= isset($_POST['runtype']) ? $_POST['runtype'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">կմ</div>
                                        <div class="value-line" onclick="valueLine(event)">մղոն</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Վիճակ</label>
                                <input type="text" class="openValues" name="condition" value="<?= isset($_POST['condition']) ? $_POST['condition'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Չվթարված</div>
                                        <div class="value-line" onclick="valueLine(event)">Վթարված</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Գազի սարքավորումներ</label>
                                <input type="text" class="openValues" name="gasequipment" value="<?= isset($_POST['gasequipment']) ? $_POST['gasequipment'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Չտեղադրված</div>
                                        <div class="value-line" onclick="valueLine(event)">Տեղադրված</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Ղեկ</label>
                                <input type="text" class="openValues" name="wheel" value="<?= isset($_POST['wheel']) ? $_POST['wheel'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Ձախ</div>
                                        <div class="value-line" onclick="valueLine(event)">Աջ</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Մաքսազերծված է</label>
                                <input type="text" class="openValues" name="customclear" value="<?= isset($_POST['customclear']) ? $_POST['customclear'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Այո</div>
                                        <div class="value-line" onclick="valueLine(event)">Ոչ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parametr-part">
                        <h2>Էքստերիեր</h2>
                        <div class="inputs">
                            <div class="input-part">
                                <label>Գույն</label>
                                <input type="text" class="openValues" name="color" value="<?= isset($_POST['color']) ? $_POST['color'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Սպիտակ</div>
                                        <div class="value-line" onclick="valueLine(event)">Արծաթագույն</div>
                                        <div class="value-line" onclick="valueLine(event)">Մոխրագույն</div>
                                        <div class="value-line" onclick="valueLine(event)">Սև</div>
                                        <div class="value-line" onclick="valueLine(event)">Շագանակագույն</div>
                                        <div class="value-line" onclick="valueLine(event)">Ոսկեգույն</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Անիվի չափսերը</label>
                                <input type="text" class="openValues" name="wheelsize" value="<?= isset($_POST['wheelsize']) ? $_POST['wheelsize'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">R10</div>
                                        <div class="value-line" onclick="valueLine(event)">R11</div>
                                        <div class="value-line" onclick="valueLine(event)">R12</div>
                                        <div class="value-line" onclick="valueLine(event)">R13</div>
                                        <div class="value-line" onclick="valueLine(event)">R14</div>
                                        <div class="value-line" onclick="valueLine(event)">R15</div>
                                        <div class="value-line" onclick="valueLine(event)">R16</div>
                                        <div class="value-line" onclick="valueLine(event)">R17</div>
                                        <div class="value-line" onclick="valueLine(event)">R18</div>
                                        <div class="value-line" onclick="valueLine(event)">R19</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Լուսարձակներ</label>
                                <input type="text" class="openValues" name="headlight" value="<?= isset($_POST['headlight']) ? $_POST['headlight'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                    <div class="value-line" onclick="valueLine(event)">Հալոգեն</div>
                                    <div class="value-line" onclick="valueLine(event)">Хenon լուսարձակներ</div>
                                    <div class="value-line" onclick="valueLine(event)">LED լուսարձակներ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="parametr-part">
                        <h2>Ինտերիեր</h2>
                        <div class="inputs">
                            <div class="input-part">
                                <label>Սրահի գույնը</label>
                                <input type="text" class="openValues" name="salonname" value="<?= isset($_POST['salonname']) ? $_POST['salonname'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Սպիտակ</div>
                                        <div class="value-line" onclick="valueLine(event)">Արծաթագույն</div>
                                        <div class="value-line" onclick="valueLine(event)">Մոխրագույն</div>
                                        <div class="value-line" onclick="valueLine(event)">Սև</div>
                                        <div class="value-line" onclick="valueLine(event)">Շագանակագույն</div>
                                        <div class="value-line" onclick="valueLine(event)">Ոսկեգույն</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Լյուկ</label>
                                <input type="text" class="openValues" name="luke" value="<?= isset($_POST['luke']) ? $_POST['luke'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Ոչ</div>
                                        <div class="value-line" onclick="valueLine(event)">Սովորական լյուկ</div>
                                        <div class="value-line" onclick="valueLine(event)">Պանորամային տանիք</div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-part">
                                <label>Կոմֆորտ</label>
                                <ul>
                                    <li><input type="checkbox" name="airconditioner" <?php if(isset($_POST['airconditioner'])) echo "checked='checked'"; ?>><label>Օդորակիչ</label></li>
                                    <li><input type="checkbox" name="heatedseats" <?php if(isset($_POST['heatedseats'])) echo "checked='checked'"; ?>><label>Տաքացվող նստատեղեր</label></li>
                                    <li><input type="checkbox" name="heatedwheel" <?php if(isset($_POST['heatedwheel'])) echo "checked='checked'"; ?>><label>Տաքացվող ղեկ</label></li>
                                    <li><input type="checkbox" name="ventilatedseats" <?php if(isset($_POST['ventilatedseats'])) echo "checked='checked'"; ?>><label>Օդափոխվող նստատեղեր</label></li>
                                    <li><input type="checkbox" name="cruisecontrol" <?php if(isset($_POST['cruisecontrol'])) echo "checked='checked'"; ?>><label>Կրուիզ-կոնտրոլ</label></li>
                                    <li><input type="checkbox" name="tinted" <?php if(isset($_POST['tinted'])) echo "checked='checked'"; ?>><label>Մգեցված ապակիներ</label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="parametr-part">
                        <h2>Ավտոմեքենայի արժեքը</h2>
                        <div class="inputs">
                            <div class="input-part">
                                <label for="value">Գին</label>
                                <input type="number" id="value" name="value" value="<?= isset($_POST['value']) ? $_POST['value'] : ''; ?>">
                                <input type="text" class="openValues" name="currency" value="<?= isset($_POST['currency']) ? $_POST['currency'] : ''; ?>">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">֏ (AMD)</div>
                                        <div class="value-line" onclick="valueLine(event)">$ (USD)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="parametr-part">
                    <h2>Մանրամասն տեղեկություն</h2>
                    <div class="inputs">
                        <div class="input-part">
                            <label>Նկարագիր</label>
                            <textarea placeholder="Մանրամասը նկարագրեք ավտոմեքենան, տեխնիկական հատկանիշները, հագեցվածությունը, վիճակը, պահանջվող աշխատանքները, շահագործման պատմությունը, առավելությունները, թերությունները և այլ տեղեկատվություն, որը կօգնի գնորդին ճիշտ որոշում կայացնել:" name="description">
                                <?php 
                                    if (isset($_POST['description'])) echo $_POST['description'];
                                ?>
                            </textarea>
                        </div>
                        <div class="input-part">
                            <label>Լուսանկարներ</label>
                            <div class="img">
                                <label for="img">Ընտրել լուսանկար</label>
                                <div class="img-container"></div>
                            </div>
                            <input type="file" name="img[]" id="img" accept="image/jpg, image/jpeg" multiple>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Դիտում" name="add">
            </div>
        </form>
    </div>  
<?php include 'footer.php' ?>