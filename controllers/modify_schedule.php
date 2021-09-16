<?php
require_once __DIR__ . '/../model/consultSubjects.php';
require_once __DIR__ . '/../model/connectDatabase.php';

if ($_SESSION['teacher']=== 654910){
//TODO
}else{
    unset($_SESSION['info_assignatura']);
    $_SESSION['info_assignatura'] = getSubjectInfo($conexio = connectaBD(), $_SESSION['teacher']); //guarda nom, descripcio i branca
    //echo $_SESSION['info_assignatura'][0]['descripcio'];
}