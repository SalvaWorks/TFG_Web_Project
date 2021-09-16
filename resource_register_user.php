<!doctype html>
<html>
<head>
    <title>User register - UAB</title>
    <link rel="stylesheet" href="styles/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
</head>
<header>
    <script type="javascript">
        function validateForm() {
            const x = document.forms["registerform"]["name"].value;
            console.log(x);
            if (x == "") {
                alert("El nom és necessari per registrar-se");
                return false;
            }
        }
    </script>
    <?php require __DIR__ . './controllers/header.php'; ?>
</header>
<body>
<?php require __DIR__ . './controllers/user_register_form.php'; ?>

</body>
<footer>
    <?php require __DIR__ . './controllers/footer.php';?>
</footer>
</html>