<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./font/FreeSans.ttf">
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/menu.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="left-bar">
            <div class="logo">
                <a href="index.php"><img src="./img/list-am.png" alt="list.am" width="100%" height="100%"></a>
            </div>
            <div class="sections">
                <a href="javascript:void(0)" class="sections-button">Բաժիններ</a>
                <div class="sections-content">
                    <div class="section-left-bar">
                        <a href="#">Անշարժ գույք ></a>
                        <a href="#">Տրանսպորտ ></a>
                        <a href="#">էլեկտրոնիկա ></a>
                        <a href="#">Կենցաղային տեխնիկա ></a>
                        <a href="#">Տուն և այգի ></a>
                        <a href="#">Նորաձևություն և ոճ ></a>
                        <a href="#">Մանկական աշխարհ ></a>
                        <a href="#">Հոբբի և սպորտ ></a>
                        <a href="#">Սարքավորումներ և նյութեր ></a>
                        <a href="#">Կենդանիներ ></a>
                        <a href="#">Մթերք և ըմպելիքներ ></a>
                        <a href="#">Այլ ></a>
                        <a href="#">Ծառայություննեչ ></a>
                        <a href="#">Աշխատանք ></a>
                        <a href="#">Բիզնես էջեր ></a>
                    </div>
                    <div class="section-right-bar">
                        <div class="section-content-block">
                            <h3>Ավտոմեքենաներ</h3>
                            <a href="#">Ավտոմեքենաներ</a>
                            <a href="#">Վթարված մեքենաներ որպես պահեստամաս</a>
                            <a href="#">Ավտոմեքենաներ աճուրդներից</a>
                        </div>
                        <div class="section-content-block">
                            <h3>Պահեստամասեր և աքսեսուարներ</h3>
                            <a href="#">Պահեստամասեր</a>
                            <a href="#">Անիվներ և անվադողեր</a>
                            <a href="#">Անվահեծեր և անվադողի թասակներ</a>
                            <a href="#">Մարտկոցներ</a>
                            <a href="#">Գազի սարքավորումներ</a>
                            <a href="#">Յուղեր և ավտոքիմիա</a>
                            <a href="#">Աքսեսուարներ</a>
                            <a href="#">Ավտոէլեկտրոնիկա</a>
                            <a href="#">Աուդիո և Վիդեո</a>
                        </div>
                        <div class="section-content-block">
                            <h3>Մոտոցիկլներ</h3>
                            <a href="#">Մոտոցիկլներ</a>
                            <a href="#">Պահեստամասեր և աքսեսուարներ</a>
                        </div>
                        <div class="section-content-block">
                            <h3>Կոմերցիոն տրանսպորտ</h3>
                            <a href="#">Բեռնատարներ</a>
                            <a href="#">Վթարված մեքենաներ որպես պահեստամաս</a>
                            <a href="#">Գյուղատնտեսական տեխնիկա</a>
                            <a href="#">Շինարարական և ծանր տեխնիկա</a>
                            <a href="#">Պահեստամասեր և աքսեսուարներ</a>
                        </div>
                        <div class="section-content-block">
                            <h3>Հեծանիվներ</h3>
                            <a href="#">Հեծանիվներ</a>
                            <a href="#">Պահեստամասեր և աքսեսուարներ</a>
                            <a href="#">Ավտոմեքենաներ աճուրդներից</a>
                        </div>
                        <div class="section-content-block">
                            <h3>Այլ տրանսպորտ</h3>
                            <a href="#">Սկուտերներ և մոպեդներ</a>
                            <a href="#">Կվադրոցիկլներ և ձյունագնացներ</a>
                            <a href="#">Ավտոտնակներ և կցանքներ</a>
                            <a href="#">Ջրային տրանսպորտ</a>
                        </div>
                        <div class="section-content-block">
                            <h3>Հեծանիվներ</h3>
                            <a href="#">Հեծանիվներ</a>
                            <a href="#">Պահեստամասեր և աքսեսուարներ</a>
                            <a href="#">Ավտոմեքենաներ աճուրդներից</a>
                        </div>
                        <div class="section-content-block">
                            <h3>Այլ տրանսպորտ</h3>
                            <a href="#">Սկուտերներ և մոպեդներ</a>
                            <a href="#">Կվադրոցիկլներ և ձյունագնացներ</a>
                            <a href="#">Ավտոտնակներ և կցանքներ</a>
                            <a href="#">Ջրային տրանսպորտ</a>
                        </div>  
                        <div class="section-content-block">
                            <h3><a href="#">Այլ</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search">
                <button><?xml version="1.0" ?><svg class="feather feather-search" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/></svg></button>
                <input type="search" aria-placeholder="MMM">
            </div>
        </div>
        <div class="right-bar">
            <?php if(!isset($_SESSION["id"]) && !isset($_SESSION["name"])){ ?>
                <div class="your-page">
                    <a href="login.php">Իմ էջը</a>
                </div>
            <?php }else{ ?>
                <div class="your-page">
                    <a href="yourpage.php"><?php echo $_SESSION["name"] ?></a>
                </div>
            <?php } ?>
            <div class="language">
                <button onclick="languageMenu()"><img src="./img/hy.png" alt="Armenia" width="20"></button>
                <div class="language-menu">
                    <a href="#"><img src="./img/ru.png" alt="Russian" width="20"> русский</a>
                    <a href="#"><img src="./img/en.png" alt="English" width="20"> english</a>
                </div>
            </div>
        </div>
    </div>
    <div style="height: 70px;"></div>