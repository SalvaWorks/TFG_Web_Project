<?php
if (isset($_POST["name"])) {
    include_once __DIR__ . '/../model/connectDatabase.php';
    include_once __DIR__ . '/../model/users.php';
    saveCV();
    insertData($connexio = connectDbSQL());
}
    require_once __DIR__ . '/../views/user_register.php';
