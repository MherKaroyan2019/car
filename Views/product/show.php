    <div class="main-content">
        <div class="container">
            <div class="car">
                <div class="parametrs">
                    <div class="images" data-count="0" data-image-names="<?php echo $r["imgNames"] ?>" style="background-image: url('../../assets/addimages/<?php echo explode(",", $r['imgNames'])[0]; ?>')">
                        <div class="left-arrow" style="background-image: url('../../assets/img/left-arrow.png')" onclick="previousimg()"></div>
                        <div class="right-arrow" style="background-image: url('../../assets/img/right-arrow.png')" onclick="nextimg()"></div>
                    </div>
                    <div class="car-info">
                        <div class="main-info">
                            <h1><?php echo "$r[brand] $r[model], $r[enginesize], $r[year] թ." ?></h1>
                            <p><?php echo "$r[region]" ?></p>
                            <span><?php echo $r['currency'][0] . $r['value'] ?></span>
                        </div>
                        <div class="info-part">
                            <h3>Բնութագրեր</h3>
                            <div class="titles">
                                <ul>
                                    <li>Մակնիշ</li>
                                    <li>Մոդել</li>
                                    <li>Թափքի տեսակ</li>
                                    <li>Տարի</li>
                                    <li>Շարժիչ</li>
                                    <li>Շարժիչի ծավալը</li>
                                    <li>Փոխանցման տուփը</li>
                                    <li>Քարշակ</li>
                                </ul>
                            </div>
                            <div class="values">
                                <ul>
                                    <li><?php echo "$r[brand]" ?></li>
                                    <li><?php echo "$r[model]" ?></li>
                                    <li><?php echo "$r[bodytype]" ?></li>
                                    <li><?php echo "$r[year]" ?></li>
                                    <li><?php echo "$r[engine]" ?></li>
                                    <li><?php echo "$r[enginesize]" ?></li>
                                    <li><?php echo "$r[gearbox]" ?></li>
                                    <li><?php echo "$r[towtruck]" ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-part">
                            <h3>Լրացուցիչ տեղեկություններ</h3>
                            <div class="titles">
                                <ul>
                                    <li>Վազք</li>
                                    <li>Վիճակ</li>
                                    <li>Ղեկ</li>
                                    <li>Մաքսազերծված է</li>
                                </ul>
                            </div>
                            <div class="values">
                                <ul>
                                    <li><?php echo "$r[run] $r[runtype]" ?></li>
                                    <li><?php echo "$r[condition]" ?></li>
                                    <li><?php echo "$r[wheel]" ?></li>
                                    <li><?php echo "$r[customclear]" ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-part">
                            <h3>Էքստերիեր</h3>
                            <div class="titles">
                                <ul>
                                    <li>Գույն</li>
                                    <li>Անիվի չափսերը</li>
                                    <li>Լուսարձակներ</li>
                                </ul>
                            </div>
                            <div class="values">
                                <ul>
                                    <li><?php echo "$r[color]" ?></li>
                                    <li><?php echo "$r[wheelsize]" ?></li>
                                    <li><?php echo "$r[headlight]" ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-part">
                            <h3>Ինտերիեր</h3>
                            <div class="titles">
                                <ul>
                                    <li>Սրահի գույնը</li>
                                    <li>Լյուկ</li>
                                    <li>Կոմֆորտ</li>
                                </ul>
                            </div>
                            <div class="values">
                                <ul>
                                    <li><?php echo "$r[salonname]" ?></li>
                                    <li><?php echo "$r[luke]" ?></li>
                                    <li><?php 
                                        $comfort = [];
                                        if($r["airconditioner"] == 1){
                                            array_push($comfort, "oդորակիչ");
                                        }
                                        if($r["heatedseats"] == 1){
                                            array_push($comfort, "տաքացվող նստատեղեր");
                                        }
                                        if($r["heatedwheel"] == 1){
                                            array_push($comfort, "տաքացվող ղեկ");
                                        }
                                        if($r["ventilatedseats"] == 1){
                                            array_push($comfort, "օդափոխվող նստատեղեր");
                                        }
                                        if($r["cruisecontrol"] == 1){
                                            array_push($comfort, "կրուիզ-կոնտրոլ");
                                        }
                                        if($r["tinted"] == 1){
                                            array_push($comfort, "մգեցված ապակիներ");
                                        }

                                        if($comfort == []){
                                            echo "Չկա";
                                        }else{
                                            echo join(", ", $comfort);
                                        }
                                    ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="info-part">
                            <h3>Նկարագիր</h3>
                            <p><?php echo $r["description"]; ?></p>
                        </div>
                    </div>
                </div>
                <div class="info-menu">
                    <div class="user">
                        <div class="author"><?php echo $r1["name"] ?></div>
                        <div class="since">List.am-ում է` <?php echo $r1["date"] ?></div>
                    </div>
                    <div class="other">
                        <?php if(mysqli_num_rows($result2) != 0){ 
                            while($r2 = mysqli_fetch_assoc($result2)){   
                                $imgname = explode(",", $r2['imgNames'])[0]; 
                        ?>  
                            <a href="/car/product/show/<?php echo $r2["id"] ?>">
                                <div class="other-car">
                                    <img src="../../assets/addimages/<?php echo $imgname ?>">
                                    <div style="margin-left: 20px;">
                                        <p class="main-info"><?php echo $r['brand'] . " " . $r["model"] . ", " . $r['enginesize'] . ", " . $r["year"]?></p>
                                        <p class="value"><?php echo $r["currency"][0] . $r["value"] ?></p>
                                    </div>
                                </div>
                            </a>
                        <?php } 
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>