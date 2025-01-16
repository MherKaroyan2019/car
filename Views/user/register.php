    <div class="main-content">
        <div class="container">
            <div class="register-form">
                <form action="<?php echo "/car/user/register";?>" method="post">
                    <p class="err"><?php if(isset($err)){echo $err;} ?></p>

                    <h1>Գրանցում</h1>

                    <div class="inputs">
                        <input type="text" name="email" placeholder="էլ․ փոստ" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
                        <input type="text" name="name" placeholder="Անուն Ազգանուն" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>">
                        <input type="password" name="password" placeholder="Ստեղծել գաղտնաբառ" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                    </div>
                    <input type="submit" name="register" value="Մուտք">
                    <div class="login">
                        <a href="./login">List.am Մուտք</a> 
                    </div>
                </form>
            </div>
        </div>
    </div>