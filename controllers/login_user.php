<?php
unset($_SESSION['ko']);
$_SESSION['ko']=0;
if ($_SESSION['user_id']!=-1 and $_SESSION['user_id']!=0 ){//logged
    require_once __DIR__ . '/../views/already_logged.php';
}else {//unlogged
    if (isset($_POST["password"])) {//set
        include_once __DIR__ . '/../model/connectDatabase.php';
        include_once __DIR__ . '/../model/users.php';
        $var = checkLogin($conexio = connectDbSQL());
        if (($_SESSION['user_id']!=0) and ($_SESSION['user_id']!= -1) and $var) {//ok
            checkTeacher($conexio, $_SESSION['user_id']);
             echo ("<script type='text/javascript'>
                window.alert('Log-in Correcte!');
                window.location.href='./index.php?action=menu';
                </script>");
            header("Refresh:0");
        } else {//ko
            unset($_SESSION['ko']);
            $_SESSION['ko']=1;
            require_once __DIR__ . '/../views/error_login.php';
            require_once __DIR__ . '/../views/user_login.php';
        }
    } else {//unsetted
        require_once __DIR__ . '/../views/user_login.php';
    }
}