<?php
require_once __DIR__ . '/../model/consultSubjects.php';
require_once __DIR__ . '/../model/connectDatabase.php';

$franges= getFringesofASubject($conn = connectaBD(), $_SESSION['subject_id']);
echo '<div class="data_hide">';
$count=0;
foreach ($franges as $frange){
    $dia= transformDay($frange['dia']);
    //hora_inici
    $hora_inici=substr($frange['hora_inici'],0,2);
    $minut_inici=substr($frange['hora_inici'],3,2);
    if($minut_inici=='00'){
        $minut_inici='0';
    }
    if(substr($hora_inici,0,1)=='0'){
        $hora_inici=substr($frange['hora_inici'],1,1);
    }
    //hora_fi
    $hora_fi=substr($frange['hora_fi'],0,2);
    $minut_fi=substr($frange['hora_fi'],3,2);
    if($minut_fi=='00'){
        $minut_fi='0';
    }
    if(substr($hora_fi,0,1)=='0'){
        $hora_fi=substr($frange['hora_fi'],1,1);
    }
    if ($frange['tipus']==0){
        $frange['tipus']='Teoria';
    }elseif ($frange['tipus']==1){
        $frange['tipus']='Problemes';
    }
        else{
            $frange['tipus']='Pràctiques';
        }


    $count=$count+1;

    echo '<p id="dia_'.$count.'">'.$dia.'</p>';
    echo '<p id="hora_inici_'.$count.'">'.$hora_inici.'</p>';
    echo '<p id="minut_inici_'.$count.'">'.$minut_inici.'</p>';
    echo '<p id="hora_fi_'.$count.'">'.$hora_fi.'</p>';
    echo '<p id="minut_fi_'.$count.'">'.$minut_fi.'</p>';
    echo '<p id="estat_'.$count.'">'.$frange['estat'].'</p>';
    echo '<p id="tipus_'.$count.'">'.$frange['tipus'].'</p>';
}
echo '<p id="count">'.$count.'</p>';
echo '</div>';

$nom_assignatura= getSubjectName($conn=connectaBD(),$_SESSION['subject_id']);

$subject_name=$nom_assignatura[0]['nom'];
unset($_SESSION['subject_name']);
$_SESSION['subject_name']=$subject_name;
//print_r($subject_name);

