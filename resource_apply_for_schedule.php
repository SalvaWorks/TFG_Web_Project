<!doctype html>
<html>

<head>
    <title>User register - UAB</title>
    <link rel="stylesheet" href="styles/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <?php require __DIR__ . './controllers/header.php'; ?>

</head>
<?php if ($_SESSION['logged']===-1 or $_SESSION['logged']===0){ ?>
<body>
<?php require __DIR__ . './controllers/should_login.php'; ?>
</body>
<?php } else{
    if ($_SESSION['teacher']==1){?>
        <?php echo ("<script type='text/javascript'>
            window.alert('Els professors fixes no poden registrar ofertes via web, ja que la pàgina està orientada als professors externs.');       
            </script>");
        require __DIR__ . './controllers/menu.php'; ?>


    <?php }else{ ?>
<body>
<?php require __DIR__ . './controllers/oferta.php'; ?>
</body>
<?php  }
}?>


</html>