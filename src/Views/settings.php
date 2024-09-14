<?php 
    session_start();

    include "db.php";

    $UserController = new UserController;

    if(isset($_POST["update"])){
        $err = "";
        if((isset($_POST["name"]) && $_POST["name"] != "") || (isset($_POST["email"]) && $_POST["email"] != "")){
            $UserController->update($_POST, $_SESSION["id"]);
            if(isset($_POST["name"])){
                $_SESSION["name"] = $_POST["name"];
            }
        }else{
            $err = "No empty inputes";
        }
    }

    $result = $UserController->get(["id" => $_SESSION["id"]]);
    $r = mysqli_fetch_assoc($result);
?>

<?php include 'header.php' ?>
    <div class="main-content">
        <div class="yourpage">
            <div class="main-navbar">         
                <a href="yourpage.php">Հայտարարություններ</a>
                <a href="#">Հաղորդագրություններ</a>
                <a href="#">Մեկնաբանություններ</a>
                <a href="#">Դրամապանակ</a>
                <a href="javascript:void(0);" class="active">Կարգավորումներ</a>
            </div>
            <div class="main">
                <!-- <div class="second-navbar">
                    <a href="javascript:void(0);" class="active">Ակտիվ</a>
                    <a href="#">Ոչ Ակտիվ</a>
                </div> -->
                <div class="content">
                    <form action="" class="change-form" method="POST">
                        <label for="name">Ձեր անունը</label>
                        <input type="text" name="name" id="name" data-value="<?php echo $r["name"]; ?>" value="<?php echo $r["name"]; ?>" disabled>
                        <p class="change">Փոխել</p>
                        <div class="changesubmit">
                            <input type="submit" name="update" value="Պահպանել">
                            <input type="button" value="Չեղարկել" class="no">
                        </div>
                    </form>
                    <form action="" class="change-form" method="POST">
                        <label for="email">Ձեր էլ․ հասցեն</label>
                        <input type="text" name="email" id="email" data-value="<?php echo $r["email"]; ?>" value="<?php echo $r["email"]; ?>" disabled>
                        <p class="change">Փոխել</p>
                        <div class="changesubmit">
                            <input type="submit" name="update" value="Պահպանել">
                            <input type="button" value="Չեղարկել" class="no">
                        </div>
                    </form>
                    <p class="err"><?php if(isset($err)){echo $err;} ?></p>
                </div>
            </div>
        </div>
    </div>  
<?php include 'footer.php' ?>