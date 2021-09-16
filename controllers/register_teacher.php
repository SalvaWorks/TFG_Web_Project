<?php
if (isset($_POST["name"])) {
    $name ='';
    $password = '';
    $mail = '';
    $password = '';

    include_once __DIR__ . '/../model/connectDatabase.php';
    include_once __DIR__. '/../model/users.php';

    list($name, $password, $mail, $password) = insertDataT1($connexio = connectDbSQL());
    insertDataT2($connexio, $name, $mail, $password);
    //$id_teacher=getTeacherID($conn=connectaBD(), $mail, $name);
    echo ("<script type='text/javascript'>
                window.alert('Professor registrat amb èxit. Recordi guardar la contrasenya i adreçar-la al docent corresponent.');       
                window.location.href='./index.php?action=menu';
                </script>");
    header("Refresh:0");
}require_once __DIR__ . '/../views/teacher_register.php';
