<?php 
    session_start();

    include "db.php";

    $productModel = new ProductModel;

    $result = $productModel->get(["userid" => $_SESSION["id"]]);
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
                                    <img src="<?php echo "../assets/addimages/$imgname"; ?>">
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
                </div>
                <a href="add.php" class="button">Տեղադրել հայտարարություն</a>
            </div>
        </div>
    </div>  
<?php include 'footer.php' ?>