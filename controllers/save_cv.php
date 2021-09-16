<?php
require_once __DIR__ . '/../model/connectDatabase.php';
require_once __DIR__ . '/../model/offers.php';

    $action = $_GET["fringes"];
    $user_id=$_SESSION['user_id'];
    //insercio taula oferta
    for ($i=1;$i<($action+1);$i++) {
        $preferencia = $_POST["priority_".$i];
        $franja_id=$_SESSION["f_id_".$i];

        insertOffer($conn=connectDbSQL(),$franja_id,$user_id,$preferencia);

        echo ("<script type='text/javascript'>
                window.alert('Sol·licitud enviada amb èxit! Se li notificarà via mail la resposta a la seva candidatura. Gràcies.');
                window.location.href='./index.php?action=menu';
                </script>");
        header("Refresh:0");

    }
