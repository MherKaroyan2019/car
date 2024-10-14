<?php global $err; ?>
<?php include 'header.php' ?>
    <div class="main-content"> 
        <div class="container">
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
    </div>
<?php include 'footer.php' ?>