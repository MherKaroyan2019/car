<?php 
    $db = mysqli_connect('localhost','root','root','car');
    if (!$db) {
        die("connection failed".mysqli_connect_error($db));
    }

    if(isset($_POST['register'])){
        $Email = $_POST['email'];
        $Name = $_POST['name'];
        $Password = $_POST['password'];
        $Date = date('d/m/Y');
    
        if($Name != "" && $Email != "" && $Password != ""){
            $err = "";
            $sql = "INSERT into `user`(`name`, `email`, `password`, `date`) Values ('$Name', '$Email' , '$Password' , '$Date')";
            $result = mysqli_query($db, $sql);
            header("Location: login.php");
        }else{
            $err = 'Լրացրեք բոլոր դաշտերը';
        }
    }
?>
<?php include 'header.php' ?>
    <div class="main-content">
        <div class="register-form">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <p class="err"><?php if(isset($err)){echo $err;} ?></p>

                <h1>Գրանցում</h1>

                <div class="inputs">
                    <input type="text" name="email" placeholder="էլ․ փոստ" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                    <input type="text" name="name" placeholder="Անուն Ազգանուն" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                    <input type="password" name="password" placeholder="Ստեղծել գաղտնաբառ" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                </div>
                <input type="submit" name="register" value="Մուտք">
                <div class="login">
                    <a href="./login.php">List.am Մուտք</a> 
                </div>
            </form>
        </div>
    </div>
<?php include 'footer.php' ?>