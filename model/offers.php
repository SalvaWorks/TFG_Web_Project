<?php
function insertOffer($connexio, $franja_id, $user_id, $preferencia)
{
    $exists=checkOffer($user_id,$franja_id);
    if($exists){
        $insert = $connexio->prepare("UPDATE ofertes SET prioritat = '$preferencia' WHERE id_user='$user_id' AND id_franja='$franja_id'");
        $insert->execute();
        //echo 'update';
    }else {
        $insert = $connexio->prepare("INSERT INTO ofertes SET id_franja = '$franja_id', prioritat = '$preferencia', id_user = '$user_id'");
        $insert->execute();
       // echo 'insert';
    }
}
function checkOffer($user_id, $franja_id){
    $aux=true;
    $connexio = connectaBD();
    $consult = $connexio->prepare("SELECT id FROM gestio_contractacio_bd.ofertes WHERE id_franja = '$franja_id' AND id_user='$user_id'");
    $consult->execute();
    $consult->fetchAll(PDO::FETCH_ASSOC);
    if ($consult->rowCount()==0){
        $aux=false;

    }
    return $aux;
}