<?php 
    global $result;
?>

<?php include 'header.php' ?>
    <div class="main-content">
        <div class="yourpage">
            <div class="main-navbar">         
                <a href="javascript:void(0);" class="active">Հայտարարություններ</a>
                <a href="#">Հաղորդագրություններ</a>
                <a href="#">Մեկնաբանություններ</a>
                <a href="#">Դրամապանակ</a>
                <a href="settings.php">Կարգավորումներ</a>
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
                                    <a class="delete" href=<?php echo "?action=delete&id=$r[id]"?>><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 24 24"><path d="M 10 2 L 9 3 L 3 3 L 3 5 L 4.109375 5 L 5.8925781 20.255859 L 5.8925781 20.263672 C 6.023602 21.250335 6.8803207 22 7.875 22 L 16.123047 22 C 17.117726 22 17.974445 21.250322 18.105469 20.263672 L 18.107422 20.255859 L 19.890625 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 6.125 5 L 17.875 5 L 16.123047 20 L 7.875 20 L 6.125 5 z"></path></svg></a>
                                    <a class="update" href=<?php echo "add.php?action=update&id=$r[id]"?>><svg xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 507.68"><path fill-rule="nonzero" d="M442.17 335.59c5.89-13.07 21.27-18.89 34.34-13 13.07 5.89 18.89 21.26 13 34.33-20.4 45.13-53.52 83.3-94.8 109.95-39.99 25.82-87.59 40.8-138.63 40.8-70.71 0-134.73-28.66-181.07-75S0 322.3 0 251.59C0 193.6 19.32 140.08 51.88 97.12c33.29-43.93 80.51-76.81 135.14-92.1 13.8-3.81 28.08 4.29 31.89 18.09 3.81 13.8-4.28 28.08-18.08 31.89-43.37 12.14-80.94 38.34-107.51 73.4-25.93 34.21-41.31 76.89-41.31 123.19 0 56.36 22.84 107.38 59.77 144.31 36.92 36.92 87.94 59.77 144.3 59.77 40.8 0 78.77-11.93 110.6-32.48 32.85-21.21 59.24-51.63 75.49-87.6zm-215.02 22.59h57.86c11.44 0 20.82-9.38 20.82-20.82v-73.87h40.7c6.93-.3 11.86-2.6 14.7-6.92 7.72-11.57-2.81-23-10.12-31.05-20.74-22.76-71.56-77.45-81.79-89.49-7.76-8.58-18.8-8.58-26.56 0-10.57 12.34-63.94 69.53-83.66 91.67-6.84 7.7-15.29 18.21-8.17 28.87 2.91 4.32 7.78 6.62 14.72 6.92h40.68v73.87c0 11.44 9.37 20.82 20.82 20.82zm69.3-306.68c-14.08-2.8-23.22-16.49-20.41-30.57 2.8-14.08 16.49-23.22 30.57-20.42C364.7 12.15 415.7 43.46 452.37 87.2c36.04 42.99 58.22 98.1 59.62 158.42.28 14.3-11.09 26.13-25.39 26.41-14.3.28-26.13-11.09-26.41-25.39-1.11-47.89-18.83-91.77-47.63-126.12-29.19-34.81-69.82-59.74-116.11-69.02z"/></svg></a>
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