<?php
require_once __DIR__ . '/../model/connectDatabase.php';
require_once __DIR__ . '/../model/consultSubjects.php';

$branques= getBranchesInfo($conn=connectaBD());
if (isset($_COOKIE['push'] )) {
    if (isset($_COOKIE['data'])) {
        if ($_COOKIE['push'] == 1) {//save
            require_once __DIR__ . '/../model/createSchedule.php';
            if ($_COOKIE['data'] != '') { //insert
                insertNewSubject($_COOKIE['assignatura'], $_COOKIE['branca'], $_COOKIE['descripcio']);
                $info = getSubjectInfo($_COOKIE['assignatura']);
                createSchedule($_COOKIE['data'], $info[0]['id']);
            }
        }
    }
}
include __DIR__ . '/../views/schedule_creation.php';
