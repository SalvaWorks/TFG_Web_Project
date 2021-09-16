<?php
function insertData ($connexio)
{
    $name = mysqli_real_escape_string($connexio,$_POST['name']);
    $password = $_POST['pass'];
    $mail = mysqli_real_escape_string($connexio,$_POST['mail']);
    $surnames = mysqli_real_escape_string($connexio,$_POST['surnames']);
    $cv = mysqli_real_escape_string($connexio,$_SESSION['cv']);
    $phone = mysqli_real_escape_string($connexio,$_POST['phone']);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $isTeacher=0;
    $insert = $connexio->prepare("INSERT INTO usuaris SET nom = '$name', cognoms = '$surnames', contrasenya = '$password', mail = '$mail', telefon = '$phone', professor_id = '$isTeacher', nom_cv = '$cv'");
    $insert->execute();

    echo ("<script type='text/javascript'>
                window.alert('Registre realitzat amb èxit. Pot continuar navegant pel portal i ja es pot inscriure a les ofertes actuals.');       
                </script>");
}

function insertDataT1 ($connexio, $isTeacher=1)
{
    $name = mysqli_real_escape_string($connexio, $_POST['name']);
    $password = $_POST['pass'];
    $mail = mysqli_real_escape_string($connexio, $_POST['mail']);
    $surnames = mysqli_real_escape_string($connexio, $_POST['surnames']);
    $phone = 0;
    $cv = '';
    $password = password_hash($password, PASSWORD_DEFAULT);
    $insert = $connexio->prepare("INSERT INTO usuaris SET nom = '$name', cognoms = '$surnames', contrasenya = '$password', mail = '$mail', telefon = '$phone', professor_id = '$isTeacher', nom_cv = '$cv'");
    $insert->execute();
    return array($name, $password, $mail, $password);

}
function insertDataT2 ($connexio, $name,  $mail, $password)
{
    $surnames = mysqli_real_escape_string($connexio, $_POST['surnames']);
    $assignatura = 1; //1=teacher, no point on db, i modify after
    $insert = $connexio->prepare("INSERT INTO professors SET nom = '$name', cognoms = '$surnames', mail = '$mail', contrasenya = '$password', assignatura_id = '$assignatura'");
    $insert->execute();
}

function saveCV(){
    //guardar arxius aqui
    $target_dir="C:/xampp/htdocs/WebTFGProject/curriculums/";
    $filename=$_FILES["cv"]["name"];
    $tmpname=$_FILES["cv"]["tmp_name"];
    $filetype=$_FILES["cv"]["type"];
    $errors=[];
    $fileextensions=["pdf"];
    $arr=explode(".",$filename);
    $ext=strtolower(end($arr));
    $uploadpath=$target_dir.$filename;
    if(! in_array($ext,$fileextensions))
    {
        $errors[]="Invalid filename";
    }
    if(empty($errors))
    {
        if(move_uploaded_file($tmpname,$uploadpath)) {
            $_SESSION['cv'] = $filename;
        }
        else
        {
            echo "<h2 style='text-align: center'>L'arxiu introduit no és vàlid! Provi amb un arxiu .pdf</h2>";
        }
    }
    else
    {
        echo "<h2 style='text-align: center'>L'arxiu introduit no és vàlid! Provi amb un arxiu .pdf</h2>";

    }

}
function getTeacherID($mail){
    $conn = connectaBD();
    $consult = $conn->prepare("SELECT id FROM gestio_contractacio_bd.professors WHERE mail='$mail'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getMail($id){
    $conn = connectaBD();
    $consult = $conn->prepare("SELECT mail FROM gestio_contractacio_bd.usuaris WHERE id='$id'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getName($id){
    $conn = connectaBD();
    $consult = $conn->prepare("SELECT nom FROM gestio_contractacio_bd.usuaris WHERE id='$id'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getUserID($mail){
    $conn = connectaBD();
    $consult = $conn->prepare("SELECT id FROM gestio_contractacio_bd.usuaris WHERE mail='$mail'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getTeacherSubjects($id){
    $conn = connectaBD();
    $consult = $conn->prepare("SELECT nom FROM gestio_contractacio_bd.assignatures WHERE id IN (SELECT assignatura_id FROM gestio_contractacio_bd.aux WHERE professor_id='$id')");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}

function checkLogin($connexio)
{
    {
        $myemail=$_POST['email'];
        $mypassword=$_POST['password'];
        $myemail = mysqli_real_escape_string($connexio,$myemail);

        if ($result = $connexio->query("SELECT contrasenya FROM usuaris WHERE mail='$myemail'"))
        {
            //echo "Returned rows are: " . $result -> num_rows;
            $row =mysqli_fetch_row($result);
            //echo $row[0];
            // Free result set
            $result -> free_result();

        }
        if (password_verify( $mypassword, $row[0]))
        {
            unset($_SESSION['logged']);;
            $_SESSION['logged']=1;

            $userinfo = $connexio->query("SELECT id FROM usuaris WHERE mail='$myemail'");
            $row = mysql_result($userinfo, 0,0);

            unset($_SESSION['user_id']);
            $_SESSION['user_id'] = $row;
            return true;
        } else {
            //echo 'Invalid password.';
            $_SESSION['logged']=-1;//bad login
            return false;
        }
    }

}
function mysql_result($res,$row=0,$col=0){
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
function unlog()
{
    unset($_SESSION['logged']);
    $_SESSION['logged']=0;
    unset($_SESSION['user_id']);
    $_SESSION['user_id']=-1;
    unset($_SESSION['teacher']);
    $_SESSION['teacher']=-0;
    header("Refresh:0");
}
function checkTeacher($connexio, $idUser)
{
    $checker= $connexio->query("SELECT professor_id FROM usuaris WHERE id= '$idUser'");
    $checker = mysql_result($checker, 0,0);
    if ($checker==1){
        $userinfo = $connexio->query("SELECT assignatura_id FROM professors WHERE mail= (SELECT mail FROM usuaris WHERE id= '$idUser')");
        $userinfo = mysql_result($userinfo, 0,0);
        unset($_SESSION['teacher']);
        $_SESSION['teacher']=$userinfo;

    }
}