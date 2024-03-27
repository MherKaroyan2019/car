<?php
    session_start();

    $db = mysqli_connect('localhost','root','root','car');
    if (!$db) {
        die("connection failed".mysqli_connect_error($db));
    }

    if(isset($_POST['login'])){
        $Email = $_POST['email'];
        $Password = $_POST['password'];
    
        if($Email != "" && $Password != ""){
            $sql = "SELECT * From `user` Where `email` = '$Email' And `password` = '$Password'";
            $result = mysqli_query($db, $sql);
            if(mysqli_num_rows($result) == 0){
                $err = 'Անվավեր մուտքանուն կամ գաղտնաբառ:';
            } else {
                $r = mysqli_fetch_assoc($result);
                $_SESSION["id"] = $r["id"];
                $_SESSION["name"] = $r["name"];
            }

            header("Location: index.php");
        }else{
            $err = 'Լրացրեք բոլոր դաշտերը';
        }
    }
?>
<?php include 'header.php' ?>
    <div class="main-content">
        <div class="register-form">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                <p class="err"><?php if(isset($err)){echo $err;} ?></p>

                <h1>List.am Մուտք</h1>

                <div class="inputs">
                    <input type="text" name="email" placeholder="Էլ․ փոստ">
                    <input type="password" name="password" placeholder="Գաղտնաբառ">
                </div>
                <input type="submit" name="login" value="Մուտք">
                <div class="register">
                    <h2>Դեռ գրանցված չեք?</h2>
                    <a href="./register.php">Գրանցում</a> 
                </div>
            </form>
        </div>
    </div>
<?php include 'footer.php' ?>