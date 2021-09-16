<!doctype html>
<html lang="en">
<?php define("ADMIN", 654910);
if ($_SESSION['logged'] ===1) //Logged
{
    if ($_SESSION['teacher']=== ADMIN){?>
<nav>
    <div class="logo"><a style="color: white; text-decoration: none;" href="./index.php?action=menu">Ofertes Docència UAB</a></div>
    <ul>
        <li>
            <a>Branques</a>
            <ul class="desplegable">
                <?php $counter=0;
                foreach ($branches as $branca): ?>
                    <li><a href="./index.php?action=list_of_subjects&branch=<?php echo getBranchIdFromName($branca['nom'])[0]['id'];?>">
                            <?php echo $branca['nom']?></a></li>

                <?php $counter= $counter +1; endforeach ?>

            </ul>
        </li>
        <li><a href="./index.php?action=register_teacher">Registra un docent</a></li>
        <li><a href="./index.php?action=see_cv">Gestió de candidats</a></li>
        <li><a href="./index.php?action=modify_teacher">Modifica les assignatures d'un docent</a></li>
        <li><a href="./index.php?action=create_schedule" onsubmit="window.localStorage.clear();">Afegeix una assignatura</a></li>
        <li><a href="./index.php?action=modify_schedule" >Modifica una assignatura</a></li>
        <li><a href="./index.php?action=eliminate_schedule" >Elimina una assignatura</a></li>
        <li><a href="./index.php?action=logout">Logout</a></li>
    </ul>
</nav>

<?php } else{ if ($_SESSION['teacher']=== 0){
    //echo $_SESSION['teacher'];//user ?>
<nav>
    <div class="logo"><a style="color: white; text-decoration: none;" href="./index.php?action=menu">Ofertes Docència UAB</a></div>
    <ul class="branch_list">
        <li>
            <a href="./index.php?action=menu">Branques</a>
            <ul class="desplegable">
                <?php foreach ($branches as $branca): ?>
                    <li><a href="./index.php?action=list_of_subjects&branch=<?php echo getBranchIdFromName($branca['nom'])[0]['id'];?>">
                            <?php echo $branca['nom'] ?></a></li>
                <?php endforeach ?>

            </ul>
        </li>
        <li>
            <a href="./index.php?action=qui_som">Qui som?</a>
        </li>
        <li><a href="./index.php?action=logout">Logout</a></li>
    </ul>
</nav>
<?php } else { //teacher
        include_once __DIR__ .'/../model/consultSubjects.php';
        include_once __DIR__ .'/../model/users.php';
        $mail= getMail($_SESSION['user_id']);
        echo $mail[0]['mail'];
        $id= getTeacherID($mail[0]['mail']);
        echo $id[0]['id'];
        $subjects = getTeacherSubjects($id[0]['id']);
    ?>
        <nav>
            <div class="logo"><a style="color: white; text-decoration: none;" href="./index.php?action=menu">Ofertes Docència UAB</a></div>
            <ul>
                <li>
                    <a href="./index.php?action=menu">Branques</a>
                    <ul class="desplegable">
                        <?php foreach ($branches as $branca): ?>
                            <li><a href="./index.php?action=list_of_subjects&branch=<?php echo getBranchIdFromName($branca['nom'])[0]['id'];?>">
                                    <?php echo $branca['nom'] ?></a></li>
                        <?php endforeach ?>

                    </ul>
                </li>
                <li><a href="./index.php?action=modify_schedule">Les meves assignatures</a>
                    <ul class="desplegable">
                        <?php foreach ($subjects as $subject): //falta linkear ?>
                            <li><a href="./index.php?action=view_schedule&subject=<?php echo $subject['id']?>">
                                    <?php echo $subject['nom'] ?></a></li>
                        <?php endforeach ?>

                    </ul>
                </li>
                <li><a href="./index.php?action=logout">Logout</a></li>
            </ul>
        </nav>
    <?php }
    }
}
else  // unlogged
{ ?>
    <nav>
        <div class="logo"><a style="color: white; text-decoration: none;" href="./index.php?action=menu">Ofertes Docència UAB</a></div>
        <ul class="branch_list">
            <li>
                <a href="./index.php?action=menu">Branques</a>
                <ul style="z-index: 50;">
                    <?php foreach ($branches as $branca): ?>
                        <li><a href="./index.php?action=list_of_subjects&branch=<?php echo getBranchIdFromName($branca['nom'])[0]['id'];?>">
                                <?php echo $branca['nom'] ?></a></li>
                    <?php endforeach ?>

                </ul>
            </li>
            <li>
                <a href="./index.php?action=register_user">Registre</a>
            </li>
            <li>
                <a href="./index.php?action=login_user">Login</a>
            </li>
            <li>
                <a href="./index.php?action=qui_som">Qui som?</a>
            </li>
        </ul>
    </nav>
<?php
}
?>

</html>
