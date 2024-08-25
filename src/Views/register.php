<?php 
    include "db.php";
    
    if(isset($_POST['register'])){
        if($_POST['name'] != "" && $_POST['email'] != "" && $_POST['password'] != ""){
            $userModel = new UserModel;
            $result = $userModel->get(["email" => $_POST['email']]);
            if(mysqli_num_rows($result) == 0){
                $values = $_POST;
                $values["date"] = date('d/m/Y');
                $userModel->add($values);
                header("Location: login.php");
            }else{
                $err = "Այս էլեկտրոնային հասցեով կա արդեն գրանցված հաշիվ";
            }
        }else{
            $err = 'Լրացրեք բոլոր դաշտերը';
        }
    }
?>
<?php include 'header.php' ?>
    <div class="main-content">
        <div class="container">
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
    </div>
<?php include 'footer.php' ?>