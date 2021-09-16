<?php
function insertNewSubject($nom, $branca, $descripcio){
    if(!checkifExists($nom)) {
        $connexio = connectDbSQL();
        $insert = $connexio->prepare("INSERT INTO assignatures SET nom='$nom', branca='$branca',descripcio='$descripcio'");
        $insert->execute();
    }
}
function checkIfExists($nom){
    $conn= connectaBD();
    $consult = $conn->prepare("SELECT id FROM gestio_contractacio_bd.assignatures WHERE nom='$nom'");
    $consult->execute();
    $consult->fetchAll(PDO::FETCH_ASSOC);
    if ($consult==false){
        return true;
    }else{
        return false;
    }
}
function insertDataF1($connexio, $dia, $hora_fi, $hora_ini, $tipus, $estat, $assignatura_id ){
    $insert = $connexio->prepare("INSERT INTO franges SET dia = '$dia', hora_fi = '$hora_fi', hora_inici = '$hora_ini', tipus = '$tipus', estat = '$estat', assignatura_id = '$assignatura_id'");
    $insert->execute();
}
function createSchedule ($data, $assignatura_id){

    $cookie = str_replace("(hora de verano de Europa central)", "", $data);
    $cookie = str_replace("GMT", "", $cookie);
    $cookie = str_replace("franja:", "", $cookie);
    $cookie = str_replace(",", " ", $cookie);
    $cookie = str_replace("0200", "", $cookie);

    $estat =1;
    //split cookie value
    $words = explode(" ", $cookie);

    //franges
    $hora_inici= '';
    $dia= '';
    $hora_fi= '';
    $count_ini =13;
    $count_fi =5;
    foreach ($words as $word){
        //echo $word;
            switch ($word) {
                case 'Mon':
                    $dia = 'Dilluns'; //Dilluns;
                break;
                case 'Tue':
                    $dia = 'Dimarts'; //Dimarts;
                    break;
                case 'Wed':
                    $dia = 'Dimecres'; //Dimecres;
                    break;
                case 'Thu':
                    $dia = 'Dijous'; //Dilluns;
                    break;
                case 'Fri':
                    $dia = 'Divendres'; //Divendres;
                    break;
                case 'Teoria':
                    $tipus = 0; //teoria
                    insertDataF1($connexio = connectDbSQL(),$dia, $hora_fi, $hora_inici, $tipus, $estat, $assignatura_id);
                    break;
                case 'Problemes':
                    $tipus = 1; //problemes
                    insertDataF1($connexio =connectDbSQL(),$dia, $hora_fi, $hora_inici, $tipus, $estat, $assignatura_id);
                    break;
                case 'Practiques':
                    $tipus = 2; //pràctiques
                    //echo 'vez ';
                    insertDataF1($connexio=connectDbSQL(), $dia, $hora_fi, $hora_inici, $tipus, $estat, $assignatura_id);
                    break;
                default:
                    if ($count_ini% 18==0){
                        $hora_inici=$word;
                       // echo 'Hora inici: '.$hora_inici;
                    }elseif ($count_fi%18==0) {
                        $hora_fi = $word;
                        //echo 'Hora fi: ' . $hora_fi;
                    }
        }
        $count_ini = $count_ini +1;
        $count_fi = $count_fi +1;
    }
    echo ("<script type='text/javascript'>
            document.cookie='push='+0;
            window.alert('Registre realitzat amb èxit. Pot continuar navegant pel portal i ja es pot inscriure a les ofertes actuals.');       
            </script>");
}