<?php
require_once __DIR__ . '/../model/connectDatabase.php';
require_once __DIR__ . '/../model/consultSubjects.php';
$branches= getBranches($connexio= connectaBD());
$ids= getBranchId($connexio);
include_once  __DIR__ . '/../views/header.php';