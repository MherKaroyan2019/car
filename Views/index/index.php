     <div class="main-content">  
        <div class="container">
            <h1>Ավտոմեքենաներ</h1>      
            <div class="filt">Ֆիլտրեր</div>
            <div class="search-product">
                <div class="search-form">

                    <form action="" method="POST">
                        <div class="form-menu">
                            <input type="button" value="չԿիրառել">
                            <input type="submit" value="Կիրառել">
                        </div>
                        <div class="form-part">
                            <div class="form-line">
                                <input type="radio" id="individual" name="seller" value="owner">
                                <label for="owner">Անհատական</label>
                            </div>
                            <div class="form-line">
                                <input type="radio" id="diler" name="seller" value="diller">
                                <label for="diller">Դիլեր</label>
                            </div>  
                            <hr>
                            <div class="form-line">
                                <input type="radio" id="sale" name="saletype" value="sale">
                                <label for="sale">Վաճառք</label>
                            </div>
                            <div class="form-line">
                                <input type="radio" id="lookfor" name="saletype" value="lookfor">
                                <label for="lookfor">Փնտրում եմ</label>
                            </div>
                        </div>
                        <div class="form-part">
                            <div class="form-line">
                                <label>Տարածաշրջան</label>
                                <input type="text" class="openValues" name="region">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-title">
                                            <label>Երևան</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Աջափնյակ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Արաբկիր</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ավան</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Դավիթաշեն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Էրեբունի</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Քանաքեռ Զեյթուն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Կենտրոն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մալաթիա Սեբաստիա</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Նոր Նորք</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Շենգավիթ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Նորք Մարաշ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Նուբարաշեն</label>
                                        </div>
                                        <div class="value-title">
                                            <label>Արմավիր</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Արմավիր</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Էջմիածին</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Արգավանդ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Բաղրամյան</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մերձավան</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մեծամոր</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մրգաշատ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Նալբանդյան</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="submitButton">
                                        <button type="button" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-part">
                            <div class="form-line">
                                <label>Մակնիշ</label>
                                <input type="text" class="openValues" name="brand">
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
                        </div>
                        <h2>Ավտոմեքենայի արժեքը</h2>
                        <div class="form-part">
                            <div class="form-line">
                                <label>Գին</label>
                                <div class="number-div">
                                    <input type="number" placeholder="Սկսած" name="minvalue">
                                    <input type="number" placeholder="Մինչև" name="maxvalue">
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Տարադրամ</label>
                                <input type="text" class="openValues" name="currency">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">֏ (AMD)</div>
                                        <div class="value-line" onclick="valueLine(event)">$ (USD)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Բնութագրեր</h2>
                        <div class="form-part">
                            <div class="form-line">
                                <label>Թափքի տեսակ</label>
                                <input type="text" class="openValues" name="bodytype">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Սեդան</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Հետչբեք</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ունիվերսալ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Կուպե</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ամենագնաց / Քրոսսովեր</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մինիվեն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Փիքափ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Միկրոավտոբուս</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ֆուրգոն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Կաբրիոլետ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Լիմուզին</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ռոդսթեր</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="submitButton">
                                        <button type="button" class="shoose" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" class="noshoose" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Տարի</label>
                                <div class="number-div">
                                    <input type="number" placeholder="Սկսած" min="0" name="minyear">
                                    <input type="number" placeholder="Մինչև" min="0" name="maxyear">
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Շարժիչ</label>
                                <input type="text" class="openValues" name="engine">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Բենզին</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Դիզել</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Հիբրիդ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>էլեկտրական</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="submitButton">
                                        <button type="button" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Շարժիչի ծավալ</label>
                                <div class="number-div">
                                    <input type="number" placeholder="Սկսած" min="0" name="minenginesize">
                                    <input type="number" placeholder="Մինչև" min="0" name="maxenginesize">
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Փոխանցման տուփը</label>
                                <input type="text" class="openValues" name="gearbox">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Մեխանիկական</div>
                                        <div class="value-line" onclick="valueLine(event)">Ավտոմատ</div>
                                    </div>
                                </div>
                            </div>                                    
                            <hr>
                            <div class="form-line">
                                <label>Քարշակ</label>
                                <input type="text" class="openValues" name="towtruck">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Առջևի</div>
                                        <div class="value-line" onclick="valueLine(event)">Ետևի</div>
                                        <div class="value-line" onclick="valueLine(event)">Լիաքարշակ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Լրացուցիչ տեղեկություն</h2>    
                        <div class="form-part">
                            <div class="form-line">
                                <label>Վազք</label>
                                <div class="number-div">
                                    <input type="number" placeholder="Սկսած" min="0" name="minrun">
                                    <input type="number" placeholder="Մինչև" min="0" name="maxrun">
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Վիճակ</label>
                                <input type="text" class="openValues" name="condition">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Չվթարված</div>
                                        <div class="value-line" onclick="valueLine(event)">Վթարված</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Գազի լիցքավորում</label>
                                <input type="text" class="openValues" name="gasequipment">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Չտեղադրված</div>
                                        <div class="value-line" onclick="valueLine(event)">Տեղադրված</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Ղեկ</label>
                                <input type="text" class="openValues" name="wheel">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Ձախ</div>
                                        <div class="value-line" onclick="valueLine(event)">Աջ</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Մաքսազերծված է</label>
                                <input type="text" class="openValues" name="customclear">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Այո</div>
                                        <div class="value-line" onclick="valueLine(event)">Ոչ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Էքստերիեր</h2>
                        <div class="form-part">
                            <div class="form-line">
                                <label>Գույն</label>
                                <input type="text" class="openValues" name="color">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Սպիտակ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Արծաթագույն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մոխրագույն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Սև</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Շագանակագույն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ոսկեգույն</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="submitButton">
                                        <button type="button" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Անիվի չափերը</label>
                                <input type="text" class="openValues" name="wheelsize">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R10</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R11</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R12</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R13</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R14</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R15</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R16</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R17</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R18</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>R19</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="submitButton">
                                        <button type="button" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Լուսարձակներ</label>
                                <input type="text" class="openValues" name="headlight">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">Հալոգեն</div>
                                        <div class="value-line" onclick="valueLine(event)">Хenon լուսարձակներ</div>
                                        <div class="value-line" onclick="valueLine(event)">LED լուսարձակներ</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2>Ինտերիեր</h2>
                        <div class="form-part">
                            <div class="form-line">
                                <label>Սրահի գույնը</label>
                                <input type="text" class="openValues" name="salonname">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Սպիտակ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Արծաթագույն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մոխրագույն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Սև</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Շագանակագույն</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ոսկեգույն</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="submitButton">
                                        <button type="button" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Լյուկ</label>
                                <input type="text" class="openValues" name="luke">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Ոչ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Սովորական լյուկ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Պանորամային տանիք</label>
                                        </div>
                                    </div>
                                    <div class="submitButton">
                                        <button type="button" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-line">
                                <label>Կոմֆորտ</label>
                                <input type="text" class="openValues" name="comfort">
                                <div class="value-counts">
                                    <div class="all-values">
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Օդորակիչ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Տաքացվող նստատեղեր</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Տաքացվող ղեկ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Օդափոխվող նստատեղեր</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Կրուիզ-կոնտրոլ</label>
                                        </div>
                                        <div class="value-line" onclick="valueLine(event)">
                                            <input type="checkbox">
                                            <label>Մգեցված ապակիներ</label>
                                        </div>
                                    </div>
                                    <div class="submitButton">
                                        <button type="button" onclick="choose(event)">Ընտրել</button>
                                        <button type="button" onclick="noChoose(event)">Ընդհատել</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Դիտել" name="select">
                    </form>
                </div>
                <div class="products">
                    <h2>Հայտարարություններ</h2>
                    <div class="all-products">
                        <?php if(mysqli_num_rows($result) == 0){ ?>
                            <p>Ձեր հարցմանը համապատասխան տեղեկություն չի գտնվել:</p>  
                        <?php 
                            } else {
                                while($r = mysqli_fetch_assoc($result)){
                                    $imgname = explode(",", $r['imgNames'])[0];
                        ?>
                                    <a href="product/show/<?php echo $r["id"] ?>">
                                        <div class="product">
                                            <img src="<?php echo "assets/addimages/$imgname"; ?>">
                                            <h3><?php echo $r["currency"][0] . $r["value"] ?></h3>
                                            <p class="main-info"><?php echo $r['brand'] . " " . $r["model"] . ", " . $r['enginesize'] . ", " . $r["year"]?></p>
                                            <p class="second-info"><?php echo $r['region'] . ", " . $r['year'] . ", " . $r["run"] . " " . $r["runtype"]?></p>
                                        </div>
                                    </a>
                        <?php   
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>    
        </div>
    </div>  
