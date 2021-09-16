<?php
require_once __DIR__ . '/../model/consultSubjects.php';
require_once __DIR__ . '/../model/connectDatabase.php';

$subject_name=getSubjectName($conn = connectaBD(), $_SESSION['subject_id'])[0]['nom'];
$franges= getFringesofASubject($conn, $_SESSION['subject_id']);

/*$count=0;

echo '<div class="data_hide">';
foreach ($franges as $frange){
    $count=$count+1;
    echo '<p id="id_'.$count.'">'.$frange['id'].'</p>';
    echo '</div>';
}*/
$count=0;
foreach ($franges as $frange){
    $count=$count+1;
    unset($_SESSION["f_id_".$count]);
    $_SESSION["f_id_".$count]=$frange['id'];
}

require_once __DIR__ . '/../views/offer_form.php';
