<?php
include_once __DIR__ . '/../model/connectDatabase.php';
include_once __DIR__. '/../model/consultSubjects.php';

$subjects=getSubjects();
require_once __DIR__ . '/../views/list_of_empty_cv_form.php';
if (isset($_POST['assignatura'])){
    $id=getSubjectInfo($_POST['assignatura'])[0]['id'];
    //echo '<p class="data_hide" id="assi">'.$id.'</p>';
    $usersWithCV=getCVFromSubject($conn=connectaBD(), $id);
    $name=getSubjectName($conn, $id);
    $subject_name='';
    if ($name!=null) {
        $subject_name = $name[0]['nom'];
    }
    include_once __DIR__. '/../model/users.php';
    require_once __DIR__ . '/../views/list_of_cv_form.php';
}

