<?php 
    session_start();

    $db = mysqli_connect('localhost','root','root','car');
    if (!$db) {
        die("connection failed".mysqli_connect_error($db));
    }

    $sql = "SELECT * From `product` Where `userid` = '$_SESSION[id]'";
    $result = mysqli_query($db, $sql);
    // while($r = mysqli_fetch_assoc($result)){
    //     print_r($r);
    // }
?>

<?php include 'header.php' ?>
    <div class="main-content">
        <div class="yourpage">
            <div class="main-navbar">         
                <a href="javascript:void(0);" class="active">Հայտարարություններ</a>
                <a href="#">Հաղորդագրություններ</a>
                <a href="#">Մեկնաբանություններ</a>
                <a href="#">Դրամապանակ</a>
                <a href="#">Կարգավորումներ</a>
            </div>
            <div class="main">
                <div class="second-navbar">
                    <a href="javascript:void(0);" class="active">Ակտիվ</a>
                    <a href="#">Ոչ Ակտիվ</a>
                </div>
                <div class="content">
                    <?php if(mysqli_num_rows($result) == 0){ ?>
                        <p>Այս պահին Դուք չունեք գործող հայտարարություններ:</p>  
                    <?php 
                        } else {
                            while($r = mysqli_fetch_assoc($result)){ 
                                $imgname = explode(",", $r['imgNames'])[0];
                    ?>
                                <div class="your-product">
                                    <img src="<?php echo "addimages/$imgname"; ?>">
                                    <ul>
                                        <li><?php echo $r["brand"]; ?></li>
                                        <li><?php echo $r["model"]; ?></li>
                                        <li><?php echo $r["year"]; ?></li>
                                    </ul>
                                </div>
                    <?php   
                            }
                        }
                    ?>
                    
                    <a href="add.php" class="button">Տեղադրել հայտարարություն</a>
                </div>
            </div>
        </div>
    </div>  
<?php include 'footer.php' ?>