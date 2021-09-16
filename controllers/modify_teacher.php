<?php
if (isset($_POST["nova_assignatura"])) { //inserir
    $assignatura_id =$_POST["nova_assignatura"];
    $professor_id = $_POST["professor_id"];

    include_once __DIR__ . '/../model/connectDatabase.php';
    include_once __DIR__. '/../model/consultSubjects.php';

    assignTeacherSubject($conn=connectDbSQL(),$assignatura_id,$professor_id);

    echo ("<script type='text/javascript'>
                window.alert('Professor registrat amb èxit. Recordi guardar la contrasenya i adreçar-la al docent corresponent.');       
                window.location.href='./index.php?action=menu';
                </script>");
    header("Refresh:0");
}elseif (isset($_POST["vella_assignatura"])){ //esborrar assignatura
    $assignatura_id =$_POST["vella_assignatura"];
    $professor_id = $_POST["professor_id"];

    include_once __DIR__ . '/../model/connectDatabase.php';
    include_once __DIR__. '/../model/consultSubjects.php';

    deleteTeacheronSubject($conn=connectDbSQL(),$assignatura_id,$professor_id);

    echo ("<script type='text/javascript'>
                window.alert('Professor des-assignat amb èxit.');       
                window.location.href='./index.php?action=menu';
                </script>");
    header("Refresh:0");


}
require_once __DIR__ . '/../views/modify_register.php';
