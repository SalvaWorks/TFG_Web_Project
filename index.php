<?php
// Start the session
session_start();
//$_SESSION['logged']=1;
//$_SESSION['teacher']=654910;
//654915 user normal
if (isset($_POST['cv'])){
    print_r($_POST['cv']);
}

if (!isset($_SESSION['logged'])) { //start session variables
    $_SESSION['logged']=0;//unlogged
    $_SESSION['user_id']= -1;//unlogged
    $_SESSION['ko']=0;//no tries
    $_SESSION['teacher']=0; //important - id taula auxiliar
}
//echo $_SESSION['user_id'];
$action = $_GET['action'] ?? null;
switch ($action) {
    case 'login_user':
        include __DIR__ . './resource_login_user.php';
        break;
    case 'logout':
        include __DIR__ . './resource_logout.php';
        break;
    case 'save_cv':
        include_once __DIR__ . './resource_save_cv.php';
        break;
    case 'check_register':
        include __DIR__ . './resource_register_done.php';
        break;
    case 'qui_som':
        include __DIR__ . './resource_qui_som.php';
        break;
    case 'see_cv':
        include __DIR__ . './resource_see_cv.php';
        break;
    case 'register_user':
        include __DIR__ . './resource_register_user.php';
        break;
    case 'register_teacher':
        include __DIR__ . './resource_register_teacher.php';
        break;
    case 'modify_teacher':
        include __DIR__ . './resource_modify_teacher.php';
        break;
    case 'view_schedule':
        include __DIR__ . './resource_view_schedule.php';
        break;
    case 'create_schedule':
        include __DIR__ . './resource_create_schedule.php';
        break;
    case 'oferta':
        include __DIR__ . './resource_apply_for_schedule.php';
        break;
     case 'modify_schedule':
        include __DIR__ . './resource_modify_schedule.php';
        break;
    case 'list_of_subjects':
        include __DIR__ . './resource_list_of_subjects.php';
        break;
    default:
        include __DIR__ . './resource_menu.php';
        break;
}

