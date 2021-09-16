<?php
function getdemandedBranches($connexio){
    $consult = $connexio->prepare('SELECT DISTINCT branca FROM gestio_contractacio_bd.assignatures' );
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getBranches($connexio){
    $consult = $connexio->prepare('SELECT DISTINCT nom FROM gestio_contractacio_bd.branques' );
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getBranchIdFromName($name){
    $connexio=connectaBD();
    $consult = $connexio->prepare("SELECT DISTINCT id FROM gestio_contractacio_bd.branques WHERE nom ='$name' ");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}

function getBranchId($connexio){
    $consult = $connexio->prepare("SELECT id FROM gestio_contractacio_bd.branques WHERE nom in (SELECT DISTINCT nom 
FROM gestio_contractacio_bd.branques )");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getBranchesInfo($connexio){
    $consult = $connexio->prepare('SELECT * FROM gestio_contractacio_bd.branques' );
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getSubjectInfo($name){
    $connexio = connectaBD();
    $consult = $connexio->prepare("SELECT id FROM gestio_contractacio_bd.assignatures WHERE nom='$name'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getSubjects(){
    $connexio = connectaBD();
    $consult = $connexio->prepare("SELECT nom FROM gestio_contractacio_bd.assignatures WHERE id IN 
        (SELECT assignatura_id FROM gestio_contractacio_bd.franges)");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getFrangeInfo($id){
    $connexio = connectaBD();
    $consult = $connexio->prepare("SELECT dia, hora_inici, hora_fi, tipus FROM gestio_contractacio_bd.franges
        WHERE id ='$id'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getSubjectsOf($connexio, $name){
    $consult = $connexio->prepare("SELECT DISTINCT id, nom, descripcio FROM gestio_contractacio_bd.assignatures WHERE branca='$name'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getBranchName($connexio, $id){
    $consult = $connexio->prepare("SELECT nom FROM gestio_contractacio_bd.branques WHERE id='$id'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getSubjectName($connexio, $id){
    $consult = $connexio->prepare("SELECT nom FROM gestio_contractacio_bd.assignatures WHERE id='$id'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getFringesOfASubject($connexio, $id){
    $consult = $connexio->prepare("SELECT DISTINCT id, dia, hora_fi, hora_inici, tipus, estat FROM gestio_contractacio_bd.franges WHERE assignatura_id='$id'");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function assignTeacherSubject($conn, $assignatura_id, $professor_id){
    $insert = $conn->prepare("INSERT INTO aux SET professor_id = '$professor_id', assignatura_id = '$assignatura_id'");
    $insert->execute();
}
function deleteTeacherOnSubject($conn, $assignatura_id, $professor_id){
    $insert = $conn->prepare("DELETE FROM aux WHERE professor_id = '$professor_id' AND assignatura_id = '$assignatura_id'");
    $insert->execute();
}
function getFrangesUser($usuari_id, $assignatura_id){
    $connexio = connectaBD();
    $consult = $connexio->prepare("SELECT DISTINCT prioritat, id_franja  FROM gestio_contractacio_bd.ofertes WHERE 
        id_user='$usuari_id' AND id_franja IN (SELECT DISTINCT id FROM gestio_contractacio_bd.franges WHERE assignatura_id
        ='$assignatura_id')");
    $consult->execute();
    return $consult->fetchAll(PDO::FETCH_ASSOC);
}
function getCVFromSubject($conn, $subjectId){
    /*$insert = $conn->prepare("SELECT DISTINCT usuari_id, nom_cv FROM gestio_contractacio_bd.curriculums WHERE usuari_id IN
(SELECT DISTINCT id_user FROM gestio_contractacio_bd.ofertes WHERE id_franja IN (
    SELECT DISTINCT id FROM gestio_contractacio_bd.franges WHERE assignatura_id ='$subjectId'))");*/
    $insert = $conn->prepare("SELECT DISTINCT id, nom, mail, nom_cv FROM gestio_contractacio_bd.usuaris WHERE
        id IN (SELECT DISTINCT id_user FROM gestio_contractacio_bd.ofertes WHERE id_franja IN ( SELECT DISTINCT id FROM
        gestio_contractacio_bd.franges WHERE assignatura_id = '$subjectId'))");
    $insert->execute();
    return $insert->fetchAll(PDO::FETCH_ASSOC);
}
function transformDay($day){
    echo $day;
    switch ($day){
        case "Dilluns":
            return 21;

        case 'Dimarts':
            return 22;

        case 'Dimecres':
            return 23;

        case 'Dijous':
            return 24;
        case 'Divendres':
            return 25;
        default:
            $day=1;
    return $day;
    }
}