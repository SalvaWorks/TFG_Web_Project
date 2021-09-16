<?php

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['unlog']))
{
    include_once __DIR__ . '/../model/users.php';
    unlog();
}
require_once __DIR__ . '/../model/connectDatabase.php';
require_once __DIR__ . '/../model/consultSubjects.php';
$branches = getBranchesInfo(connectaBD());
include __DIR__ . '/../views/menu.php';