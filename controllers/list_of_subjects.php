<?php
include_once __DIR__ . '/../model/connectDatabase.php';
include_once __DIR__. '/../model/consultSubjects.php';
$name = getBranchName($connexio = connectaBD(), $_GET['branch']);
$subjects= getSubjectsOf($connexio, $name[0]['nom']);
require_once __DIR__ . '/../views/list_of_subjects.php';
